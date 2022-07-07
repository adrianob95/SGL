<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiado extends Model
{
      
    protected $fillable = [
        'nome',
        'documento',
        'endereco',
        'contato',
        'observacao',
        'user_id',

    ];
    use HasFactory;

    public function lista()
    {
        return $this->belongsToMany(Lista::class);
    }
}
