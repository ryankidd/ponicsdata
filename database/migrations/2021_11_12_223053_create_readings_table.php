<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('readings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id()->unsignedBigInteger();
            $table->json('data');
            $table->unsignedBigInteger('device_id');
            $table->timestamps();
            $table->index(['id', 'device_id']);
        });

        Schema::table('readings', function($table) {
            $table->foreign('device_id')
                ->references('id')
                ->on('devices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('readings');
    }
}
