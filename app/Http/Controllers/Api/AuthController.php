<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\RegisterAuthRequest;
use App\Member;
use App\Notifications\ActivateMember;
use App\Notifications\MailNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\JWT;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function register(RegisterAuthRequest $request)
    {
        $member = new Member();
        $member->name = $request->name;
        $member->email = $request->email;
        $member->gender=$request->gender;
        $member->date_of_birth=$request->date_of_birth;
        $member->password = bcrypt($request->password);
        $path = Storage::disk('public')->put('avatars', $request->profile_img);
        $member->profile_img =$path;
        $member->activate_token = Str::random(40);
        $member->save();

        $member->notify(new ActivateMember($member));



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
        $currentuser->last_login=Carbon::now()->toDateString();
        $currentuser->save();

        return response()->json([
            'success' => true,
            'data'=>$currentuser,
            'token' => $jwt_token,
        ]);
    }

    public function ActivateMember($token)
    {

        $member = Member::where('activate_token', $token)->first();

        if (!$member) {
            return response()->json([
                'message' => 'This activation token is invalid.'
            ], 404);
        }

        $member->activate = true;
        $member->activate_token = '';
        $member->save();
        $member->notify(new MailNotification());
        return $member;
    }

    public function logout(Request $request)
    {
        $token = JWTAuth::getToken();
        JWTAuth::invalidate($token);

        return response()->json([
            'success' => true,
            'message' => 'User logged out successfully'
        ]);
    }
}
