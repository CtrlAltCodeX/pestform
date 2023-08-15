<?php

namespace PostForm\BackEnd\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PostForm\BackEnd\Models\Form;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    /**
     * Show the list of form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('front_end::dashboard');
    }

    /**
     * Create form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        return view('back_end::form.create');
    }

    /**
     * Saving the data
     */
    public function create()
    {
        $formUrl = url('/')."/".Str::random(6);

        $data = request()->data;

        $emails = explode("\n", $data['emails']);
        
        $data['emails'] = json_encode($emails);

        $data['endpoint'] = $formUrl;

        Form::create($data);

        return response()->json([
            'status'  => true,
            'message' => 'Thanks for submission!'
        ]);
    }
}
