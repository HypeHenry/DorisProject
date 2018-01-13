<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'appointment_id' => 'required',
            'user_id' => 'required',
        ]);
        $appointment_id = $request->input('appointment_id');
        $user_id = $request->input('user_id');

        $appointment = [
            'title' => 'Title',
            'description' => 'Description',
            'time' => 'Time',
            'view_appointment' => [
                'href' => 'api/v1/appointment/1',
                'method' => 'GET'
            ]
        ];

        $user = [
            'name' => 'Name'
        ];

        $response = [
            'msg' => 'User registered for appointment',
            'appointment' => $appointment,
            'user' => $user,
            'unregister' => [
                'href' => 'api/v1/appointment/registration/1',
                'method' => 'DELETE'
            ]
        ];

        return response()->json($response, 201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = [
            'title' => 'Title',
            'description' => 'Description',
            'time' => 'Time',
            'view_appointment' => [
                'href' => 'api/v1/appointment/1',
                'method' => 'GET'
            ]
        ];

        $user = [
            'name' => 'Name'
        ];

        $response = [
            'msg' => 'User registered for appointment',
            'appointment' => $appointment,
            'user' => $user,
            'register' => [
                'href' => 'api/v1/appointment/registration',
                'method' => 'POST',
                'params' => 'user_id, appointment_id'
            ]
        ];
        return response()->json($response, 200);
    }
}
