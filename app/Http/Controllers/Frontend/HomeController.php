<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $posts = Post::with(['category', 'category.category'])->get();

        return view('frontend.index', compact('posts'));
    }

    public function detail($post_id): \Illuminate\Contracts\View\View
    {
        $post = Post::find($post_id);

        return view('frontend.detail', compact('post'));
    }
}
