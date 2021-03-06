<?php

namespace App\Http\Controllers\dashboard;

use App\Category;
use App\Post;
use App\PostImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostPost; /* request validation video 42 */

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /* Recupero datos de la tabla post mediante el modelo */
        // $posts = Post::orderBy('created_at', 'DESC')->get();
        $posts = Post::orderBy('created_at', 'DESC')->paginate(5);
        // dd($posts);
        return view('dashboard.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('id', 'title'); /* video 58 */
        /* Como segundo parametro instancia post (video 51) */
        return view('dashboard.post.create', ['post' => new Post(), 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostPost $request)
    {
        // dd($request); /* var_dump() and die()*/

        /* --- Recogida datos --- */

        /* Campo no existe */
        // echo $request->input('title__', 'El campo no existe');

        /* Mostrar datos */
        // echo '<pre>', print_r($request->all(), true ), '</pre>';
        // dd($request->all()); /* var_dump() and die()*/

        /* Recogida cada campo */
        // echo $request->input('title');
        // echo $request->title;
        // echo request('title'); /* Sin usar use Illuminate\Http\Request; */


        /* ---Validación ( sino la pasa devuelve formulario ) Creamos request video 41--- */
        // $request->validate([
        //     'title' => 'required|min:5|max:500',
        //     // 'url_clean' => 'required|min:5|max:500',
        //     'content' => 'required|min:5',
        // ]);



        /* Test */
        // dd($request->validated());
        // dd(Post::created($request->validated()));


        Post::create($request->validated()); /* le paso los datos validados */
        return back()->with('status', 'Post creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        /* Forma 'clasica' */
        // $post = Post::find($id);
        // if(isset($post)){
        //     return view('dashboard.post.show', ['post' => $post]);
        // }

        /* Usando directamente failOrFail() */
        // $post = Post::findOrFail($id);

        /* Usando el modelo (Ver video 49) */

        return view('dashboard.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // dd($post->image->images);
        $categories = Category::pluck('id', 'title'); /* video 58 */
        return view('dashboard.post.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostPost $request, Post $post)
    {

        $post->update($request->validated()); /* le paso los datos validados */
        return back()->with('status', 'Post actualizado con éxito');
    }


    /* Carga de imagen video 62 */
    public function image(Request $request, Post $post)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,bmp,png|max:10240' /* 10MG */
        ]);

        $filename = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $filename); /* Guarda imagen el public/images */

        PostImage::create(['images' => $filename, 'post_id' => $post->id]);
        return back()->with('status', 'Imagen cargada en el post con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  objecto  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('status', 'Post eliminado con éxito');
    }
}
