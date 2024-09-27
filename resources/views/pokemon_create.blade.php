@extends("layouts.app")

@section("content")

    <div class="container">
        <div class="card">
            <div class="card-header">
                Nuevo pokemon
            </div>
            <div class="card-body">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="container col-md-6">
                    <form action="{{route("pokemons.store")}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" value="{{old("nombre")}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="altura" class="form-label">Altura</label>
                            <input type="text" name="altura" value="{{old("altura")}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="peso" class="form-label">Peso</label>
                            <input type="text" name="peso" value="{{old("peso")}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="tipos_id" class="form-label">Label</label>
                            <select name="tipos_id" id="tipos_id" class="form-select">
                                @foreach($tipos as $tipo)
                                    <option value="{{$tipo->id}}" {{$tipo->id==old("tipos_id")?"selected":""}}>
                                        {{$tipo->descripcion}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{route("pokemons.index")}}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
