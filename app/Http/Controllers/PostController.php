<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;

class PostController extends Controller
{
    public function explore($locale = 'en')
    {
        App::setLocale($locale);

        return view("posts.explore", [
            'posts' => Post::with('user')->orderBy('created_at', 'desc')->paginate(3)
           ]);
    }

    public function myPosts($locale = 'en')
    {
        App::setLocale($locale);

    // the way 1
    // return view("posts.my-posts");

    //  the way 2
    //    $posts = Post::get();
    //    return view("posts.my-posts", [
    //     'posts' => $posts
    //    ]);


        // the way 3: paginated
        // return view("posts.my-posts", [
        //  'posts' => Post::paginate(3)
        // ]);

        // the way 4: paginated, sorting
        // return view("posts.my-posts", [
        //     'posts' => Post::orderBy('created_at', 'desc')->paginate(3)
        //    ]);

        // the way 5: paginated, sorting, eager loading
        // in the "my-posts.blade.php", when the code "@if ($post->user->is(auth()->user()))" is ran,
        // each time an query is executed for retrieving the user data,
        // so that we change the code to the 5 way by using the eager loading way.

        $userId = Auth::id();
        return view("posts.my-posts", [
            'posts' => Post::with('user')->where('user_id', $userId)->orderBy('created_at', 'desc')->paginate(3)
           ]);
    }

    public function show($id, $locale = 'en')
    {
        App::setLocale($locale);

        $post = Post::with('user')->find($id);

        return view('posts.show-post', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view("posts.create");
    }
    
    public function edit(Post $post)
    {
        // Todo Authorization
        // $this->authorize('update', $post);

        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function store(Request $request)
    {
        $validatedPost = $request->validate([
            'title' => 'required|string|max:40',
            'description' => 'required|string|max:100',
            'content' => 'nullable|string|max:1000',
        ]);


        // When there is no relationship between the post model and the user model
        //Post::create($validatedPost);

        // When there is an one-to-many relationship between the post model and the user model
        $post = $request->user()->posts()->create($validatedPost);

        // $image_path = $request->file('postImage')->store('images', 'public');
        // event(new RealTimeMessage('New post: <a href="'.route('posts.show-post',$post->id).'">'.$post->title.'</a>'));
        

        // save image
        if ($post->image?->path) {
            unlink(storage_path('app/public/' . $post->image->path));
        }

        $request->validate([
            'postImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:1048'
        ]);
        $image_path = $request->file('postImage')->store('images', 'public');
        $image = new Image(['path' => $image_path]);
        $post->image()->delete();
        $post->image()->save($image);
        //

        return redirect(route('posts.my-posts'))->with('status', 'post-added');
    }

    public function update(Request $request, Post $post)
    {
        // Todo Authorization
        // $this->authorize('update', $post);

        $validatedPost = $request->validate([
            'title' => 'required|string|max:40',
            'description' => 'required|string|max:100',
            'content' => 'nullable|string|max:1000',
        ]);

        $post->update($validatedPost);

        // save image
        if ($post->image?->path) {
            unlink(storage_path('app/public/' . $post->image->path));
        }

        $request->validate([
            'postImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:1048'
        ]);
        $image_path = $request->file('postImage')->store('images', 'public');
        $image = new Image(['path' => $image_path]);
        $post->image()->delete();
        $post->image()->save($image);
        //
        
        return redirect(route('posts.my-posts'))->with('status', 'post-edited');
    }

    public function destroy(Post $post)
    {
        // Todo Authorization
        // $this->authorize('delete', $post);
        
        $post->delete();
        return redirect(route('posts.my-posts'))->with('status', 'post-deleted');
    }
}
