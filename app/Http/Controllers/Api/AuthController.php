<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\RegisterAuthRequest;
use App\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\JWT;


class AuthController extends Controller
{
    public function register(RegisterAuthRequest $request)
    {
        $member = new Member();
        $member->name = $request->name;
        $member->email = $request->email;
        $member->gender=$request->gender;
        $member->profile_img=$request->profile_img;
        $member->date_of_birth=$request->date_of_birth;
        $member->password = bcrypt($request->password);
        $member->save();

        $member->sendEmailVerificationNotification();
        

        return $this->login($request);

    }

    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $jwt_token = null;
        config()->set( 'auth.defaults.guard', 'api' );
        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }

        $id = Auth::user()->id;
        $currentuser = Member::find($id);

        return response()->json([
            'success' => true,
            'data'=>$currentuser,
            'token' => $jwt_token,
        ]);
    }
}
