<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Image;
use App\Models\Post;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $postValidator = Validator::make($request->all(), [
            'title' => 'required|string|max:40',
            'description' => 'required|string|max:100',
            'content' => 'nullable|string|max:1000',
        ]);
    
        if ($postValidator->fails()) {
            return response()->json(['errors' => $postValidator->errors()], 422);
        }

        $post = $request->user()->posts()->create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
        ]);

        //----

        $imageValidator = Validator::make($request->all(), [
            'postImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:1048'
        ]);

        if ($imageValidator->fails()) {
            return response()->json(['errors' => $imageValidator->errors()], 422);
        }

        $image_path = $request->file('postImage')->store('images', 'public');
        $image = new Image(['path' => $image_path]);
        $post->image()->delete();
        $post->image()->save($image);
        //----

        return response()->json($post->id);
    }
}
