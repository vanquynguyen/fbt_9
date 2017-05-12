<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('tour_id');
            $table->string('fullname', 100);
            $table->string('email');
            $table->string('country', 50);
            $table->string('phone', 20);
            $table->timestamp('departure_date');
            $table->smallInteger('adult');
            $table->smallInteger('child');
            $table->smallInteger('infant');
            $table->integer('total_amount');
            $table->string('orther_request');
            $table->softDeletes();
            $table->timestamps();  

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('tour_id')
                ->references('id')
                ->on('tours')
                ->onUpdate('cascade')
                ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
