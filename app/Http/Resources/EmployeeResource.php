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
            'name'=>$this->name,
            'number'=>$this->number,
            'department'=>$this->department,
            'netsalary'=>$this->netsalary+$this->commission-$this->deduction,
        ];
    }
}
