<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as ValidationRule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::all()
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required|min:5|max:20',
            'slug' => ['required', ValidationRule::unique('posts', 'slug')],
            'excerpt' => 'required|max:255',
            'body' => 'required',
            'category_id' => [
                'required', ValidationRule::exists(
                    'categories',
                    'id'
                )
            ]
        ]);

        $attributes['user_id'] = auth()->id();

        Post::create($attributes);

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required|min:3|max:20',
            'slug' => ['required', ValidationRule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => 'required|max:255',
            'body' => 'required',
            'category_id' => [
                'required', ValidationRule::exists(
                    'categories',
                    'id'
                )
            ]
        ]);

        $post->update($attributes);

        return back()->with('success', 'Post updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post deleted!');
    }
}
