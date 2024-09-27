@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="card">
            <div class="card-header">
                Tipos de pokemons
            </div>
            <div class="card-body">
                @if(session("mensaje"))
                    <div class="alert alert-{{session("danger")?"danger":"success"}}">
                        {{session("mensaje")}}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Descripción</th>
                            <th>
                                <a href="{{route("tipos.create")}}" class="btn btn-primary">Nuevo</a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tipos as $tipo)
                            <tr>
                                <td>{{$tipo->id}}</td>
                                <td>{{$tipo->descripcion}}</td>
                                <td>
                                    <a href="{{route("tipos.edit",[$tipo])}}" class="btn btn-primary">Editar</a>
                                    <form action="{{route("tipos.destroy",[$tipo])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
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
