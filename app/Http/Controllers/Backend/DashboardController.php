<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $page_title = 'Dashboard';
        $page_description = 'Yönetim Paneline Hoşgeldiniz';

        $users = User::all();
        $posts = Post::all();

        return view('backend.dashboard.dashboard', compact('page_title', 'page_description', 'posts', 'users'));
    }
}
