<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <table id="tabla">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Tamaño</th>
                <th>Volumen</th>
                <th>Numero de quillas</th>
                <th> Categoria</th>
                <th></th>
                <th></th>
                <th></th>


            </tr>
        </thead>
        <tbody>
            @foreach ($tablas as $tabla)
                <tr data-id="{{ $tabla->id }}">
                    <td>{{ $tabla->id }}</td>
                    <td>{{ $tabla->marca }}</td>
                    <td>{{ $tabla->modelo }}</td>
                    <td>{{ $tabla->tamaño }}</td>
                    <td>{{ $tabla->volumen }}</td>
                    <td>{{ $tabla->num_quillas }}</td>
                    <td>{{ $tabla->categoria->tipo}}</td>


                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
