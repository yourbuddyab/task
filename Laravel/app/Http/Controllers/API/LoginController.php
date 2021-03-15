<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response(['success' => false,'error' => $validator->errors()]);
        }
        
        if(!$this->guard()->attempt(['email' => $request->email,'password' => $request->password])){
            return response(['success' => false,'error' => [
                'email'=>'The provided credentials are incorrect.'
            ]]);
        }

        $user = $this->guard()->user();
    
        return $user->createToken($request->device_name)->plainTextToken;
    }

    protected function guard($name='web')
    {
        return Auth::guard($name);
    }
}
