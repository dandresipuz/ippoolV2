<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wancliente extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'vprn',
        'cliente_id',
        'vlan_id',
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }
    public function wansolarwind()
    {
        return $this->hasOne('App\Models\Wansolarwind');
    }
}
