<?php

namespace App\Http\Controllers;

use App\employee;
use Illuminate\Http\Request;
use File;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //echo "create employee";
        return view('create_employee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = new employee();
        $res->fname = $request->input('fname');
        $res->lname = $request->input('lname');
        $res->email = $request->input('email');
        $res->hobbies = $request->input('hobbies');
        $res->gender = $request->input('gender');
        $res->joining_date = $request->input('joining_date');
        $res->department = $request->input('department');

        $request->validate([

            'emp_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $imageName = time().'.'.$request->emp_img->extension();

        $request->emp_img->move(public_path('assets/images'), $imageName);
        $res->emp_img = $imageName;
        $res->save();
        $request->session()->flash('msg','Form submitted successfully');

        return redirect('employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        // $data = employee::all();
        // return view('employee',['data' => $data]);
        return view('employee')->with('data',employee::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(employee $employee,$id)
    {
        return view('editEmployee')->with('data',employee::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employee $employee)
    {
        $res = Employee::find($request->id);
        $file_path = public_path('assets\images\\').$res->emp_img;
        $res->fname = $request->input('fname');
        $res->lname = $request->input('lname');
        $res->email = $request->input('email');
        $res->hobbies = $request->input('hobbies');
        $res->gender = $request->input('gender');
        $res->joining_date = $request->input('joining_date');
        $res->department = $request->input('department');

        $request->validate([

            'emp_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $imageName = time().'.'.$request->emp_img->extension();
        $res->emp_img = $imageName;
        //echo $file_path;die;
        File::delete($file_path);
        $request->emp_img->move(public_path('assets/images'), $imageName);
        
        $res->save();
        
        $request->session()->flash('msg','Form updated successfully');

        return redirect('employee');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(employee $employee,$id)
    {
        Employee::destroy(array('id' => $id));
        return redirect('employee');
    }
}
