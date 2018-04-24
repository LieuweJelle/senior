<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstname')->nullable();//default()
            $table->string('lastname')->nullable();
            $table->string('street')->nullable();
            $table->string('streetnumber')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('place')->nullable();
            $table->integer('telephone')->nullable();
            $table->integer('role_id')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('street');
            $table->dropColumn('streetnumber');
            $table->dropColumn('zipcode');
            $table->dropColumn('place');
            $table->dropColumn('telephone');
            $table->dropColumn('role_id');
       });
    }
}
