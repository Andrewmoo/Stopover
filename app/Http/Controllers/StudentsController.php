<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\User;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->type != 'guest' || auth()->user()->completeReg == '1')
        {
            return redirect('/');
        }

        $user_id = auth()->user()->id;
        return view('students.create')->with('user_id', $user_id);
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
            'firstName' => 'required|string|max:191',
            'lastName' => 'required|string|max:191',
            'email' => 'required|string|email|max:191',
            'address' => 'required|string|max:191',
            'phone' => 'required|string|max:50',
            'institution' => 'required|string|max:191',
            'user_id' => 'required|numeric|exists:users,id'
        ]);
  
        //create student
        $student = new Student;
        $student->firstName = $request->input('firstName');
        $student->lastName = $request->input('lastName');
        $student->email = $request->input('email');
        $student->address = $request->input('address');
        $student->phone = $request->input('phone');
        $student->institution = $request->input('firstName');
        $student->user_id = $request->input('user_id');
        $student->save();

        User::where('id', $student->user_id)->update(array('completeReg' => '1'));

        return redirect('/');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
