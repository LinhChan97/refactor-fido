<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetNullableForPatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->renameColumn('phone_no_1', 'phone_number');
            $table->dropColumn('phone_no_2');
            $table->integer('fk_address_id')->nullable()->change();
        });
        Schema::table('doctors', function (Blueprint $table) {
            $table->renameColumn('phone_no_1', 'phone_number');
            $table->dropColumn('phone_no_2');
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
