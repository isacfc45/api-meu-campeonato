<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'data_inscricao', 'pontos'];

    protected $casts = [
        'data_inscricao' => 'datetime',
    ];
}
