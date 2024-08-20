<?php

namespace App\Http\Controllers;

use App\Website;
use App\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request, $websiteId)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $website = Website::findOrFail($websiteId);

        $subscriber = Subscriber::create([
            'email' => $request->email,
            'website_id' => $website->id
        ]);

        return response()->json($subscriber, 201);
    }
}
