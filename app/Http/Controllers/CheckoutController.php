<?php

namespace App\Http\Controllers;

use App\CourseUser;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function paiement() {
        $cart = \Cart::session(Auth::user()->id)->getContent();
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));


        return view('checkout.paiement', [
            'cart' => $cart
        ]);
    }

    public function charge(Request $request) {
        \Stripe\Stripe::setApiKey(env('STRIPE_PRIVATE_KEY'));

        try {
            $charge = \Stripe\Charge::create([
                'amount' => \Cart::session(Auth::user()->id)->getTotal() * 100,
                'currency' => 'eur',
                'description' => 'My Website Order',
                'source' => $request->request->get('stripeToken'),
                'receipt_email' => Auth::user()->email,
            ]); 

            foreach(\Cart::session(Auth::user()->id)->getContent() as $item) {
                CourseUser::create([
                    'user_id' => Auth::user()->id,
                    'course_id' => $item->model->id
                ]);
            }
        
            return redirect()->route('checkout.success')->with('success', 'Votre paiement a bien été accepté !');
        }
        catch(\Stripe\Exception\CardErrorException $e) {
            throw $e;
        }
    }

    public function success() {
        $order = \Cart::session(Auth::user()->id)->getContent();
        foreach(\Cart::session(Auth::user()->id)->getContent() as $cartItem) {
            \Cart::session(Auth::user()->id)->remove($cartItem->id);
        }
        return view('checkout.success', [
            'order' => $order
        ]);
    }
}
