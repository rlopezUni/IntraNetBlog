<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /*
        $posts = Post::where('status',2)->latest('id')->paginate(8);

        return view('posts.index',compact('posts'));
        */

        return view("nps.index");
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {


        $this->authorize('published',$post);
        $similares = Post::where('category_id',$post->category_id)
        ->where('status',2)->where('id','!=',$post->id)->latest('id')->take(4)->get();
        return view('posts.show',compact('post','similares'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function category (Category $category)
    {
        $posts = Post::where('category_id',$category->id)
        ->where('status',2)->latest('id')->paginate(6);

        return view('posts.category',compact('posts','category'));
    }
    public function tag (Tag $tag)
    {
        

        $posts = $tag->posts()->where('status',2)->latest('id')->paginate(4);

        return view('posts.tag',compact('posts','tag'));
    }
}
