<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.edit')->only('edit','update');
        $this->middleware('can:admin.posts.create')->only('create','store');
        $this->middleware('can:admin.posts.destroy')->only('destroy');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id');
        $tags = Tag::all();
        $colors = [
            'white' => 'Color Blanco',
            'black-600' => 'Color Blanco',
            'red-600' => 'Color Rojo',
            'yellow-600' => 'Color Amarillo',
            'green-600' => 'Color Verde',
            'blue-600' => 'Color Azul',
            'indigo-600' => 'Color Indigo',
            'purple-600' => 'Color Morado',
            'pink-600' => 'Color Rosado'

        ];
        return view('admin.posts.create',compact('categories','tags','colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
       //return Storage::put('public/posts',$request->file('file'));
        

        $post = Post::create($request->all());

        if($request->file('file'))
        {
            $url = Storage::put('public/posts',$request->file('file'));

            $post->image()->create([
                'url' => $url
            ]);
        }

        if($request->tags)
        {
            $post->tags()->attach($request->tags);
        }
        return redirect()->route('admin.posts.edit',$post)->with('info','El post se creo con Exito');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        $this->authorize('author',$post);
        $categories = Category::pluck('name','id');
        $tags = Tag::all();
        $colors = [
            'white' => 'Color Blanco',
            'black-600' => 'Color Negro',
            'red-600' => 'Color Rojo',
            'yellow-600' => 'Color Amarillo',
            'green-600' => 'Color Verde',
            'blue-600' => 'Color Azul',
            'indigo-600' => 'Color Indigo',
            'purple-600' => 'Color Morado',
            'pink-600' => 'Color Rosado'

        ];
        return view('admin.posts.edit',compact('post','categories','tags','colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post)
    {
        $this->authorize('author',$post);
        $post->update($request->all());
        if($request->file('file'))
        {
            $url = Storage::put('public/posts',$request->file('file'));

            if($post->image)
            {
                Storage::delete($post->image->url);
                $post->image->update([
                    'url' => $url
                ]);
            }else{
                $post->image()->create([
                    'url' => $url
                ]);
            }
            
            
        }
        if($request->tags)
        {
            $post->tags()->sync($request->tags);
        }
        return redirect()->route('admin.posts.edit',$post)->with('info','El post se actualizo con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        $this->authorize('author',$post);
        $post->delete();

        return redirect()->route('admin.posts.index',$post)->with('info','El post se Elimino con Exito');

    }
}
