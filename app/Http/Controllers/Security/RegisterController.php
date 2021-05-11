<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Sentinel;
class RegisterController extends Controller
{
    public function register(){
      return view('security.register');
    }
    public function registerUser(Request $request){
      $user = Sentinel::registerAndActivate($request->all());
      echo 'User registered';
    return redirect('/');

    }
}
