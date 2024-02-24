<!DOCTYPE html>
<html>
<head>
    <title>Formulario de búsqueda</title>
</head>
<body>
    <form action="/alumnos/buscar" method="post">
        @csrf
        <label for="buscar">Buscar:</label>
        <input type="text" id="buscar" name="buscar">
        <button type="submit">Buscar</button>
    </form>

    <table>
        <tr>
            <th>Nombre</th>
        </tr>
        @foreach($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->Nombre }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>