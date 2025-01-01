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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->string('from');
            $table->string('to');
            $table->integer('price');
            $table->integer('seats');
            $table->string('type');
            $table->date('date');
            $table->foreignId('transport_id'); //Пока что нет таблицы
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes_tabl');
    }
};
