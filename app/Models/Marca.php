<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Marca extends Model
{
    protected $table = 'marcas';
    protected $fillable = ['nombre'];

    public function modelos():HasMany
    {
        return $this->hasMany(Modelo::class, 'marca_id', 'id');
    }
}
