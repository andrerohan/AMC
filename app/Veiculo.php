<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Veiculo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'matricula', 'marca', 'modelo', 'ano', 'obs', 'cliente_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(\App\Cliente::class);
    }

    public function reparacoes()
    {
        return $this->hasMany(\App\Reparacao::class);
    }

    public function veiculos_details()
    {
        return $this->hasMany(\App\Veiculo_Details::class);
    }
}
