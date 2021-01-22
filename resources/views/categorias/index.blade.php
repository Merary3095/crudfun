@extends('layout.general')
@section('menu')
<div class="col-md-3">
    <div class="card">
        <div class="card-header">
<img src="{{ asset('storage').'/'.'uploads'.'/'.'1pR8JnYGtygJStzvO5OKp6NvTi3u957Hr12NTiX7.jpeg'}}" alt="150" class="img-thumbnail img-fluid" alt="" width="300">
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Barra de navegacion
        </div>

        <div class="card-body">
            <ul>
            <li><a href="/productos"><em class="icon-reorder">&nbsp;</em> Productos</a></li>
            <li class="active"><a href="/categorias"><em class="icon-sitemap">&nbsp;</em> Categorias</a></li>
            <li><a href="charts.html"><em class="icon-exchange">&nbsp;</em> Ventas</a></li>
            <li><a href="elements.html"><em class="icon-shopping-cart">&nbsp;</em> Mis compras</a></li>
 </ul>
        </div>
    </div>
</div>
@endsection
@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Categorias</div>
                    <div class="card-body">
                        <a href="{{ url('/categorias/create') }}" class="btn btn-success btn-sm" title="Add New Categoria">
                            <i class="fa fa-plus" aria-hidden="true"></i> Añadir Categoria
                        </a>

                        <form method="GET" action="{{ url('/categorias') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>


                        </form>
                        <div class="user-name">{{Auth::user()->name}} <br> {{Auth::user()->rol}}</div>


                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Nombre</th><th>Descripcion</th><th>Imagen</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($categorias as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->Nombre }}</td><td>{{ $item->Descripcion }}</td>
                                        <td><img src="{{ asset('storage').'/'.$item->Imagen}}" class="img-thumbnail img-fluid" alt="" width="300"></td>
                                        <td>
                                            <div class="btn-group">
                                            <a href="{{ url('/categorias/' . $item->id) }}" title="View Categoria"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Mostrar</button></a>
                                            <a href="{{ url('/categorias/' . $item->id . '/edit') }}" title="Edit Categoria"><button class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/categorias' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Categoria" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $categorias->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
