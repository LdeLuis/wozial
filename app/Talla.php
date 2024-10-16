<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talla extends Model
{
    protected $table = "tallas";

    protected $fillable = [
        'talla',
    ];

    public function catalogos()
    {
        return $this->hasMany(Catalogo::class);
    }
}
