<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;

class verifyEmailController extends Controller
{
    public function verify(Request $request , $id , $hash){
      
     $user = User::findOrfail($id);

     if(!hash_equals((string) $hash , sha1($user->getEmailForVerification()))){
        return response()->json([
            'message'=>'Your verification link is invalid',
        ],400);
     }

    //check if email is already verified
     if($user->hasVerifiedEmail()){
        return response()->json([
            'message'=>'Email is already verified'
        ],200);
     }

    //mark the user as verified
     $user->MarkAsVerified();
     if($user instanceof MustVerifyEmail){
        event(new Verified($user));
     }

     $user->save();
     return response()->json([
        'message'=>'user saved successfully'
     ],200);
    }
}
