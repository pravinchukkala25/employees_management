<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Model\Employee;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Employee::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', 
            'email' => 'required|unique:employees|email', 
            'date_of_joining' => 'required', 
            'current_ctc' => 'required',
        ]);

        $employee = new Employee;

        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->date_of_joining = $request->date_of_joining;
        $employee->current_ctc = $request->current_ctc;
        $employee->date_of_relieving = $request->date_of_relieving;
        $employee->save();

        return response([
            'success' => 'Data inserted successfully.',
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return $employee;
    }

 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required', 
            'email' => 'required|email', 
            'date_of_joining' => 'required', 
            'current_ctc' => 'required',
        ]);

       $employee->update($request->all());
       
       return response(['data' => $employee], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
