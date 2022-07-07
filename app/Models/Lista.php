<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    
    protected $fillable = [
        'mes',
        'ano',
        'observacao',
        'user_id',
        
    ];
    use HasFactory;

 public function beneficiado(){
    return $this->belongsToMany(Beneficiado::class);
 }
}