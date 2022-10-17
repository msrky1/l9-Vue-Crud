<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeControlle extends Controller
{
    public function index()
    {
        $students = Employee::all();
        return response()->json($students);
    }
    
    public function show($id)
    {
        $students = Employee::find($id);
        return response()->json($students);
    }

 public function update(Request $request , $id)
    {
        $employee = Employee::find($id);
        $employee->update($request->all());
        return response()->json('Employee Updated');
    }

    public function delete($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return response()->json('Employee Deleted');
    }
    
    public function store(Request $request)
    {
          
            $employee = new Employee([


                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'mobile' => $request->input('mobile'),

            ]);


                   
            $employee->save();
            return response()->json('Employee Created');
          
     
    }
    
}
