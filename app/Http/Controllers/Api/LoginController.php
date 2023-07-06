<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        $user_id = request()->input('user_id');

        $userDetail = User::where('id', $user_id)->with('user')->firstOrFail();

        $user = [];
        $user['email']= $userDetail['email'];
        $user['name']= $userDetail['name'];
        $user['surname']= $userDetail['surname'];

        return response()->json($userDetail);
    
    }
}
