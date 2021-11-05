<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Http\Request;
use \Exception;
use Log;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->get();
        $data = [
            "posts" => $posts
        ];
        return view('back.post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $data = [
            "categories" => $categories
        ];
        return view('back.post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        if (Post::where('slug', $request->input('slug'))->first()) {
            $slug_repeated = true;
            $slug = $request->input('slug') . '-' . rand(0, 999);
        }

        try {
            $post = new Post;
            $post->status           = $request->input('status');
            $post->title            = $request->input('title');
            $post->meta_title       = $request->input('meta_title');
            $post->meta_description = $request->input('meta_description');
            $post->category_id      = $request->input('category');
            $post->banner_id        = $request->input('banner');
            $post->thumbnail_id     = $request->input('image');
            $post->slug             = isset($slug_repeated) ? $slug : $request->input('slug');
            $post->content          = $request->input('content');
            $post->published_at     = $request->input('published_at');
            if ($post->save()) {
                return redirect()->route('posts.index')->with('success', 'Artículo creado con éxito');
            }
            throw new Exception("Error al guardar el post en BD", 1);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->back()->withInput()->with('error', 'Ocurrió un error inesperado');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Muestra el articulo del blog
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function read($slug)
    {
        $post = Post::where('slug', $slug)->where('status', 1)->firstOrFail();
        $post->views = $post->views + 1;
        $post->save();
        $latest_posts = Post::where('status', 1)->orderBy('published_at', 'desc')->take(5)->get();
        $most_viewed_posts = Post::where('status', 1)->orderBy('views', 'desc')->take(5)->get();
        $categories = Category::all();
        $data = [
            "active"             => "blog",
            "post"               => $post,
            "latest_posts"      => $latest_posts,
            "most_viewed_posts" => $most_viewed_posts,
            "categories"        => $categories,
        ];
        return view('front.blog.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $data = [
            "categories" => $categories,
            "post" => $post,
        ];
        return view('back.post.edit', $data);
    }

    /**
     * Cambia el estado de borrador a publicado o viceversa
     */
    public function change_status(Post $post){
        try {
            $post->status = $post->status == 2 ? 1 : 2;
            $post->save();
            return redirect()->route('posts.index')->with('success', 'Artículo actualizado');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->route('posts.index')->with('error', 'Ocurrió un error inesperado');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        if (Post::where('slug', $request->input('slug'))->where('id', '<>', $post->id)->first()) {
            $slug_repeated = true;
            $slug = $request->input('slug') . '-' . rand(0, 999);
        }

        try {
            $post->status           = $request->input('status');
            $post->title            = $request->input('title');
            $post->meta_title       = $request->input('meta_title');
            $post->meta_description = $request->input('meta_description');
            $post->category_id      = $request->input('category');
            $post->banner_id        = $request->input('banner');
            $post->thumbnail_id     = $request->input('image');
            $post->slug             = isset($slug_repeated) ? $slug : $request->input('slug');
            $post->content          = $request->input('content');
            $post->published_at     = $request->input('published_at');
            if ($post->save()) {
                return redirect()->route('posts.index')->with('success', 'Artículo actualizado con éxito');
            }
            throw new Exception("Error al guardar el post en BD", 1);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->back()->withInput()->with('error', 'Ocurrió un error inesperado');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try {
            $post->delete();
            return redirect()->route('posts.index')->with('success', 'Artículo eliminado');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->route('posts.index')->with('error', 'Ocurrió un error inesperado');
        }
    }
}
