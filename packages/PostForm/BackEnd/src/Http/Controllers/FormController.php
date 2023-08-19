<?php

namespace PostForm\BackEnd\Http\Controllers;

use Illuminate\Support\Str;
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
        $forms = Form::where('user_id', auth()->user()->id)->get();

        return view('back_end::index', compact('forms'));
    }

    /**
     * Create form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('back_end::form.create');
    }

    /**
     * Saving the data
     */
    public function save()
    {
        $formUrl = url('/')."/".Str::random(6);

        $data = request()->data;

        $data['emails'] = json_encode($data['emails']);

        $data['endpoint'] = $formUrl;

        Form::create($data);

        return response()->json([
            'status'  => true,
            'message' => 'Thanks for submission!'
        ]);
    }

    /**
     * Show Forms Messages
     */
    public function show()
    {
        return view('back_end::form.inbox');
    }

    /**
     * Edit Form
     */
    public function edit($id)
    {   
        $form = Form::find($id);

        return view('back_end::form.edit', compact('form'));
    }

    /**
     * Saving the data
     */
    public function update($id)
    {
        $data = request()->data;

        $data['emails'] = json_encode($data['emails']);

        Form::where('id', $id)->update($data);

        return response()->json([
            'status'  => true,
            'message' => 'Thanks for submission!'
        ]);
    }

    /**
     * Delete the Form
     */
    public function delete($id)
    {
        $form = Form::find($id);

        $form->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Form Delete Successfully!'
        ]);
    }
}
