<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users')->with('users' , $users);
    }

    public function change($id){
        $user = User::query()->find($id);
        $roles = Role::all();

        return view('admin.changerole')->with('user', $user)->with('roles', $roles);
    }

    public function updateRole($id, Request $request){
        $user = User::query()->find($id);

        $user->role_id = $request->role;
        $user->save();

        return redirect(route('users.index'))->with('msg', 'role changed successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     */
    public function destroy($id)
    {
        $user = User::query()->find($id);
        DB::table('books_requests')->where('user_id', $id)->delete();
        $user->delete();
        return redirect(route('users.index'))->with('msg', 'deleted successfully');
    }

    public function accept($id, Request $request){
        $user = User::query()->find($id);
        $user->status = 1;
        $user->save();
        return redirect(route('users.index'))->with('msg', 'user accepted successfully');
    }
}
