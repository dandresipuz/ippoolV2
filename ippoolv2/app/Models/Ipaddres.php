<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ipaddres extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'ipaddress',
        'estado',
        'cliente_id',
    ];
    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }
}
