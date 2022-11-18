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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('bcategory_id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->longText('description');
            $table->text('tags')->nullable();
            $table->string('feature_image')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_descriptions')->nullable();
            $table->tinyInteger('status')->default(1)->nullable();
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
        Schema::dropIfExists('blogs');
    }
};
