<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentStoreRequester;
use App\Http\Requests\DepartmentUpdateRequester;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $departments=Department::all();
        if(isset($request)){
            $departments=Department::where('name','like','%'.$request->search.'%')->get();
        }
        return view('department.index',compact('departments'));
    }
    public function create()
    {
        return view('department.create');
    }
    public function store(DepartmentStoreRequester $request)
    {
        Department::create($request->validated());
        return redirect()->route('department.index')->with('message',"Department Created Successfully");
    }
    public function edit(Department $department)
    {
        return view('department.edit',compact('department'));
    }
    public function update(DepartmentUpdateRequester $request,Department $department)
    {

        $department->update([
            'name'=> $request->name
        ]);
        return redirect()->route('department.index')->with('message', "Department Updated Successfully");

    }
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('department.index')->with('message', "Department Deleted Successfully");

    }
}
