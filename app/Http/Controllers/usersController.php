<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class usersController extends Controller
{
    public function index(){
        $this->authorize('is_admin');
        return view('users/user', [
            'title' => 'Patroli Cwf',
            'active' => 'users',
            'slug' => 'tambah-user',
            'page' => 'Users / user',
            'users' => Users::latest()->get()
        ]);
    }

    public function show(Users $users, Profiles $profiles){
        dd($profiles);
    }

    public function destroy($id)
    {
        $users = Users::find($id);
        $users->delete();
        return response()->json([
            'status'=>200,
            'message'=>'User deleted Successfully',
        ]);
    }
}


