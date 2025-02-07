<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('rater_id');
            $table->string('subject');
            $table->longText('review')->nullable();
            $table->integer('rating')->default(0);
            $table->integer('replyer_id')->nullable();
            $table->longText('reply')->nullable();
            $table->integer('pstatus')->nullable();
            $table->integer('mistake_user_id')->nullable();
            $table->longText('comments')->nullable();
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
        Schema::dropIfExists('ratings');
    }
}
