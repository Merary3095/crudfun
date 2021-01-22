<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['empleados']=Empleados::paginate();
        return view('empleados.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
        'Nombre' => 'required|string|max:100',
        'ApellidoPaterno' => 'required|string|max:100',
        'ApellidoMaterno' => 'required|string|max:100',
        'Correo' => 'required|email',
        'Foto' => 'required|max:10000|mimes:jpeg,png,jpg'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);



        $datosEmpleado=request()->except('_token');
        if($request->hasFile('Foto'))
        {
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Empleados::insert($datosEmpleado);
        return redirect('empleados')->with('Mensaje','Empleado Agregado Con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado= Empleados::findOrFail($id);

        return view('empleados.edit',compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
        'Nombre' => 'required|string|max:100',
        'ApellidoPaterno' => 'required|string|max:100',
        'ApellidoMaterno' => 'required|string|max:100',
        'Correo' => 'required|email',

        ];


        if($request->hasFile('Foto')){
            $campos+=['Foto' => 'required|max:10000|mimes:jpeg,png,jpg'];
        }
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosEmpleado=request()->except(['_token','_method']);

        if($request->hasFile('Foto'))
        {
            $empleado= Empleados::findOrFail($id);

            Storage::delete('public/'.$empleado->Foto);

            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
        }


        Empleados::where('id','=',$id)->update($datosEmpleado);

        //$empleado= Empleados::findOrFail($id);
        //return view('empleados.edit',compact('empleado'));
        return redirect('empleados')->with('Mensaje','Datos Modificados Con Exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $empleado= Empleados::findOrFail($id);

        if(Storage::delete('public/'.$empleado->Foto))
        {
            Empleados::destroy($id);
        }
        //
        return redirect('empleados')->with('Mensaje','Empleado Eliminado');
    }
}
