<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'street',
        'district',
        'uf',
        'city',
        'cep'
    ];

    public function scopeByCep($query, $cep)
    {
        return $query->where('cep', $cep);
    }
}
