<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
{
    $query = $request->input('query');

    // Realizar la búsqueda en la base de datos utilizando el método 'where' del modelo Eloquent.
    // Puedes utilizar otros métodos de consulta según tus necesidades.
    $results = Post::where('title', 'LIKE', '%' . $query . '%')->orWhere('content', 'LIKE', '%' . $query . '%')->get();

    // Retornar la vista 'search' con los resultados de la búsqueda.
    return view('search', compact('results'));
}
}
