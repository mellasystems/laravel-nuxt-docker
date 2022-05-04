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
            'id' => (string)$this->resource->id,
            'name' => $this->resource->name,
            'status' => $this->resource->status,
            'created_date' => $this->resource->created_date,
            'sex' => $this->resource->sex,
            'salary' => $this->resource->salary
        ];
    }
}
