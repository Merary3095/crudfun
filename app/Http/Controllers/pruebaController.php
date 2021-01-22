<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\prueba;
use Illuminate\Http\Request;

class pruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $prueba = prueba::where('Nombre', 'LIKE', "%$keyword%")
                ->orWhere('Descripcion', 'LIKE', "%$keyword%")
                ->orWhere('Imagen', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $prueba = prueba::latest()->paginate($perPage);
        }

        return view('prueba.index', compact('prueba'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('prueba.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
                if ($request->hasFile('Imagen')) {
            $requestData['Imagen'] = $request->file('Imagen')
                ->store('uploads', 'public');
        }

        prueba::create($requestData);

        return redirect('prueba')->with('flash_message', 'prueba added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $prueba = prueba::findOrFail($id);

        return view('prueba.show', compact('prueba'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $prueba = prueba::findOrFail($id);

        return view('prueba.edit', compact('prueba'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
                if ($request->hasFile('Imagen')) {
            $requestData['Imagen'] = $request->file('Imagen')
                ->store('uploads', 'public');
        }

        $prueba = prueba::findOrFail($id);
        $prueba->update($requestData);

        return redirect('prueba')->with('flash_message', 'prueba updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        prueba::destroy($id);

        return redirect('prueba')->with('flash_message', 'prueba deleted!');
    }
}
