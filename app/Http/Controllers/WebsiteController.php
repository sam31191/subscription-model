<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Website;

class WebsiteController extends Controller
{
    public function create(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|unique:websites,name'
            ]);
            $website = Website::create($request->only('name')); 
            return response()->json($website, 201);
        } catch (ValidationException $e) {
            return $e->validator->errors();
        }
    }
}
