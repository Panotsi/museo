<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Otp;
use Illuminate\Support\Facades\Mail;

class AdminAuthController
{
    public function showLogin()
    {
        return view('admin-login');
    }
    public function login(Request $request)
    {
        $email = "ocfemiaarjay30@gmail.com";
        $password = "arjay123";
        if($request->email == $email && $request->password == $password){
            $otp = rand(100000,999999);
            Otp::create([
                'email'=>$email,
                'otp'=>$otp,
                'expires_at'=>now()->addMinutes(5)
                ]);
                Mail::raw("Your login OTP code is: ".$otp,function($message) use ($email){
                    $message->to($email)
                    ->subject('Admin Login Verification');
                });
                session(['otp_email'=>$email]);
                return redirect('/verify-otp');
        }
        return back()->with('error','Invalid login');
        }
        public function showOtp(){
            return view('verify-otp');
        }
        public function verifyOtp(Request $request){
            $record = Otp::where('email',session('otp_email'))
            ->where('otp',$request->otp)
            ->where('expires_at','>',now())
            ->first();
        if($record){
            session(['admin_logged_in'=>true]);
            return redirect('/admin');
        }
        return back()->with('error','Invalid OTP');
        }
        public function logout(){
            session()->forget('admin_logged_in');
            return redirect('/login');
        }

}
