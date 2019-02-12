<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Blip extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blips', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('start');
            $table->string('end');
            $table->string('notes');
            $table->string('contact_1');
            $table->string('contact_2')->nullable();
            $table->string('contact_3')->nullable();
            $table->boolean('trashed');
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
        Schema::dropIfExists('blips');
    }
}
