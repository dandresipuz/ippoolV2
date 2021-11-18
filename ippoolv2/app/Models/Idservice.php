<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idservice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [

        'service',
        'empresa_id',
        'usuario_id',
        'active',
    ];

    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa');
    }
}
