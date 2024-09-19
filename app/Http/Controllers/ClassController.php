<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClassController extends Controller
{
    public function listing(Request $request)
    {
        // Get the token from session
        $token = $request->session()->get('token');

        // Check if the token exists
        if (!$token) {
            return redirect()->route('login')->with('error', 'You need to log in first.');
        }

        // Fetch class listings from the API
        $response = Http::withHeaders([
            'Authorization' => "Bearer $token",
            'Accept' => 'application/json',
        ])->get('https://internal.stockpathshala.in/api/v1/live_classes');

        if ($response->successful()) {
            // Decode the JSON response
            $data = $response->json();
    
            // Access the data array
            $classes = $data['data']['data'] ?? []; // Use null coalescing operator to handle cases where 'data' might not exist
    
            // Return the view with the classes data
            return view('listing', ['classes' => $classes]);
        } else {
            // Redirect to login with an error message if the request failed
            return redirect()->route('login')->with('error', 'Failed to fetch class listings.');
        } 
      }

}
