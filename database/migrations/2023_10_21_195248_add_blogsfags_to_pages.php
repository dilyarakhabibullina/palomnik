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
            $table->text('faq_heading')->after('video_gallery_status');
            $table->integer('faq_status')->after('faq_heading');
            $table->text('blog_heading')->after('faq_status');
            $table->integer('blog_status')->after('blog_heading');
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
            $table->dropColumn('faq_heading');
            $table->dropColumn('faq_status');
            $table->dropColumn('blog_heading');
            $table->dropColumn('blog_status');
        });
    }
};
