<?php

namespace PostForm\FrontEnd\Http\Controllers;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Show the application Login page or Dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (! auth()->check()) {
            return view('front_end::users.login');
        } else {
            return redirect()->route('back_end.form.index');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        if (auth()->attempt(request()->except('_token', 'remember'))) {
            return redirect()->route('back_end.form.index');
        } else {
            return redirect()->back()->with('error', 'Email/Passowrd is Wrong');
        }
    }

    /**
     * Log Out the User
     */
    public function logout()
    {
        if (! auth()->logout()) {
            return redirect()->route('front_end.home');
        }
    }
}
