<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UpdateMemberRequest;
use App\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{

    public function update(UpdateMemberRequest $request,$member)
    {

        $member=Member::findorfail($member);
        $member->name = $request->name;
        $member->gender=$request->gender;
        $member->profile_img=$request->profile_img;
        $member->date_of_birth=$request->date_of_birth;
        $member->password = bcrypt($request->password);
        $member->save();

        return response()->json([
            'success' => true,
            'Message'=>'updated data successfully',
            'data'=>$member,
        ]);
    }
}
