<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
/**
 *
 */
class Usuario extends Authenticatable
{
	protected $table='users';

	public$timestamps = false;
	protected $fillable = ['name','email','telefono','password'];
}
