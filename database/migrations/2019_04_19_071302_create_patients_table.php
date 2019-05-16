<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status')->nullable();
            $table->integer('created_by_user')->nullable();
            $table->integer('updated_by_user')->nullable();
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->date('birthday')->nullable();
            $table->string('description')->nullable();
            $table->string('gender');
            $table->string('id_number')->nullable();
            $table->string('id_number_place')->nullable();
            $table->date('id_number_date')->nullable();
            $table->integer('phone_no_1');
            $table->integer('phone_no_2')->nullable();
            $table->string('email');
            $table->integer('fk_address_id');

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
        Schema::dropIfExists('patients');
    }
}
