<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{


    public function index()
    {
        return response()->json(["ok" => true, 'posts' => Post::all()], 200);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required| string |max:255',
            'author' => 'required| string | max:255',
            'excerpt' => 'required|min:50',
            'text' => 'required|min:150',
        ]);

        $post = Post::create($validated);
        return response()->json(["ok" => true, "post" => $post], 201);
    }


    public function show(Post $post)
    {

        return response()->json(["ok" => true, "post" => $post], 200);
    }
}
