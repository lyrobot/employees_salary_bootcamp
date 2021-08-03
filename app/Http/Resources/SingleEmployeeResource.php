<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SingleEmployeeResource extends JsonResource
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
            'email'=>$this->email,
            'department'=>$this->department,
            'salary'=>$this->salary,
            'commission'=>$this->commission,
            'deduction'=>$this->deduction,
            'netsalary'=>$this->netsalary+$this->commission-$this->deduction,
        ];
    }
}
