<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reparacao_Details extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'dynamic_id', 'qtd','preco', 'reparacao_id', 'nome'
    ];

    public function reparacao()
    {
        return $this->belongsTo(\App\Reparacao::class);

    }

    public function dynamic()
    {
        return $this->belongsTo(\App\Dynamic::class);

    }
}
