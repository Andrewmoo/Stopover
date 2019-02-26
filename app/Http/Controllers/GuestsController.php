<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Guest;
use App\User;

class GuestsController extends Controller
{   
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
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
            'user_id' => 'required|numeric|exists:users,id'
        ]);
  
        // create guest
        $guest = new Guest;
        $guest->firstName = $request->input('firstName');
        $guest->lastName = $request->input('lastName');
        $guest->email = $request->input('email');
        $guest->address = $request->input('address');
        $guest->phone = $request->input('phone');
        $guest->user_id = $request->input('user_id');
        $guest->save();

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
        $guest = Guest::find($id);
        if(!Auth::user()->hasRole('guest') || $guest->user_id != Auth::user()->id)
        {
            return redirect()->back()->with('error', 'Invalid request.');
        }
        return view('guests.edit')->with('guest', $guest);
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
            'firstName' => 'required|string|max:191',
            'lastName' => 'required|string|max:191',
            'email' => 'required|string|email|max:191',
            'address' => 'required|string|max:191',
            'phone' => 'required|string|max:50',
        ]);
  
        // update guest
        $guest = Guest::find($id);
        $guest->firstName = $request->input('firstName');
        $guest->lastName = $request->input('lastName');
        $guest->email = $request->input('email');
        $guest->address = $request->input('address');
        $guest->phone = $request->input('phone');
        $guest->save();

        return redirect('/dashboard')->with('success', "Details modified successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
