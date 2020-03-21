<?php

namespace App\Http\Controllers;

use App\Course;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        
        $course = Course::find($id);
        foreach(\Cart::session(Auth::user()->id)->getContent()->toArray() as $item) {
            if($course->id === $item['id']) return redirect()->route('cart.index');
        }

        $add = \Cart::session(Auth::user()->id)->add([
            'id' => $course->id,
            'name' => $course->title,
            'price' => $course->price,
            'quantity' => 1,
            'associatedModel' => $course
        ]);
        return redirect()->route('cart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Cart::session(Auth::user()->id)->remove($id);
        return redirect()->route('cart.index')->with('success', 'Cours supprimé de votre panier.');
    }

    public function clear() {
        $cart =\Cart::session(Auth::user()->id);
        foreach($cart->getContent() as $cartItem) {
            $cart->remove($cartItem->id);
        }
        return redirect()->route('cart.index')->with('success', 'Votre panier a bien été vidé.');
    }
}
