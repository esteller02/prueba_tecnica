<?php

namespace App\Models;

use Database\Factories\CarroFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Carro extends Model
{
    protected $table =  'carros';
    protected $fillable = ['modelo_id', 'color_id', 'ano', 'precio', 'kilometraje'];


    protected static function factory()
    {
        return CarroFactory::new();
    }
    public function modelo():BelongsTo
    {
        return $this->belongsTo(Modelo::class, 'modelo_id', 'id');
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }
}
