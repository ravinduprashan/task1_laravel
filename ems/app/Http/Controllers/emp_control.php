<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class emp_control extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=Employee::all()->toArray();
        return view('pages.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.insert'); //accessing insert.blade.php view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
        'name' => 'required',
        'email' => 'required',
        'tel' => 'required',
        'jdate' => 'required',
        'route' => 'required',
        'comment' => 'required' //validations:fields must contain data
       ]);
       $employee = new Employee([
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'tel' => $request->get('tel'),
        'jdate' => $request->get('jdate'),
        'route' => $request->get('route'),
        'comment' => $request->get('comment') //

       ]);
       $employee->save(); //inserting fields data to database
       return redirect()->route('employee.index')->with('success','Data added'); //validating
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee =Employee::find($id);
        return view('pages.edit', compact('employee','id'));
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
        $this->validate($request,[
        'name' => 'required',
        'email' => 'required',
        'tel' => 'required',
        'jdate' => 'required',
        'route' => 'required',
        'comment' => 'required' //validations:fields must contain data
       ]);
        $employee = Employee::find($id);
        $employee->name =$request->get('name');
        $employee->email =$request->get('email');
        $employee->tel =$request->get('tel');
        $employee->jdate =$request->get('jdate');
        $employee->route =$request->get('route');
        $employee->comment =$request->get('comment');
        $employee->save(); //updating in database
        return redirect()->route('employee.index')->with('success','data updated'); //updating validation
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employee.index')->with('success','Data Deleted');
    }
}
