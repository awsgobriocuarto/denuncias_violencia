<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Portal;
use App\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        $portals = Portal::get();
        return view('users.edit', compact('user', 'roles', 'portals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        
        $role = Role::find($request->get('role_id'));
        $user->role()->associate($role);
        
        $user->update($request->all());
        
        return back()->with('status', 'Usuario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            return back()->with('status', 'Usuario eliminado correctamente');
        } else {
            return back()->withErrors('El usuario no pudo eliminarse');
        }
    }
}
