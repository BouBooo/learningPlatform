<?php

namespace App\Http\Controllers;

use App\Payment;
use App\CourseUser;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Managers\PaymentManager;

class CheckoutController extends Controller
{
    public function __construct(PaymentManager $paymentManager) {
        $this->paymentManager = $paymentManager;
    }

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
                $amount = \Cart::session(Auth::user()->id)->getTotal();
                $instructor_part = $this->paymentManager->getInstructorPart(\Cart::session(Auth::user()->id)->getTotal());
                $elearning_part = $this->paymentManager->getElearningPart(\Cart::session(Auth::user()->id)->getTotal());

                CourseUser::create([
                    'user_id' => Auth::user()->id,
                    'course_id' => $item->model->id
                ]);

                Payment::create([
                    'course_id' => $item->model->id,
                    'amount' => $amount,
                    'instructor_part' => $instructor_part,
                    'elearning_part' => $elearning_part,
                    'email' => Auth::user()->email
                ]);
            }
        
            return redirect()->route('checkout.success')->with('success', 'Votre paiement a bien été accepté !');
        }
        catch(\Stripe\Exception\CardErrorException $e) {
            throw $e;
        }
    }

    public function success() {
        if(!session()->has('success')) {
            return redirect()->route('home');
        }
        $order = \Cart::session(Auth::user()->id)->getContent();
        foreach(\Cart::session(Auth::user()->id)->getContent() as $cartItem) {
            \Cart::session(Auth::user()->id)->remove($cartItem->id);
        }
        return view('checkout.success', [
            'order' => $order
        ]);
    }
}
