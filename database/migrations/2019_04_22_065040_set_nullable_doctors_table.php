<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetNullableDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('doctor_no')->nullable()->change();
            $table->string('name')->nullable()->change();
            $table->string('avatar')->nullable()->change();
            $table->date('birthday')->nullable()->change();
            $table->string('gender')->nullable()->change();
            $table->string('id_number')->nullable()->change();
            $table->string('id_number_place')->nullable()->change();
            $table->date('id_number_date')->nullable()->change();
            $table->string('passport_no')->nullable()->change();
            $table->string('passport_place')->nullable()->change();
            $table->date('passport_date')->nullable()->change();
            $table->integer('phone_no_1')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->integer('fk_address_id')->nullable()->change();
            $table->integer('fk_employee_id')->nullable()->change();
            $table->integer('specialist')->nullable()->change();
            $table->string('hospital_name')->nullable()->change();
        });
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
