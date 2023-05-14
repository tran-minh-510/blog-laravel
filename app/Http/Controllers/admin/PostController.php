<?php

namespace App\Http\Controllers\Admin;

// use Illuminate\Http\File;
use App\Models\Admin\Post;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(6);
        Paginator::useBootstrap();
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.post.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'image.required' => 'Trường này là bắt buộc',
            'image.mimes' => 'Định dạng ảnh không hợp lệ',
        ]);
        $image = $request['image'];
        // echo  $request->file('image')->extension();
        // $extension = $image->getClientOriginalExtension();
        $fileName = time() . '-' . $image->getClientOriginalName();
        Storage::disk('public')->put($fileName, File::get($image));

        $post = new Post;
        $post->id_categories = $request->belong_category;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->summary = $request->summary;
        $post->image = $fileName;
        $post->save();
        return back()->with('success','Thêm bài viết thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $post = Post::find($id);
        return view('admin.post.edit', compact('category','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'image.required' => 'Trường này là bắt buộc',
            'image.mimes' => 'Định dạng ảnh không hợp lệ',
        ]);
        $image = $request['image'];
        $fileName = time() . '-' . $image->getClientOriginalName();
        Storage::disk('public')->put($fileName, File::get($image));

        $post = Post::find($id);
        unlink(public_path("/uploads/".$post->image));
        $post->id_categories = $request->belong_category;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->summary = $request->summary;
        $post->image = $fileName;
        $post->save();
        return back()->with('success','Sửa bài viết thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return back()->with('success','Xóa bài viết thành công!');
    }
}
