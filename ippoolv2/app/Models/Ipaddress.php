<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ipaddress extends Model
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
        'empresa_id',
    ];
    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa');
    }
}
