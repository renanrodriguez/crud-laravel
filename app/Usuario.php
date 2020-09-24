<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'nome', 'email','senha', 'data_nascimento'
    ];
}