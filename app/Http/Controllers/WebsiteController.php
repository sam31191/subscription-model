<?php

namespace App\Http\Controllers;

use App\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:websites,name'
        ]);

        $website = Website::create($request->only('name'));

        return response()->json($website, 201);
    }
}
