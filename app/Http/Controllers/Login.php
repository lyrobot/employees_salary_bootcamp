<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Login extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'email'=>['required', 'email'],
            'password'=>['required', 'min: 4', 'max: 16']
        ]);
        if (!$token = auth()->attempt($request->all())){
            return response()->json(['error'=>'unauthorized', 401]);
        }

        return response()->json([
            'token'=>$token
        ]);
    }
}
