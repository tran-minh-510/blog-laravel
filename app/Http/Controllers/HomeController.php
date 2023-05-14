<?php

namespace App\Http\Controllers;

use App\Models\Admin\Post;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $category = Category::all();
        if (isset($request->key_word)) {
            $post = Post::where('title', 'LIKE', '%' . $request->key_word . '%')
            ->orWhere('summary', 'LIKE', '%' . $request->key_word . '%')
            ->orWhere('content', 'LIKE', '%' . $request->key_word . '%')
            ->paginate(6);
        } else {
            $post = Post::paginate(6);
        }
        Paginator::useBootstrap();
        return view('home', compact('category', 'post'));
    }
}
