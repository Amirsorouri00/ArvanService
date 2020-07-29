<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotteriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotteries', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->integer('capacity')->unsigned();
            $table->integer('stream_id')->unsigned();
            $table->foreign('stream_id')
                    ->references('id')
                    ->on('streams');
            $table->dateTime('lottery_ends_at', 0);
            $table->boolean('ended')->default('false');
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
        Schema::dropIfExists('lotteries');
    }
}
