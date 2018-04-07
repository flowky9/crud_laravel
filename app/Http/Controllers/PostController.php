<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Redirect;
use Validator;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $posts = Post::latest()->paginate(5);
        return view('post.index',['posts' => $posts]);
    }

    public function create()
    {
    	$categories = Category::all();
    	return view('post.create',['categories' => $categories]);
    }

    public function store(Request $request)
    {

    	$validator = Validator::make($request->all(), 
    		[
    			"title" => "required",

    			"content" => "required"
    		], 
    		[
    			"title.required" => "Title harus di-isi !",
    
    			"content.required" => "Content harus di-isi !"
    		]);

    	if($validator->fails()){
    		return redirect()->route('post.create')
    						 ->withErrors($validator);
    	}else{

    	Post::create([
    		'title' => request('title'),
    		'category_id' => request('category'),
    		'content' => request('content'),
    		'slug' => str_slug(request('title')),
    	]);

    	return redirect()->route('post.create',['status'=> 'success']);
    }

   	 
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('post.edit',['post' => $post, 'categories' => $categories]);
    }

    public function update($id, Request $request)
    {
        $post = Post::find($id);

        $post->update([
            'title' => $request->title,
            'category_id' => $request->category,
            'content' => $request->content,  
            'slug' => str_slug($request->title),
        ]);

        return redirect()->route('post.index');
    }

    public function destroy($id)
    {
        $post = Post::destroy($id);
        return redirect()->route('post.index');
    }
}
