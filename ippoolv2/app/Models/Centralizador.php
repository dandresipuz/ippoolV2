<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centralizador extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'email',
        'tipo_doc',
        'documento',
        'documento',
        'active',

    ];

    public function user()
    {
        return $this->hasMany('App\Models\User');
    }

    // Relación muchos a muchos
    public function aliado()
    {
        return $this->belongsToMany('App\Models\Aliado');
    }
}
