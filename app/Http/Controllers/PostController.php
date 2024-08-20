<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Website;
use App\Post;
use App\Jobs\SendPostEmails;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    public function store(Request $request, $websiteId)
    {
        try {
            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string'
            ]);
            $website = Website::findOrFail($websiteId);
            $post = Post::create([
                'title' => $request->title,
                'description' => $request->description,
                'website_id' => $website->id
            ]);
            // Queue the emails
            SendPostEmails::dispatch($post);
            return response()->json($post, 201);
        } catch (ValidationException $e) {
            return $e->validator->errors();
        }
    }
}
