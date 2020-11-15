<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsEmailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emails', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->string('from')->after('id');
            $table->string('to')->after('from');
            $table->string('subject')->after('to');
            $table->string('content')->after('subject');
            $table->string('type')->after('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emails', function (Blueprint $table) {
            $table->dropColumn('from');
            $table->dropColumn('to');
            $table->dropColumn('subject');
            $table->dropColumn('content');
            $table->dropColumn('type');
            $table->json('email');
        });
    }
}
