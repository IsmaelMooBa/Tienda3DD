<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{

    protected $fillable = ['producto_id', 'cantidad'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}

