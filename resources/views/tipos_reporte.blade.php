<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte</title>
    <style>
        @page{
            margin: 0.5cm 0.5cm 0.5cm 0.5cm;
            font-family: "Arial";
        }
        h1{
            font-size: 20px;
        }
        table{
            width: 100%;
            border: 1px solid;
        }
        td,th{
            border: 1px solid;
        }
        footer{
            position: fixed;
            bottom: 0px;
        }
    </style>
</head>
<body>
<header>
    <h1>Tipo {{$tipo->descripcion}}</h1>
</header>
<main>
<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tipo->relPokemon as $pokemon)
        <tr>
            <td>{{$pokemon->id}}</td>
            <td>{{$pokemon->nombre}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</main>
<footer>
    Pie de página {{now()}}
</footer>
</body>
</html>
