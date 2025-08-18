<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    // Ambil semua post
    public function index()
    {
        return Post::orderBy('created_at', 'desc')
            ->get(['id', 'title', 'slug', 'content', 'author', 'thumbnail', 'created_at'])
            ->map(fn($post) => [
                'id'         => $post->id,
                'title'      => $post->title,
                'slug'       => $post->slug,
                'content'    => $post->content,
                'author'     => $post->author,
                'thumbnail'  => $post->thumbnail ? asset('storage/' . $post->thumbnail) : null,
                'created_at' => $post->created_at,
            ]);
    }

    // Detail post berdasarkan slug
    public function show($slug)
    {
        $post = Post::where('slug', $slug)
            ->first(['id', 'title', 'slug', 'content', 'author', 'thumbnail', 'created_at']);

        if (!$post) {
            return response()->json(['message' => 'Post not found.'], 404);
        }

        return response()->json([
            'id'         => $post->id,
            'title'      => $post->title,
            'slug'       => $post->slug,
            'content'    => $post->content,
            'author'     => $post->author,
            'thumbnail'  => $post->thumbnail ? asset('storage/' . $post->thumbnail) : null,
            'created_at' => $post->created_at,
        ]);
    }
}
