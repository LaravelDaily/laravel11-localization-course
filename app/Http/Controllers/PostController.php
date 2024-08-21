<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use ValidatesRequests;
    
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $authors = User::pluck('name', 'id');

        return view('posts.create', compact('authors'));
    }

    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'publish_date' => ['nullable', 'date'],
            'user_id' => ['required', 'numeric'],
        ];
        foreach (config('translatable.locales') as $locale) { // <-- Adding validation for each available locale
            $rules += [
                $locale . '.title' => ['required', 'string'],
                $locale . '.post' => ['required', 'string'],
            ];
        }

        $this->validate($request, $rules);

        $post = Post::create($request->all()); // <-- We should use `$request->validated()` if we are using `FormRequest`

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        $authors = User::pluck('name', 'id');

        return view('posts.edit', compact('post', 'authors'));
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $rules = [
            'publish_date' => ['nullable', 'date'],
            'user_id' => ['required', 'numeric'],
        ];
        foreach (config('translatable.locales') as $locale) { // <-- Adding validation for each available locale
            $rules += [
                $locale . '.title' => ['required', 'string'],
                $locale . '.post' => ['required', 'string'],
            ];
        }

        $this->validate($request, $rules);

        $post->update($request->all()); // <-- We should use `$request->validated()` if we are using `FormRequest`

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}