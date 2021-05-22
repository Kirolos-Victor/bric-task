<?php

namespace App\Http\Controllers;

use App\Events\SendCreateEmailEvent;
use App\Events\SendUpdateEmailEvent;
use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        //lazy loading
        $posts=Auth()->user()->posts()->get();
        return view('posts.index',compact('posts'));
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(PostRequest $request)
    {
        $user=Auth()->user();
       $user->posts()->create($request->all());
       event(new SendCreateEmailEvent($user));
        return redirect()->route('posts.index')->with('status','Post Created Successfully');

    }

    public function show(Post $post)
    {
        //
    }


    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());
        $user=$post->user();
        event(new SendUpdateEmailEvent($user));
        return redirect()->route('posts.index')->with('status','Post Updated Successfully');

    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('status','Deleted Successfully');
    }
}
