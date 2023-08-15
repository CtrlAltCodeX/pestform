<?php

namespace PostForm\FrontEnd\Http\Controllers;

use Illuminate\Http\Request;
use PostForm\FrontEnd\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (! auth()->check()) {
            return view('front_end::users.register');
        } else {
            return redirect()->route('front_end.dashboard.index');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        request()->validate([
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'email'    => request()->email,
            'password' => Hash::make(request()->password),
        ]);

        
        return redirect()->route('front_end.user.index')->with('success', 'Successfully Register');
    }
}
