<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Http\Resources\SingleEmployeeResource;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();
        return EmployeeResource::collection($employee);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = [
            'name'=>$request->name,
            'number'=>$request->number,
            'email'=>$request->email,
            'department'=>$request->department,
            'salary'=>$request->salary,
            'commission'=>$request->commission,
            'deduction'=>$request->deduction,
            'netsalary'=>$request->netsalary,
        ];
        Employee::create($input);

        return response()->json([
            'message'=>"Employee added succefully"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::where('id',$id)->firstOrFail();
        return (new SingleEmployeeResource($employee));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = [
            'name'=>$request->name,
            'number'=>$request->number,
            'email'=>$request->email,
            'department'=>$request->department,
            'salary'=>$request->salary,
            'commission'=>$request->commission,
            'deduction'=>$request->deduction,
            'netsalary'=>$request->netsalary,
        ];

        $employee = Employee::where('id', $id)->firstOrFail();
        $employee->update($input);
        return response()->json([
            'message'=>"Employee updated succefully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::where('id', $id)->firstOrFail();
        $employee->delete($employee);
        return response()->json([
            'message'=>"Employee is deleted"
        ]);
    }
}
