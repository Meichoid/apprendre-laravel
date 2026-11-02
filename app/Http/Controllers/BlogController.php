<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogFilterRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class BlogController extends Controller
{
    public function index(BlogFilterRequest $request): View
    {
        return view('Blog.index', [
            'posts' =>  Post::paginate(1),
        ]);
    }
     
    public function show(string $slug, string $post): RedirectResponse|View
    {
        $post = Post::findOrFail($post);

        if ($post->slug !== $slug) {
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }

        return view('Blog.show', [
            'post' => $post,
        ]);
    }
}
