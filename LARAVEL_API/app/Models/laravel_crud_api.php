<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laravel_crud_api extends Model
{
    use HasFactory;

    protected $table = "laravel_crud_api";
    
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
    ];
    
}

