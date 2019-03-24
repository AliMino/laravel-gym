<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;
use App\TrainingPackage;
use App\Gym;
use App\Http\Requests\Payment\StorePaymentRequest;
class PaymentController extends Controller
{
    public function create()
    {
        return view('payments.create',['members'=>Member::all(),'packages'=> TrainingPackage::all(),'gyms'=>Gym::all(),]);
    }
    public function store(StorePaymentRequest $request)
    {
        dd($request);
    }
}
