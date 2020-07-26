<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateStreamsTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * This table is Just for the record to make
     * service more realistic
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('streams', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->timestamp('starts_at')
                    ->default(Carbon::now());
            $table->timestamp('finishes_at')
                    ->default(Carbon::now()
                    ->addMinutes(90));
            $table->timestamp('abrservice_current')->useCurrent(); //Just to sense its output
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
        Schema::dropIfExists('streams');
    }
}
