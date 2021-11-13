<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wansolarwind extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'vlanid',
        'vprn',
        'redwanuno',
        'redwandos',
        'ipbogrtdntres',
        'ipboggcuno',
        'ipbog41000',
        'ipboggcdos',
        'estado',
        'cliente_id'
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }
}
