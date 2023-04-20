<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\categoriasblog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        $categoria = categoriasblog::pluck('nombre', 'id');
        return view('blog.index', compact('blogs', 'categoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog = new Blog();
        $categorias = categoriasblog::pluck('nombre', 'id');
        return view('blog.create', compact('blog', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'img' => 'image|max:2048',
            'resumen' => 'required',
            'detalle' => 'required',
            'status' => 'required|in:publicado,borrador',
            'categorias' => 'nullable|array'
        ]);

        // Creación del objeto Blog
        $blog = new Blog();
        $blog->nombre = $validatedData['nombre'];
        $blog->descripcion = $validatedData['resumen'];
        $blog->cuerpo = $validatedData['detalle'];
        $blog->status = $validatedData['status'];
        $blog->user_id = Auth::user()->id;


        $img = $request->file('img');
        $rutaImg = public_path("img/buscador/");
        $imgBlog = $img->getClientOriginalName();
        $img->move($rutaImg, $imgBlog);
        $tours['img'] = "$imgBlog";
        // Subida de la imagen
        if ($request->hasFile('img')) {

            $image = $request->file('img');
            $rutaImg = public_path("img//");
            $imgBlog = $img->getClientOriginalName();
            $img->move($rutaImg, $imgBlog);
            $blog['img'] = "$imgBlog";
        }

        // Asignación de las categorías
        if (isset($validatedData['categorias'])) {
            $blog->categorias()->sync($validatedData['categorias']);
        }

        // Guardado del objeto Blog
        $blog->save();

        // Redirección a la vista del blog recién creado
        return redirect()->route('blog.index', $blog);
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
        
    }
}