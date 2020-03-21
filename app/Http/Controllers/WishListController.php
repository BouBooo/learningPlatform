<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Managers\CartInstancesManager;

class WishListController extends Controller
{
    private $cart;

    public function __construct(CartInstancesManager $cart) {
        $this->cart = $cart;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function switchToCart($id)
    {
        $course = Course::find($id);
        $this->cart->getInstance(Auth::user()->id.'wishlist')->remove($id);
        $add = $this->cart->getInstance(Auth::user()->id)->add([
            'id' => $course->id,
            'name' => $course->title,
            'price' => $course->price,
            'quantity' => 1,
            'associatedModel' => $course
        ]);
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        \Cart::session(Auth::user()->id)->remove($id);
        $course = Course::find($id);

        // New cart instance for wishlist
        $wishlist = \Cart::session(Auth::user()->id.'wishlist')->add([
            'id' => $course->id,
            'name' => $course->title,
            'price' => $course->price,
            'quantity' => 1,
            'associatedModel' => $course
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cart->getInstance(Auth::user()->id.'wishlist')->remove($id);
        return redirect()->back();
    }
}
