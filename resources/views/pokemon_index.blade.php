@extends("layouts.app")

@section("content")

    <div class="container">
        <div class="card">
            <div class="card-header">
                Pokemons
            </div>
            <div class="card-body">

                @if(session("mensaje"))
                    <div class="alert alert-{{session("danger")?"danger":"success"}}">
                        {{session("mensaje")}}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Altura</th>
                            <th>Peso</th>
                            <th>Tipo</th>
                            <th>
                                <a href="{{route("pokemons.create")}}" class="btn btn-primary">Nuevo</a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pokemons as $pokemon)
                            <tr>
                                <td>{{$pokemon->id}}</td>
                                <td>{{$pokemon->nombre}}</td>
                                <td>{{$pokemon->altura}}</td>
                                <td>{{$pokemon->peso}}</td>
                                <td>{{$pokemon->relTipo->descripcion}}</td>
                                <td>
                                    <a href="{{route("pokemons.edit",[$pokemon])}}" class="btn btn-primary">
                                        Editar
                                    </a>
                                    <form action="{{route("pokemons.destroy",[$pokemon])}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection
