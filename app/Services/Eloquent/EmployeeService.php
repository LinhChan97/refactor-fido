<?php

namespace App\Services;

use App\Repositories\Eloquent\EmployeeRepository;

class EmployeeService implements EmployeeServiceInterface
{
    protected $employeeRepository;

    function __construct()
    {
        $this->employeeRepository = new EmployeeRepository();
    }

    public function all()
    {
        $employees = $this->employeeRepository->all();
        if (!$employees) {
            return response()->json(['Message' => 'No content'], 204);
        }
        return response()->json(['Message' => 'Success', 'Data' => $employees], 200);
    }


    public function paginate($perPage = 10)
    {
        $employees = $this->employeeRepository->paginate($perPage);
        if (!$employees) {
            return response()->json(['Message' => 'No content'], 202);
        }
        return response()->json(['Message' => 'Success', 'Data' => $employees], 200);
    }

    public function create(array $data)
    {
        try {
        $this->employeeRepository->create($data);
        } catch (\Exception $th) {
            return response()->json(['Message' => $th->getMessage()], 202);
        }
        return response()->json(['Message' => 'Created'], 201);
    }

    public function update(array $data, $id)
    {
        try {
        $this->employeeRepository->update($data, $id);            
        } catch (\Exception $th) {
            return response()->json(['Message' => $th->getMessage()], 404);

        }
        return response()->json(['Message' => 'Updated'], 200);
    }

    public function delete($id)
    {
        try {
        $isDeleted = $this->employeeRepository->delete($id);            
        } catch (\Exception $th) {
            return response()->json(['Message' => $th->getMessage()], 404);
        }
        return response()->json(['Message' => 'Deleted'], 202);
    }

    public function find($id)
    {
        $employee = $this->employeeRepository->show($id);
        if (!$employee) {
            return response()->json(['Message' => 'Not found'], 404);
        }
        return response()->json(['Message' => 'Success', 'Data'=>$employee], 200);
    }

    public function findBy($field, $value){
        $employees = $this->employeeRepository->findBy($field, $value);
        if (!$employees) {
            return response()->json(['Message' => 'Not found'], 404);
        }
        return response()->json(['Message' => 'Success', 'Data'=>$employees], 200);
    }


}
