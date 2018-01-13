<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'mobilenumber' => 'required|min:10'
        ]);
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $mobilenumber = $request->input('mobilenumber');


        $user = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'mobilenumber' => $mobilenumber,
            'signin' => [
                'href' => 'api/v1/user/signin',
                'method' => 'POST',
                'params' => 'email, password'
            ]
        ];

        $response = [
            'msg' => ' customer created',
            'user' => $user
        ];
        return response()->json($response, 201);
    }

    public function signin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        $user = [
            'name' => 'Name',
            'email' => $email,
            'password' => $password
        ];

        $response = [
            'msg' => 'Customer signed in',
            'user' => $user
        ];

        return response()->json($response, 200);
    }
}
