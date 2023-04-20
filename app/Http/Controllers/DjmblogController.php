<?php

namespace App\Http\Controllers;

use App\Models\Buscadore;
use App\Models\Djmblog;
use Illuminate\Http\Request;

/**
 * Class DjmblogController
 * @package App\Http\Controllers
 */
class DjmblogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $djmblogs = Djmblog::query()->with('categorias')->get();
        return view('djmblog.index', compact('djmblogs'));
    }
    public function djmblog()
    {
        $blogs = Djmblog::query()->with('categorias')->get();
        return view('djmblog.mostrar', compact('blogs'));
        ;
    }
    public function mostrarblog($slug)
    {
        /* $blog = Djmblog::query()->where('slug', $slug)->firstOrFail(); */
        /* $blog = Djmblog::query()->with('categorias')->find($slug);
        return view('djmblog.mostrar')->with('blog', $blog); */
        $blog = Djmblog::query()->where('slug', $slug)->with('categorias')->firstOrFail();
        return view('djmblog.mostrar')->with('blog', $blog);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $djmblog = new Djmblog();
        $categorias = Buscadore::query()->pluck('nombre', 'id');
        return view('djmblog.create', compact('djmblog', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $djmblog = new Djmblog();
        // Asignar los valores de las propiedades del modelo a partir de los datos del formulario

        $djmblog->nombre = $request->get('nombre');
        $djmblog->descripcion = $request->get('descripcion');
        $djmblog->cuerpo = $request->get('cuerpo');

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('img/blog'), $filename);
            $djmblog->img = '/img/blog/' . $filename;
        }
        $djmblog->keywords = $request->get('keywords');
        $djmblog->slug = $request->get('slug');

        // Guardar el modelo en la base de datos
        $djmblog->save();

        // Asignar las categorías al modelo
        $djmblog->categorias()->sync(request('categorias'));

        // Redireccionar a la vista del detalle del nuevo registro
        return redirect()->route('djm.index', $djmblog->id)->with('success', 'El blog se ha creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $djmblog = Djmblog::query()->with('categorias')->find($id);
        return view('djmblog.show', compact('djmblog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $djmblog = Djmblog::with('categorias')->findOrFail($id);
        dd($djmblog);
        return view('djmblog.edit', compact('djmblog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Djmblog $djmblog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Djmblog $djmblog)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required|max:255',
            'cuerpo' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keywords' => 'required|max:255',
            'categorias' => 'required|array',
            'slug' => 'required|unique:djmblogs,slug,' . $djmblog->id . '|max:255'
        ]);

        // Asignar los valores de las propiedades del modelo a partir de los datos del formulario
        $djmblog->nombre = $validatedData['nombre'];
        $djmblog->descripcion = $validatedData['descripcion'];
        $djmblog->cuerpo = $validatedData['cuerpo'];

        if ($request->hasFile('img')) {
            // Eliminar la imagen anterior si existe
            if (Storage::exists($djmblog->img)) {
                Storage::delete($djmblog->img);
            }

            $image = $request->file('img');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/img/blog', $filename);
            $djmblog->img = 'storage/img/blog/' . $filename;
        }

        $djmblog->keywords = $validatedData['keywords'];
        $djmblog->slug = $validatedData['slug'];

        // Actualizar el modelo en la base de datos
        $djmblog->save();

        // Asignar las categorías al modelo
        $djmblog->categorias()->sync($request->input('categorias'));

        // Redireccionar a la vista del detalle del registro actualizado
        return redirect()->route('djm.show', $djmblog->id)
            ->with('success', 'El registro se ha actualizado correctamente.');
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $djmblog = Djmblog::query()->findOrFail($id);

        // Eliminar las relaciones de las categorías con este blog antes de eliminar el blog
        $djmblog->categorias()->detach();

        // Eliminar la imagen asociada al blog si existe
        if (file_exists(public_path($djmblog->img))) {
            unlink(public_path($djmblog->img));
        }

        // Eliminar el modelo de la base de datos
        $djmblog->delete();

        return redirect()->route('djm.index')
            ->with('success', 'Djmblog deleted successfully');
    }
}