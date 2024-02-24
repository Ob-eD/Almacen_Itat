<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;


/**
 * Class AlumnoController
 * @package App\Http\Controllers
 */
class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::paginate(10);
        return view('alumno.index', compact('alumnos'))
            ->with('i', (request()->input('page', 1) - 1) * $alumnos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumno= new Alumno();
        return view('alumno.create', compact('alumno'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Alumno::$rules);

        $alumno = Alumno::create($request->all());

        return redirect()->route('alumno.index')
            ->with('success', 'Alumno Agregado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $NoControl
     * @return \Illuminate\Http\Response
     */
    public function show($NoControl)
    {
        $alumno = Alumno::find($NoControl);

        return view('alumno.show', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $NoControl
     * @return \Illuminate\Http\Response
     */
    public function edit($NoControl)
    {
        $alumno = Alumno::find($NoControl);

        return view('alumno.edit', ['alumno'=>$alumno]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Alumno $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $NoControl)
    {
        $request->validate([
            'Nombre' => 'required|max:255',
            'Grupo' => 'required',
            'Semestre' => 'required',
            'Carrera' => 'required',
            'Correo' => 'required',
          ]);
          $alumno = Alumno::find($NoControl);
          $alumno->Nombre =$request->input('Nombre');
          $alumno->Grupo =$request->input('Grupo');
          $alumno->Semestre =$request->input('Semestre');
          $alumno->Carrera =$request->input('Carrera');
          $alumno->Correo =$request->input('Correo');
          $alumno->save();

          return redirect()->route('alumno.index')
            ->with('success', 'Alumno Actualizado');
        }
    /**
     * @param int $Nocontrol
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($NoControl)
    {
        $alumno = Alumno::find($NoControl)->delete();

        return redirect()->route('alumno.index')
            ->with('success', 'Alumno deleted successfully');
    }

    public function buscar(Request $request)
    {
        $buscar = $request->input('buscar');
        $tablas = Alumno::where('Nombre', 'LIKE', '%' . $buscar . '%')->get();

        return view('Alumno.buscar', compact('alumnos'));
    }
}
