<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $table="pokemons";
    protected $guarded=["id"];

    public function relTipo()
    {
        return $this->belongsTo(Tipo::class, "tipos_id", "id");
    }
}
