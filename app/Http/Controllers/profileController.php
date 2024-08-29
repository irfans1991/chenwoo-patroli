<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Profiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profiles  $profiles
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $user = Users::find($id);
        
        $name = Auth::user()->name;
        $pecahkan = explode(" ", $name);
        return view('profile.index', [
                'title' => 'Patroli Cwf',
                'active' => 'document',
                'page' => 'Profile',
                'profiles' => $user->profile,
                'pecahNama' => $pecahkan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profiles  $profiles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $users = Users::find($id);
            return view('profile.edit', [
                'title' => 'Patroli Cwf',
                'active' => 'document',
                'page' => 'Profile',
                'users' => $users->profile,
                'user' => $users,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profiles  $profiles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $validateData = $request->validate([
            'users_id' => 'sometimes',
            'tgl_lahir' => 'required',
            'email' => 'required|email:dns',
            'alamat' => 'required',
            'telp' => 'required',
            'grub' => 'required',
            'photo' => 'required|image|file|max:2024',
        ]);

        $validateData['photo'] = $request->file('photo')->store('photo');
        Profiles::updateOrCreate(['users_id' => $id], $validateData);
        // dd($validateData);
        return redirect('/users')->with('success', 'Update Profile, Successfull !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profiles  $profiles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profiles $profiles)
    {
        //
    }
}
