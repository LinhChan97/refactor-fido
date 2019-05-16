<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RefactorUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('group_id');
            $table->dropColumn('fk_refference');
            $table->dropColumn('email_verified_at');
            $table->dropColumn('user_reset_token');
            $table->dropColumn('api_token');
            $table->renameColumn('status', 'user_status');
            $table->renameColumn('user_active_check', 'verified');

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
