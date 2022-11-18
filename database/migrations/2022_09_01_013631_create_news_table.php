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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->string('slug');
            $table->string('banner_tags');
            $table->string('short_description');
            $table->longText('description');
            $table->string('feature_image');
            $table->string('banner_image')->nullable();
            $table->string('pradesh')->nullable();
            $table->text('tags')->nullable();
            $table->string('news_type')->nullable();
            $table->text('video_id')->nullable();
            //banner news, slider news  breaking news
            $table->text('author_name')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->integer('view_count')->default(0);
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('meta_descriptions')->nullable();
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
        Schema::dropIfExists('news');
    }
};
