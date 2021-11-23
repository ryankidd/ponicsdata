<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id()->unsignedBigInteger();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('room_id');

            $table->timestamps();
            $table->index(['id', 'room_id']);
        });

        Schema::table('devices', function($table) {
            $table->foreign('room_id')
                ->references('id')
                ->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
