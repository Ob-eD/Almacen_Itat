<?php

namespace App\Http\Controllers;

use App\Models\Herramienta;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException; 

/**
 * Class HerramientaController
 * @package App\Http\Controllers
 */
class HerramientaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $herramientas = Herramienta::paginate(8); 
        $categorias = Categoria::all();
        return view('herramienta.index', ['categorias' => $categorias], compact('herramientas'))
        ->with('i', (request()->input('page', 1) - 1) * $herramientas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $herramientas = new Herramienta();
        $categorias = Categoria::all();
        return view('herramienta.create', ['categorias' => $categorias], compact('herramientas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'NombreHerramienta' => 'required|max:255',
            'CantidadExistente'=> 'required',
            'CategoriaIdCategoria'=> 'required',
            'Img'=>'required',
          ]);
          $herramientas = new Herramienta();
          $herramientas->NombreHerramienta =$request->input('NombreHerramienta');
          $herramientas->CantidadExistente =$request->input('CantidadExistente');
          $herramientas->CantidadDisponible =$request->input('CantidadExistente');
          $herramientas->CategoriaIdCategoria =$request->input('CategoriaIdCategoria');
          if ($request->hasFile('Img')) {
            $image = $request->file('Img');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('Img');
            $image->move($destinationPath, $name);
    
            $herramientas->Img = $name;
        }
          $herramientas->save();
          

          return redirect("herramienta")->with('success', 'Herramienta Agregada Exitosamente');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdHerramienta)
    {
        $herramientas = Herramienta::find($IdHerramienta);

        return view('herramienta.show', compact('herramientas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $IdHerramienta
     * @return \Illuminate\Http\Response
     */
    public function edit($IdHerramienta)
    {
        $herramientas = Herramienta::find($IdHerramienta);

        return view('herramienta.edit', ['herramientas' =>$herramientas, 'categorias' => Categoria::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Herramienta $herramienta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdHerramienta)
    {
        request()->validate([
            'NombreHerramienta' => 'required|max:255',                    
            'CategoriaIdCategoria'=> 'required',
          ]);
          $herramientas = Herramienta::find($IdHerramienta);
          $herramientas->NombreHerramienta =$request->input('NombreHerramienta');
          $herramientas->CantidadExistente +=$request->input('CantidadExistente'); 
          $herramientas->CantidadDisponible +=$request->input('CantidadExistente'); 
          $herramientas->CategoriaIdCategoria =$request->input('CategoriaIdCategoria');
          $herramientas->save();  
          

          return redirect("herramienta")->with('success', 'Registro Actualizado Exitosamente');
    }

    /**
     * @param int $IdHerramienta
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($IdHerramienta)
    {
        try{
        $herramientas = Herramienta::find($IdHerramienta);
        $herramientas->delete();
        return redirect("herramienta")->with('success', 'Herramienta Eliminada Exitosamente');
        }catch (QueryException $e) {
         if ($e->getCode() == 23000) {
        return redirect("herramienta")->with('error', 'La Herramienta no se puede eliminar');
         }
        }
        
    
}
}
