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
        Schema::create('gestaos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 20)->nullable(false);
            $table->string('descricao', 1500)->nullable(false);
            $table->date('data_inicio' )->nullable(false);
            $table->date('data_termino')->nullable(false);
            $table->decimal('valor_projeto')->nullable(false);
            $table->string('status', 25)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestaos');
    }
};
