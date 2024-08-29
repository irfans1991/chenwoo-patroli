<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Profiles;
use Illuminate\Support\Facades\Hash;

class tambahUserController extends Controller
{
    public function index($slug){
        return view('users/tambah', [
            'title' => 'Patroli Cwf',
            'active' => 'users',
            'slug' => 'tambah-user',
            'page' => 'Users / Tambah'
        ]);

    }

    public function store(Request $request){
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'password' => 'required|min:5|max:255|confirmed',
            'password_confirmation' => 'required',
            'level' => 'required'
        ]);
        
        $validatedData['password'] = Hash::make($validatedData['password']);
        Users::create($validatedData);
        return redirect('/users')->with('success', 'Create data User, Successfull !');
    }

    public function edit(Users $user, $id)
    {
        $users = Users::find($id);
        return view('users.edit', [
            'title' => 'Patroli Cwf',
            'active' => 'users',
            'page' => 'Users / Edit',
            'slug' => 'tambah-user',
            'users' => $users,
        ]);
    }

    public function update(Request $request, Users $users)
    {
        
        $validatedData = $request->validate([
            'name' => 'sometimes',
            'username' => 'sometimes',
            'password' => 'required|min:5|max:255|confirmed',
            'level' => 'required'
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        Users::where('id', $users->id)
            ->update($validatedData);
            return redirect('/users')->with('success', 'Update data User, Successfull !');
    }
}
