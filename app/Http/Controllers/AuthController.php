<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }
    public function submitLogin(Request $request)
    {

        $request->validate([
            'user_name' => 'required|digits:10',
        ]);

        $response = Http::post('https://internal.stockpathshala.in/api/v1/login-register', [
            'user_name' => $request->input('user_name'),
            'hash_code' => '96pYMmXfHNR',
        ]);
// dd($response);
        if ($response['status']) {
            
            return redirect()->route('verify.otp')->with([
                'user_name' => $request->input('user_name'),
                'success_message' => $response['message']
            ]);
        }  else {
            return redirect()->back()->with('login_error', 'Login failed. Please try again.');
        }
    }

    public function otpForm()
    {
        return view('otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'user_name' => 'required|digits:10',
            'otp' => 'required|digits:4',
        ]);

        $response = Http::post('https://internal.stockpathshala.in/api/v1/verify-login-register', [
            'user_name' => $request->input('user_name'),
            'otp' => $request->input('otp'),
        ]);

$responseData = $response->json();
// dd($responseData)

        if ($responseData['status']) {
            $request->session()->put('token', $responseData['token']);
            return redirect()->route('classes.list')->with('success', 'You are logged in now.');
        } else {
            return redirect()->back()->with('otp_error', 'OTP verification failed. Please try again.');
        }
    }
}