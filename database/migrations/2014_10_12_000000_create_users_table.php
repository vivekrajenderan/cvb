<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_mst', function (Blueprint $table) {
            $table->increments('pk_uid');
            $table->string('fname');
			$table->string('lname');
            $table->string('emailid')->unique();
            $table->string('secret_pass');
            $table->rememberToken();
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
        Schema::drop('user_mst');
    }
}
