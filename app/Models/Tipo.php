<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;
    protected $table="tipos";
    protected $guarded=["id"];

    public function relPokemon()
    {
        return $this->hasMany(Pokemon::class, "tipos_id", "id");
    }
}
