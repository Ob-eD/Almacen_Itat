<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Database\QueryException;

class CategoriaController extends Controller
{
    /**
   * Display a listing of the resource.
   *
   * @return IlluminateHttpResponse
   */
    public function index()
    {
     
        $categorias = Categoria::all();

        return view('categoria.index',['categorias'=> $categorias]);
    }

   /**
   * Store a newly created resource in storage.
   *
   * @param  IlluminateHttpRequest  $request
   * @return IlluminateHttpResponse
   */
    public function store(Request $request)
    {
       
        $request->validate([
            'NombreCategoria' => 'required|max:255',
            'Descripcion' => 'required',
          ]);
          $categorias = new Categoria();
          $categorias->NombreCategoria =$request->input('NombreCategoria');
          $categorias->Descripcion =$request->input('Descripcion');
          $categorias->save();

          return redirect()->route('categoria.index')
          ->with('success', 'Categoria Agregada Exitosamente');
    }

    /**
   * Display the specified resource.
   *
   * @param  integer  $IdCategoria
   * @return IlluminateHttpResponse
   */
    public function show($IdCategoria)
    {
        $categorias = Categoria::find($IdCategoria);

        return view('categoria.show', compact('categorias'));
    }

     /**
   * Update the specified resource in storage.
   *
   * @param  IlluminateHttpRequest  $request
   * @param  integer  $IdCategoria
   * @return IlluminateHttpResponse
   */
    public function update(Request $request, $IdCategoria)
    {
        
        $request->validate([
            'NombreCategoria' => 'required|max:255',
            'Descripcion' => 'required',
          ]);
          $categorias = Categoria::find($IdCategoria);
          $categorias->NombreCategoria =$request->input('NombreCategoria');
          $categorias->Descripcion =$request->input('Descripcion');
          $categorias->save();

          return redirect()->route('categoria.index')
            ->with('success', 'Categoria Actualizada Exitosamente');
    }

     /**
   * Remove the specified resource from storage.
   *
   * @param  integer  $IdCategoria
   * @return IlluminateHttpResponse
   */
    public function destroy($IdCategoria)
    {
        try{
            $categorias = Categoria::find($IdCategoria);
            $categorias->delete();
            return redirect("categoria")->with('success', 'Categoria Eliminada Exitosamente');
            }catch (QueryException $e) {
             if ($e->getCode() == 23000) {
            return redirect("categoria")->with('error', 'La Categoria no se puede eliminar');
             }
            }
    }

    // routes functions
  /**
   * Show the form for creating a new post.
   *
   * @return IlluminateHttpResponse
   */
    public function create()
    {
        return view('categoria.create');
    }

    /**
   * Show the form for editing the specified post.
   *
   * @param  integer  $IdCategoria
   * @return IlluminateHttpResponse
   */
    public function edit($IdCategoria)
    {
        $categorias = Categoria::find($IdCategoria);

        return view('categoria.edit', ['categoria'=>$categorias]);
    }


}
