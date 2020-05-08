<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome', 'contribuinte','morada', 'codigopostal', 'localidade', 'contacto', 'obs'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function veiculos()
    {
        return $this->hasMany(Veiculo::class);
    }
}
