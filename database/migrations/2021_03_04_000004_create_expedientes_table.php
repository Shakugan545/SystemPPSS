<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpedientesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'expedientes';

    /**
     * Run the migrations.
     * @table expedientes
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('programa', 100)->nullable();
            $table->date('inicio')->nullable();
            $table->date('fin')->nullable();
            $table->string('dia', 45)->nullable();
            $table->string('h_inicio', 45)->nullable();
            $table->string('h_fin', 45)->nullable();
            $table->string('reportes', 100)->nullable();
            $table->unsignedInteger('estudiantes_codigo');

            $table->index(["estudiantes_codigo"], 'fk_expedientes_estudiantes_idx');


            $table->foreign('estudiantes_codigo', 'fk_expedientes_estudiantes_idx')
                ->references('codigo')->on('estudiantes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
