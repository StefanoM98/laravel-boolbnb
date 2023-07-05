<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Braintree\Gateway;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function generate(Request $request,Gateway $gateway){
        return 'generate';
    }

    public function makePayment(Request $request,Gateway $gateway){
        return 'makePayment';
    }
}
