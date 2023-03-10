<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create','store');
        $this->middleware('can:admin.posts.edit')->only('edit','update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
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
        return view('admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        $post = Post::create($request->all());

        if($request->file('file')){
            $url = Storage::put('posts',$request->file('file'));

            $post->image()->create([
                'url' => $url
            ]);
        }

        Cache::flush(); // Limpiar cache
        
        if($request->status == 'PUBLISHED'){
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.posts.edit', $post)->with('info','El post se creó con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('author',$post);

        $categories = Category::pluck('name','id');
        $tags = Tag::all();
        return view('admin.posts.edit',compact('categories','tags','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {

        $this->authorize('author',$post);


        $post->update($request->all());

        if($request->file('file')){
            $url = Storage::put('posts',$request->file('file'));

            if($post->image){
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

        if($request->status == 'PUBLISHED'){
            $post->tags()->sync($request->tags);
        }else{
            $post->tags()->detach();
        }

        Cache::flush(); // Limpiar cache


        return redirect()->route('admin.posts.edit', $post)->with('info','El post se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        $this->authorize('author',$post);

        
        $post->delete();

        
        Cache::flush(); // Limpiar cache


        return redirect()->route('admin.posts.index')->with('info','El post se eliminó con éxito');
    }

}
