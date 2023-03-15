<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class Centralizador extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'email',
        'tipo_doc',
        'documento',
        'active',
    ];

    public function user()
    {
        return $this->hasMany('App\Models\User');
    }
}
