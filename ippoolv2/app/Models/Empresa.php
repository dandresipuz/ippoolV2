<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class Empresa extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [

        'empresa',
        'tipo_doc',
        'documento',
        'segmento',
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
    public function wansolarwind()
    {
        return $this->hasMany('App\Models\Wansolarwind');
    }
}
