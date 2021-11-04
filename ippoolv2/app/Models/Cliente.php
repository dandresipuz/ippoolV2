<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nit',
        'nombre',
        'contacto',
        'telefono',
        'canal',
        'email',
        'usuario_id',
        'active',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function ipaddres()
    {
        return $this->hasMany('App\Models\Ipaddress');
    }
    public function wancliente()
    {
        return $this->hasMany('App\Models\Wancliente');
    }
}
