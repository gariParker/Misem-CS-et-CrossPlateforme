<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class table_user extends Model
{
    use HasApiTokens, HasFactory;

    protected $table = 'table_user';

    protected $fillable = [
        'name_user',
        'email_user',
        'password_user',
        'password_confirm',
    ];

    protected $hidden = [
        'password_user',
        'password_confirm',
    ];
}

