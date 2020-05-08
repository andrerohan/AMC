<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reparacao extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'data', 'obs','veiculo_id', 'km'
    ];

    public function veiculo()
    {
        return $this->belongsTo(\App\Veiculo::class);
    }

    public function details()
    {
        return $this->hasMany(\App\Reparacao_Details::class);
    }
}
