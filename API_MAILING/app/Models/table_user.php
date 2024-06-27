<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class table_user extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'table_user';
    
    protected $fillable = [
        'name_user', 'email_user', 'password_user', 'password_confirm',
    ];

    protected $hidden = [
        'password_user',
        'password_confirm',
    ];
}

