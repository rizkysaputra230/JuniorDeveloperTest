<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('form');
    }

    /**
     * Show the form for creating a new resource.
     *<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Validator;

class FormController extends Controller
{

    public function index()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'username' => 'required|max:50|unique:form',
            'gender' => 'required|max:10',
            'birth_date' => 'required|date',
            'terms' => 'required',
        ]);

        if (!$validator->passes()) {
            $output = [
                'message' => $validator->errors()->all()
            ];
            return response()->json($output, 422);
        }

        $data = new Form();
        $data->first_name = $request->input('first_name');
        $data->last_name = $request->input('last_name');
        $data->username = $request->input('username');
        $data->gender = $request->input('gender');
        $data->birth_date = $request->input('birth_date');
        $data->is_agreed = $request->input('terms') ? 1 : 0;

        $data->save();

        $output = [
            'message' => 'Success',
            'error' => $validator->errors()->all()
        ];

        return response()->json($output, 200);
    }
}
