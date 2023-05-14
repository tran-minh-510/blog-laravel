<?php

namespace App\Http\Controllers;

use App\Models\Admin\Post;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;

class DetailCategoryController extends Controller
{
    public function index(Request $request){
        $category = Category::where('link','/'.$request->path())->get();
        $post = Post::where('id_categories',$category[0]->id)->paginate(3);
        $category = Category::all();
        Paginator::useBootstrap();
        return view('user.detail',compact('post','category'));
    }
}
