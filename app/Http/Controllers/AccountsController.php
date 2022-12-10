<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('editprofile')->with('user', $user);
    }

    public function edituser()
    {
        $user = User::find(auth()->user()->id);
        return view('editprofile')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if(isset($request->p)){
            $request->validate([
                'password' => 'required|min:8|confirmed',
            ]);

            $user->password = bcrypt($request->password);
            $user->save();

            return redirect(route('profile.edit' , $id))->with('msg' , 'password Edited');
        }
        else{
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'number' => 'required',
                'matricule' => 'required',
                'date' => 'required',
            ]);

            if($user->email != $request->email){
                $request->validate([
                    'email' => 'unique:users'
                ]);
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->number = $request->number;
            $user->matricule = $request->matricule;
            $user->date = $request->date;
            $user->save();

            return redirect(route('profile.edit' , $id))->with('msg' , 'informations Edited');
        }
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
