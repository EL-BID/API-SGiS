<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIncidenciasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('incidencias', function(Blueprint $table)
		{
			$table->string('id', 50)->primary();
			$table->string('motivo_ingreso', 191)->nullable();
			$table->string('impresion_diagnostica', 191)->nullable();
			$table->integer('estados_incidencias_id')->unsigned()->nullable()->index('incidencias_estados_incidencias_id_foreign');
			$table->string('clues_actual', 45)->nullable();
			$table->boolean('enTransito')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('incidencias');
	}

}
