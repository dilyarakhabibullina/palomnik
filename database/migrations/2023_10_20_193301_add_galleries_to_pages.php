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
        Schema::table('pages', function (Blueprint $table) {
            $table->text('photo_gallery_heading')->after('contact_status');
            $table->integer('photo_gallery_status')->after('photo_gallery_heading');
            $table->text('video_gallery_heading')->after('photo_gallery_status');
            $table->integer('video_gallery_status')->after('video_gallery_heading');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('photo_gallery_heading');
            $table->dropColumn('photo_gallery_status');
            $table->dropColumn('video_gallery_heading');
            $table->dropColumn('video_gallery_status');
        });
    }
};
