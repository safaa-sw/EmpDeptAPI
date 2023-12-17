<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depts= Department::all();
        return response()->json($depts, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dept=Department::create($request->all());
        $dept->save();
        return response()->json($dept, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        $dept=Department::find($department->id);
        return response()->json($dept, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $dept=Department::find($department->id);
        $dept->name=$request->name;
        $dept->save();
        return response()->json($dept, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $dept=Department::find($department->id)->delete();
        return response()->json($dept, 200);
    }

    public function getEmployees($id)
    {
        $employees=Employee::with('department')->where('dept_id',$id)->get();
        //$employees=Department::where('id','=',$id)->with('employees')->get();
        return response()->json($employees, 200);
    }
}
