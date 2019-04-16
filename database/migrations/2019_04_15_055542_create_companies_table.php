<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            //递增 ID（主键），相当于「UNSIGNED BIG INTEGER」
            $table->bigIncrements('id');
            //相当于带长度的 VARCHAR
            $table->string('name')->default(null);
            $table->string('uuid');
            $table->string('address')->default(null);
            $table->dateTime('created_at')->default(null);
            $table->dateTime('updated_at')->default(null);
            $table->unique('uuid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
