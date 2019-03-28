<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UpdateMemberRequest;
use App\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{

    public function update(UpdateMemberRequest $request)
    {
        $id = Auth::user()->id;
        $member=Member::findorfail($id);
        if($request->name){$member->name = $request->name;}
        if($request->gender){$member->gender = $request->gender;}
        if($request->date_of_birth){$member->date_of_birth = $request->date_of_birth;}
        if($request->password){$member->password = bcrypt($request->password);}
        if($request->profile_img){
            $path = Storage::disk('public')->put('avatars', $request->profile_img);
            $member->profile_img =$path;}
        $member->save();

        return response()->json([
            'success' => true,
            'Message'=>'updated data successfully',
            'data'=>$member,
        ]);
    }
}
