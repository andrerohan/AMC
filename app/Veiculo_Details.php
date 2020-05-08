<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Veiculo_Details extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome', 'veiculo_id', 'dynamic_id'
    ];

    public function dynamic()
    {
        return $this->belongsTo(Dynamic::class);

    }

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);

    }
}
