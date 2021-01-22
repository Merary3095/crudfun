@extends('layout.general')
@section('content')
@include('layout.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Productos</div>
                    <div class="card-body">
                        <a href="{{ url('/productos/create') }}" class="btn btn-success btn-sm" title="Add New producto">
                            <i class="fa fa-plus" aria-hidden="true"></i> Añadir Producto
                        </a>

                        <form method="GET" action="{{ url('/productos') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                        @if(Auth::check())
                        <div class="user-name">{{Auth::user()->name}} <br> {{Auth::user()->rol}} </div>
                        @endif
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-light table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Categoria</th>
                                        <th>Precio</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($productos as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $item->Nombre }}</td>
                                        <td>{{ $item->Descripcion }}</td>
                                        <td>{{ $item->Categoria }}</td>
                                        <td>{{ $item->Precio }}</td>

                                        <td>

                                            <div class="btn-group">
                                            <a href="{{ url('/productos/' . $item->id) }}" title="View producto"><button class="btn btn-info"><i class="fa fa-eye" aria-hidden="true" ></i> Mostrar</button></a>

                                            <a href="{{ url('/productos/' . $item->id . '/edit') }}" title="Edit producto"><button class="btn btn-warning "><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/productos' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger " title="¿Eliminar producto?" onclick="return confirm(&quot; Eliminar Producto?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                                </div>
                                            </form>




                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $productos->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>

@endsection
