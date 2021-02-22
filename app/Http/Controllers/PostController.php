<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\Category;
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
        $posts= Post::all()->sortByDesc('id');
        $categories = Category::all();
        return view('post.index')->withPosts($posts)->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|unique:posts',
            'image' => 'nullable|image',
            'body' => 'required|max:255'
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category;
        $post->user_id = Auth::user()->id;
            if($request->hasFile('image')){
                $image =  $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('/images/' . $filename);
                Image::make($image)->resize(800, 600)->save($location);
                $post->image = $filename;
            }

        $post->save();

        $request->session()->flash('success', 'Post was successfully created');;
        return redirect('/post');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('post.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if(Auth::user()->id != $post->user_id){
            abort(404);
        }
        if ($post == null) {
            abort(404);
        }
        $categories = Category::all();
        return view('post.edit')->withPost($post)->withCategories($categories);
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
        $post = Post::find($id);
        if(Auth::user()->id != $post->user_id){
            abort(404);
        }
        if ($post == null) {
            abort(404);
        }

        $this->validate($request, [
            'title' => "required|max:255|unique:posts,title,$id",
            'image' => 'image',
            'body' => 'required|max:255'
        ]);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category;
        $post->user_id = Auth::user()->id;
            if($request->hasFile('image')){
                $image =  $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('/images/' . $filename);
                Image::make($image)->resize(800, 600)->save($location);
                if ($post->image != null) {
                    Storage::delete($post->image);
                }
                $post->image = $filename;
            }

        $post->save();

        $request->session()->flash('success', 'Post was successfully Updated');;
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $post = Post::find($id);
        if(Auth::user()->id != $post->user_id){
            abort(404);
        }
        if ($post == null) {
            abort(404);
        }

        if ($post->image != null) {
            Storage::delete($post->image);
        }
        $post->delete();
        session()->flash('success', 'post was deleted');
        return redirect()->back();
    }
}
