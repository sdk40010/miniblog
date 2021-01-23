<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Post\createRequest;
use App\Models\Reply;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user'])->latest()->get();
        return view ('index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(CreateRequest $request)
    {
        $post = new Post;
        $post->fill($request->all());
        $post->user()->associate(Auth::user());
        $post->save();

        return redirect()->to('/');
    }

    public function delete(Post $post)
    {
        if (Auth::user()->cant('delete', $post)) {
            abort(403);
        }

        $post->delete();

        return redirect()->to('/');
    }

    public function show(Post $post)
    {
        $post->load('replies.user');
        $isBookmarked = $post->bookmarkingUsers->contains(Auth::id());

        return view('posts.show', ['post' => $post, 'isBookmarked' => $isBookmarked]);
    }

    public function reply(Request $request, Post $post)
    {
        $reply = new Reply;
        $reply->fill($request->all());
        $reply->user()->associate(Auth::user());
        $reply->post()->associate($post);
        $reply->save();

        return redirect()->back();
    }
}
