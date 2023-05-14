<?php

namespace App\Http\Controllers;

use App\Models\Admin\Post;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;

class DetailPostController extends Controller
{
    public function index(Request $request){
        $params = explode('/',$request->path());
        $category = Category::all();
        $post = Post::where('id',$params[1])->first();
        return view('user.detail-post',compact('category','post'));
    }
}
