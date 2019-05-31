<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_payment', function (Blueprint $table) {
			$table->increments('id');
			$table->string('reference')->nullable();
			$table->string('status')->nullable();
			$table->integer('amount')->nulllable()->default(0);
			$table->bigInteger('flight_id')->index();
			$table->timestamps();
			

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flight_payment');
    }
}
