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
        switch(auth()->user()->getRole()->id)
        {
            case 1: $gyms =Gym::all() ; break;
            case 2: $gyms =Gym::where('city_id',auth()->user()->city_id)->get(); break;
            case 3: $gyms =Gym::where('city_id',auth()->user()->gym_id)->get(); break;
        }
        return view('payments.create',['members'=>Member::all(),'packages'=> TrainingPackage::all(),'gyms'=>$gyms,]);
    }
    public function store(StorePaymentRequest $request)
    {
        $request->validated();
        $package=TrainingPackage::where('id', $request->get('package-id'))->first();
        $this->acceptPayment($request,$package);
        $payment=[
            "_token"=>$request->get('_token'),
            "member_id"=>$request->get('member-id'),
            'package_id'=>$request->get('package-id'),
            'paid_price'=> $package->price_cent,
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
                'currency' => 'USD',
                'amount'   => TrainingPackage::getPackagePriceAttribute($package->price_cent),
            ]);



            } catch (\Exception $ex) {
                return $ex->getMessage();
            }
    }
}






