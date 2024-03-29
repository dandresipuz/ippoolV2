<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class Ipaddress extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'ipaddress',
        'estado',
        'service',
        'idservice',
        'empresa_id',
    ];
    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa');
    }
}
