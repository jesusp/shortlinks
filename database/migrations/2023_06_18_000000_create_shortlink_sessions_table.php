<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShortlinkSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shortlink_sessions', function (Blueprint $table) {
            $table->id();
            $table->integer("shortlink_id")->unsigned()->nullable();
            $table->mediumText('user_agent');
            $table->integer('clicks')->default(1);
            $table->boolean('blocked')->default(0);

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
        Schema::dropIfExists('shortlink_sessions');
    }
}
