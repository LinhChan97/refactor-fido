<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status')->nullable();
            $table->integer('created_by_user')->nullable();
            $table->integer('updated_by_user')->nullable();
            $table->string('doctor_no');
            $table->string('name');
            $table->string('avatar');
            $table->date('birthday');
            $table->string('description')->nullable();
            $table->string('gender');
            $table->string('id_number');
            $table->string('id_number_place');
            $table->date('id_number_date');
            $table->string('passport_no');
            $table->string('passport_place');
            $table->date('passport_date');
            $table->integer('phone_no_1');
            $table->integer('phone_no_2')->nullable();
            $table->string('email');
            $table->integer('fk_address_id');
            $table->integer('fk_employee_id');
            $table->integer('specialist');
            $table->integer('actived')->default(1);
            $table->string('hospital_name');
            $table->string('experience');
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
        Schema::dropIfExists('doctors');
    }
}
