<?php

namespace App\Services;

interface EmployeeServiceInterface
{
    public function all();

    public function paginate($perPage = 10);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id);

    public function findBy($field, $value);
}