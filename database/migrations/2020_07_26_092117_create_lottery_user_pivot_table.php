<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLotteryUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lottery_user', function (Blueprint $table) {
            $table->integer('lottery_id')
                    ->unsigned()
                    ->index();
            $table->foreign('lottery_id')
                    ->references('id')
                    ->on('lotteries')
                    ->onDelete('cascade');
            $table->integer('user_id')
                    ->unsigned()
                    ->index();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            $table->primary(['lottery_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lottery_user');
    }
}
