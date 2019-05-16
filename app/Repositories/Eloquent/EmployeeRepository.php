<?php

namespace App\Repositories\Eloquent;

use App\Repositories\RepositoryInterface;
use App\Models\Employee;
use App\Library\MyValidation;
use App\Http\Resources\EmployeeCollection;

class EmployeeRepository implements RepositoryInterface
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct()
    {
        $this->model = new Employee();
    }

    // Get the associated model
    public function getModel()
    {
        return $this->model;
    }

    // Set the associated model
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    // Get all instances of model
    public function all()
    {
        return new EmployeeCollection($this->model->with('address')->orderBy('id', 'asc')->get());
    }

    // Get all instances of model with pagination
    public function paginate($perPage = 10)
    {
        return new EmployeeCollection($this->model->with('address')->orderBy('id', 'asc')->paginate($perPage));
    }

    // create a new record in the database
    public function create(array $data)
    {
        if (DB::table('users')->where('email', $data['email'])->first()) {
            throw new \Exception('Email has been already taken!');
        }
        $validator = Validator::make($data->all(), MyValidation::$ruleEmployee, MyValidation::$messageEmployee);
        if ($validator->fails()) {
            $message = $validator->messages()->getMessages();
            throw new \Exception($message);
        }
        $employee = $this->model->create($data);
        if ($employee) {
            User::create([
                'user_status' => 'actived',
                'name' => $employee->name,
                'email' => $employee->email,
                'usable_id' => $employee->id,
                'usable_type' => 'App\\Employee',
                'password' => 'default123'
            ]);
            if ($avatar = $data->file('avatar')) {
                $imageURL = MyFunctions::upload_img($avatar);
                $employee->avatar = $imageURL;
                $employee->save();
            }
        }
        return $employee;
    }

    // update record in the database
    public function update(array $data, $id)
    {
        $employee = $this->model->findOrFail($id);
        if ($employee) {
            $employee->update($data);
            if ($avatar = $data->file('avatar')) {
                $imageURL = MyFunctions::upload_img($avatar);
                $employee->avatar = $imageURL;
                $employee->save();
            }
        }
        return $employee;
    }

    // remove record from the database
    public function delete($id)
    {
        $employee = $this->model::findOrFail($id);
        $user = User::where([
            ['usable_id', '=', $id],
            ['usable_type', '=', 'App\\Employee']
        ])->first();
        if ($employee == null || $user == null) {
            throw new \Exception('ID not found');
        } else {
            $employee->delete();
            $user->delete();
            return true;
        }
    }

    // show the record with the given id
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    // Find in model instance with val
    public function findBy($field, $value){
        return $this->model->where($field, '=', $value)->get();
    }

    // Eager load database relationships
    public function with($relations)
    {
        return $this->model->with($relations);
    }
}
