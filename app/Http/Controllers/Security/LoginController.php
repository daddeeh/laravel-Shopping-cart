<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Sentinel;
use Validator;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;

class LoginController extends Controller
{
    public function login(){
  
      return view('security.login');
    }
    public function postLogin(Request $request){
      Sentinel::disableCheckpoints();
      $errorMsgs = [
        'email.required' => 'Please provide email id',
        'email.email' => 'The email must be a valid email',
        'password.required' => 'Password is required'
      ];
      $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required'
      ], $errorMsgs);
      if($validator->fails()){
        $returnData = array(
          'status' => 'error',
          'message' => 'Please review fields',
          'errors' => $validator->errors()->all()
        );
        return response()->json($returnData, 500);
      }
    if($request->remember == 'on'){
      try{
         $user = Sentinel::authenticateAndRemember($request->all());
      }catch(ThrottlingException $e){
        $delay = $e->getDelay();
        $returnData = array(
          'status' => 'error',
          'message' => 'Please review',
          'errors' => ["You are banned for $delay seconds"]
        );
        return response()->json($returnData, 500);
      }catch(NotActivatedException $e){
        $returnData = array(
          'status' => 'error',
          'message' => 'Please review',
          'errors' => ["Please Activate your account"]
      );
      return response()->json($returnData, 500);
    }
      }else{
        try{
           $user = Sentinel::authenticate($request->all());
        }catch(ThrottlingException $e){
          $delay = $e->getDelay();
          $returnData = array(
            'status' => 'error',
            'message' => 'Please review',
            'errors' => ["You are banned for $delay seconds"]
          );
          return response()->json($returnData, 500);
        }catch(NotActivatedException $e){
          $returnData = array(
            'status' => 'error',
            'message' => 'Please review',
            'errors' => ["Please Activate your account"]
        );
        return response()->json($returnData, 500);
        }

    }
    if(Sentinel::check()){
       return redirect(url('/index'));
      }else{
        $returnData = array(
          'status' => 'error',
          'message' => 'Please review',
          'errors' => ["Email or Password mismatched"]
      );
      return response()->json($returnData, 500);
        }
        }
        public function postlogout(){
           Sentinel::logout();
          return redirect(url('/'));
          }
}
