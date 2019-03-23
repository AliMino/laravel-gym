<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\RegisterAuthRequest;
use App\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function register(RegisterAuthRequest $request)
    {
        $member = new Member();
        $member->name = $request->name;
        $member->email = $request->email;
        $member->gender=$request->gender;
        $member->password = bcrypt($request->password);
        $member->save();

        return response()->json([
            'success' => true,
            'data' => $member
        ], 200);
    }
}
