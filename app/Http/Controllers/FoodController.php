<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FoodController extends Controller
{
    public function explore($locale = 'en')
    {
        App::setLocale($locale);
        return view("foods.explore");
    }
    public function myfoods($locale = 'en')
    {
        App::setLocale($locale);
        return view("foods.my-foods");
    }
    public function newPost($locale = 'en')
    {
        App::setLocale($locale);
        return view("foods.new-post");
    }
    public function editPost($locale = 'en')
    {
        App::setLocale($locale);
        return view("foods.edit-post");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'foodImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:1048',
            'title' => 'required|string|max:40',
            'description' => 'required|string|max:100',
            'content' => 'string|max:1000',
        ]);

        $image_path = $request->file('foodImage')->store('images', 'public');

        // $post = $request->user()->posts()->create($validated);
        // event(new RealTimeMessage('New post: <a href="'.route('foods.show',$post->id).'">'.$post->title.'</a>'));
        
        return redirect(route('foods.my-foods'))->with('status', 'post-added');
    }
}
