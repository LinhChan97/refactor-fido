<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ratings', function (Blueprint $table) {
            $table->integer('report')->default(0);
            $table->integer('likes')->default(100);
        });
        Schema::table('doctors', function (Blueprint $table) {
            $table->renameColumn('fk_employee_id', 'employee_id')->nullable()->change();
        });
        Schema::table('employees', function (Blueprint $table) {
            $table->renameColumn('fk_address_id', 'address_id')->nullable()->change();
            $table->string('address_details')->nullable();
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
