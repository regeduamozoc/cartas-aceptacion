<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('ApellidoPaterno');
            $table->string('ApellidoMaterno');
            $table->integer('Matricula');
            $table->string('CartaP')->nullable();
            $table->integer('Usuario')->nullable();
            $table->foreignId('id_institucion')
                  ->nullable()
                  ->constrained('institucions')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
            $table->foreignId('id_carrera')
                  ->nullable()
                  ->constrained('carreras')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
            $table->foreignId('id_servicio')
                  ->nullable()
                  ->constrained('servicios')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
            $table->foreignId('id_proyecto')
                  ->nullable()
                  ->constrained('proyectos')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
}
