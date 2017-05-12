<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAndEditColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('avatar');
            $table->smallInteger('gender');
            $table->string('address');
            $table->string('phone', 20);
            $table->smallInteger('level');
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
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn('avatar');
            $table->dropColumn('gender');
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('level');
            $table->dropSoftDeletes();
        });
    }
}
