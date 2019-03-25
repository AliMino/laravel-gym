<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;
use App\TrainingPackage;
use App\Gym;
use App\Http\Requests\Payment\StorePaymentRequest;
use Cartalyst\Stripe\Stripe;
use App\PurchasedPackage;
use DB;
class PaymentController extends Controller
{
    public function create()
    {
        return view('payments.create',['members'=>Member::all(),'packages'=> TrainingPackage::all(),'gyms'=>Gym::all(),]);
    }
    public function store(StorePaymentRequest $request)
    {
        $request->validated();
        $package=DB::table('training_packages')->where('id', $request->get('package-id'))->first();
        $this->acceptPayment($request,$package);
        $payment=[
            "_token"=>$request->get('_token'),
            "user_id"=>$request->get('member-id'),
            'package_id'=>$request->get('package-id'),
            'paid_price'=> $package->price_cent,
            'num_of_sessions'=> $package->no_of_sessions,
            'attended_sessions'=>0,
            'gym_id'=>$request->get('gym-id'),
        ];
        PurchasedPackage::create($payment);
        return redirect()->route('packages.index');
    }
    private function acceptPayment($request,$package){
        $stripe = Stripe::make(env('STRIPE_SECRET'));
        try {
            $token = $stripe->tokens()->create([
                'card' => [
                    'number'    => $request->get('card_no'),
                    'exp_month' => $request->get('expiry_month'),
                    'exp_year'  => $request->get('expiry_year'),
                    'cvc'       => $request->get('cvv'),
                ],
            ]);
            if (!isset($token['id'])) {
                return Redirect::to('strips')->with('Token is not generate correct');
            }
            $charge = $stripe->charges()->create([
                'card' => $token['id'],
                'currency' => 'Cent',
                'amount'   => $package->price_cent,
            ]);




            } catch (\Exception $ex) {
                return $ex->getMessage();
            }
    }
}






