<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Herramienta;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


/**
 * Class PrestamoController
 * @package App\Http\Controllers
 */
class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function index()
    {
        $prestamos = Prestamo::paginate(8); 
        $herramientas = Herramienta::all();
        $alumnos = Alumno::all();
        return view('prestamo.index', ['herramientas' => $herramientas, 'alumnos' => $alumnos], compact('prestamos'))
        ->with('i', (request()->input('page', 1) - 1) * $prestamos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prestamos = new Prestamo();
        $alumnos = Alumno::all();
        $herramientas = Herramienta::all();

        return view('prestamo.create', ['alumnos' => $alumnos, 'herramientas' => $herramientas], compact('prestamos'));
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
            'AlumnoNoControl' => 'required',
            'FechaPrestamo' => 'required|date',
            'HerramientaIdHerramienta'=> 'required',            
            'CantidadPrestada'=> 'required|integer|min:1',
            'Observaciones'=> 'nullable|max:255',
          ]);
          $prestamos = new Prestamo();
          $prestamos->AlumnoNoControl =$request->input('AlumnoNoControl');
          $prestamos->FechaPrestamo =$request->input('FechaPrestamo');
          $prestamos->HerramientaIdHerramienta =$request->input('HerramientaIdHerramienta');
          $prestamos->CantidadPrestada =$request->input('CantidadPrestada');
          $prestamos->Observaciones =$request->input('Observaciones');
          $prestamos->Status =$request->input('Status');
          
          
         
          $prestamos->update($request->all());
          $herramientas = Herramienta::where('IdHerramienta', $prestamos->HerramientaIdHerramienta)->first();
          if ($prestamos->CantidadPrestada <= $herramientas->CantidadDisponible ){
            $herramientas->CantidadDisponible -= $prestamos->CantidadPrestada;
            $herramientas->save();
            $prestamos->save();
            return redirect("prestamo")->with('success', 'Prestamo Agregado Exitosamente');
          }
          else{
            return redirect("prestamo")->with('error', 'Las Unidades Prestadas deben ser menores a ' . $herramientas->CantidadDisponible);
            
          }


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdPrestamo)
    {
        $prestamos = Prestamo::find($IdPrestamo);

        return view('prestamo.show', compact('prestamos'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdPrestamo)
    {
        $prestamos = Prestamo::find($IdPrestamo);
        return view('prestamo.edit', ['prestamos' =>$prestamos, 'alumnos' =>Alumno::all(), 
        'herramientas' =>Herramienta::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Prestamo $prestamos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdPrestamo)
    {
        request()->validate([
            'FechaDevolucion'=> 'required|date',
            'CantidadDevuelta'=> 'nullable',
            'Observaciones'=> 'nullable|max:255',
            'Status'=>'required',
          ]);
          $prestamos = Prestamo::find($IdPrestamo);
          $prestamos->FechaDevolucion =$request->input('FechaDevolucion');
          $prestamos->CantidadDevuelta =$request->input('CantidadDevuelta');
          $prestamos->Observaciones =$request->input('Observaciones');
          $prestamos->Status =$request->input('Status');
          $prestamos->save();

          $prestamos->update($request->all());
          $herramientas = Herramienta::where('IdHerramienta', $prestamos->HerramientaIdHerramienta)->first();
          $herramientas->CantidadDisponible += $prestamos->CantidadDevuelta;
          $herramientas->save();

          return redirect("prestamo")->with('success', 'Devolución Exitosa');
    }

    /**
     * @param int $IdPrestamo
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($IdPrestamo)
    {
        
        $prestamo = Prestamo::find($IdPrestamo)->delete();

        return redirect("prestamo")->with('success', 'Registro Elimanado Exitosamente');

    

}
}
