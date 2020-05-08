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
        return $this->belongsTo(Cliente::class);
    }

    public function reparacoes()
    {
        return $this->hasMany(Reparacao::class);
    }

    public function veiculos_details()
    {
        return $this->hasMany(Veiculo_Details::class);
    }
}
