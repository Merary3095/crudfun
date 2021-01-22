<?php

namespace App\Observers;

use App\Models\Producto;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;

class ProductoObserver
{
    protected $usuario = null;
    public function __construct()
    {
        $user =Auth::user();
        if(is_null($user))
            $this->usuario = 'Anonimo';
        else
            $this->usuario =$user->name;
    }
    /**
     * Handle the Producto "created" event.
     *
     * @param  \App\Models\Producto  $producto
     * @return void
     */
    public function created(Producto $producto)
    {
        $registro = Bitacora::create([
            'quien' => $this->usuario,
            'accion' => 'Agrego Producto',
            'que' => $producto->toJson()
        ]);
    }

    /**
     * Handle the Producto "updated" event.
     *
     * @param  \App\Models\Producto  $producto
     * @return void
     */
    public function updated(Producto $producto)
    {
        $registro = Bitacora::create([
            'quien' => $this->usuario,
            'accion' => 'Actualizo Producto',
            'que' => $producto->toJson()
        ]);
    }

    /**
     * Handle the Producto "deleted" event.
     *
     * @param  \App\Models\Producto  $producto
     * @return void
     */
    public function deleted(Producto $producto)
    {
        $registro = Bitacora::create([
            'quien' => $this->usuario,
            'accion' => 'Elimino Producto',
            'que' => $producto->toJson()
        ]);
    }

    /**
     * Handle the Producto "restored" event.
     *
     * @param  \App\Models\Producto  $producto
     * @return void
     */
    public function restored(Producto $producto)
    {
        //
    }

    /**
     * Handle the Producto "force deleted" event.
     *
     * @param  \App\Models\Producto  $producto
     * @return void
     */
    public function forceDeleted(Producto $producto)
    {
        //
    }
}
