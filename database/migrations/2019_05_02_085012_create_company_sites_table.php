<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanySitesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_sites', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('name')->nullable();
			$table->string('uuid')->unique();
			$table->string('address')->nullable();
			$table->timestamps();
			$table->integer('company_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('company_sites');
	}

}
