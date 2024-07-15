<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $fillable = [
        'fechaVenta',
        'producto',
        'cantidadVendida', 
        'precioUnitario',
        'total'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'fechaVenta' => 'date',
        'cantidadVendida' => 'integer',
        'precioUnitario' => 'decimal:2',
        'total' => 'decimal:2',
    ];
}
