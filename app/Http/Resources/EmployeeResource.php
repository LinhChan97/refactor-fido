<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "status" => $this->status,
            "employee_no" => $this->employee_no,
            "name" => $this->name,
            "avatar" => $this->avatar,
            "birthday" => $this->birthday,
            "description" => $this->description,
            "gender" => $this->gender,
            "id_number" => $this->id_number,
            "id_number_place" => $this->id_number_place,
            "id_number_date" => $this->id_number_date,
            "passport_no" => $this->passport_no,
            "passport_place" => $this->passport_place,
            "passport_date" => $this->passport_date,
            "phone_number" => $this->phone_number,
            "email" => $this->email,
            "address_id" => empty($this->address->id) ? null : $this->address->id,
            "address_name" => empty($this->address->name) ? null : $this->address->name,
            "tax_number" => $this->tax_number,
            "start_date" => $this->start_date,
            "end_date" => $this->end_date,
            "active_check" => $this->active_check,
            "address_details" => $this->address_details,
            "role" => $this->role,
        ];
    }
}
