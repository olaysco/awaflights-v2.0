<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id')->index();
			$table->string('bookingNumber');
			$table->string('referenceNumber');
			$table->string('ticketLimitDate');
			$table->string('email');
			$table->string('firstName');
			$table->string('lastName');
			$table->string('phoneNumber');
			$table->json('flightDetails');
			$table->json('paymentDetails')->nullable();
			$table->string('status')->default('booked');
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
        Schema::dropIfExists('flights');
    }
}
