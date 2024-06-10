<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('laravel_crud_api', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('lastname',200);
            $table->string('email',200);
            $table->string('password',200);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laravel_crud_api');
    }
};
