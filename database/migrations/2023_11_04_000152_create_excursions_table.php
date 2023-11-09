<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excursions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('descriptionZone');
            $table->string('fullDescription');
            $table->integer('price');//<-Should be integer
            $table->text('featured_photo');
            $table->string('placeMeeting');//<-Should be integer
            $table->date('startDateExcursion');//<-Should be date
            $table->date('finishDateExcursion');//<-Should be date
            $table->time('durationExcursion');//<-Should be time
            $table->string('guide');
            $table->string('transport');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('excursions');
    }
};
