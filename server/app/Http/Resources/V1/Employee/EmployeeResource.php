<?php

namespace App\Http\Resources\V1\Employee;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => (string)$this->id,
            'name' => $this->name,
            'status' => $this->status,
            'created_date' => $this->created_date,
            'sex' => $this->sex,
            'salary' => $this->salary
        ];
    }
}
