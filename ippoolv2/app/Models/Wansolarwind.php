<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class Wansolarwind extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
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
        'empresa_id'
    ];

    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa');
    }
}
