<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;

class MembersController extends Controller
{
    public function index(){
        $members=Member::all();
        return view('members.index',[
            'members'=>$members,
        ]);
    }

    public function data_member(){
        return datatables()->of(Member::all())->toJson();
    }
}
