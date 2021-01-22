@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-15">
                <div class="card">
                    <div class="card-header">producto {{ $producto->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/productos') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <a href="{{ url('/productos/' . $producto->id . '/edit') }}" title="Edit producto"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('productos' . '/' . $producto->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete producto" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $producto->id }}</td>
                                    </tr>
                                    <tr><th> Imagen </th><td> <img src="{{ asset('storage').'/'.$producto->Imagen}}" class="img-thumbnail img-fluid" alt="" width="300"> </td></tr>
                                    <tr><th> Nombre </th><td> {{ $producto->Nombre }} </td></tr><tr><th> Descripcion </th><td> {{ $producto->Descripcion }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
