<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="laravel_crud_api",
 *     type="object",
 *     title="Laravel CRUD API",
 *     required={"name", "lastname", "email", "password"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="John"),
 *     @OA\Property(property="lastname", type="string", example="Doe"),
 *     @OA\Property(property="email", type="string", example="john.doe@example.com"),
 *     @OA\Property(property="password", type="string", example="hashed_password")
 * )
 */

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

