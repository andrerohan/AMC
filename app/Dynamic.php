<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dynamic extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome', 'model'
    ];

    public function veiculos_details()
    {
        return $this->hasMany(\App\Veiculo_Details::class);
    }

    public function reparacoes_details()
    {
        return $this->hasMany(\App\Reparacao_Details::class);
    }
}
