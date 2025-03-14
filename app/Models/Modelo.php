<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Modelo extends Model
{
    protected $table = 'modelos';
    protected $fillable = ['nombre', 'marca_id'];

    public function marca(): BelongsTo
    {
        return $this->belongsTo(Marca::class, 'marca_id', 'id');
    }
}
