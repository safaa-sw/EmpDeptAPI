<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Resources\EmployeeResource;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees= Employee::all();
        //determine which attribute we want to return.
        $result=EmployeeResource::collection($employees);
        return response()->json($result, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee=Employee::create($request->all());
        $employee->save();
        return response()->json($employee, 200);
        //return response()->json(['message' => 'Employee stored successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $employee=Employee::find($employee->id);
        return response()->json($employee, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $employee=Employee::find($employee->id);
        $employee->name=$request->name;
        $employee->age=$request->age;
        $employee->dept_id=$request->dept_id;
        $employee->save();
        return response()->json($employee, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee=Employee::find($employee->id)->delete();
        return response()->json($employee, 200);
    }

    public function getdepartment($id)
    {
        $dept=Employee::where('id','=',$id)->with('department')->get();
        return response()->json($dept, 200);
    }

    
}
