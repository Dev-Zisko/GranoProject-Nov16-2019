<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mes', 'año', 'monto', 'fechavencimiento', 'transferencia', 'estado', 'id_user',
    ];
}
