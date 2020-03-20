<?php 

namespace App\Http\Managers;

class CartInstancesManager {
    public function getInstance($session) {
        return \Cart::session($session);
    }
}