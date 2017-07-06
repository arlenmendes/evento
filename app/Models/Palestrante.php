<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Palestrante extends Model
{
    protected $fillable = [
            'nome', 'cargo', 'empresa', 'website', 'linkedin', 'foto',
        ];
}
