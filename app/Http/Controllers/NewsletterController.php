<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Newsletter\Newsletter;

class NewsletterController extends Controller
{
    public function subscribe(Request $request) {
        if(\Newsletter::isSubscribed($request->request->get('email')) ) {
            return redirect()->back();
        }
        \Newsletter::subscribe($request->request->get('email'));
        return redirect()->back()->with('success', 'Vous êtes maintenant abonné notre newsletter et serez informé des tous nouveaux cours mis en ligne sur le site !');
    }
}
