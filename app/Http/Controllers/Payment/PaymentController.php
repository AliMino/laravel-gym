<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;
use App\TrainingPackage;
use App\Gym;
use App\Http\Requests\Payment\StorePaymentRequest;
use Cartalyst\Stripe\Stripe;
class PaymentController extends Controller
{
    public function create()
    {
        return view('payments.create',['members'=>Member::all(),'packages'=> TrainingPackage::all(),'gyms'=>Gym::all(),]);
    }
    public function store(StorePaymentRequest $request)
    {
        $request->validated();
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
                'amount'   => 20,
            ]);
             return 'Payment Success';
            } catch (\Exception $ex) {
                return $ex->getMessage();
            }
    }
}










// $ch = \Stripe\Charge::retrieve(
//     "ch_1EHWPuH1duK36duxqIphkQJq",
//     ['api_key' => "sk_test_dK0QWZrL5rdmp8XuDHaT1uxk00Lx8CsVTw"],
//   );
//   $ch->capture(); // Uses the same API Key.

