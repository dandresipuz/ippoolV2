<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aliado extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nombre',
        'active'
    ];

    // Relación uno a muchos
    public function user()
    {
        return $this->hasMany('App\Models\User');
    }

    // Relación muchos a muchos
    public function centralizador()
    {
        return $this->belongsToMany('App\Models\Centralizador');
    }

    public function area()
    {
        return $this->belongsToMany('App\Models\Area');
    }
}
