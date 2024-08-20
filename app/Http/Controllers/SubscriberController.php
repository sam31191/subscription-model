<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Website;
use App\Subscriber;

class SubscriberController extends Controller
{
    public function subscribe(Request $request, $websiteId)
    {
        try {
            $request->validate([
                'email' => 'required|email'
            ]);
            $website = Website::findOrFail($websiteId);
            $subscriber = Subscriber::create([
                'email' => $request->email,
                'website_id' => $website->id
            ]);
    
            return response()->json($subscriber, 201);
        } catch (ValidationException $e) {
            return $e->validator->errors();
        }
    }
}
