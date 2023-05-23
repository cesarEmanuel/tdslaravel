<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function create()
    {
        return view('pages.profile');
    }

    public function update()
    {
            
        $user = request()->user();
        $attributes = request()->validate([
            'email' => 'required|email|unique:users,email,'.$user->id,
            'name' => 'required',
            'phone' => 'max:12',
            'about' => 'max:150'
        ]);

        auth()->user()->update($attributes);
        return back()->withStatus('Profile successfully updated.');
        
    }
    public function show(){
        return view('pages.user-profile');
    }
}
