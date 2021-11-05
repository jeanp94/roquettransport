<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->string('slug', 255)->unique();
            $table->longText('content')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->integer('views')->unsigned()->default(0);
            $table->unsignedBigInteger('thumbnail_id')->nullable(); //imagen referencial
            $table->unsignedBigInteger('banner_id')->nullable(); //banner
            $table->foreignId('category_id')->constrained();
            $table->date('published_at')->nullable();
            $table->unsignedTinyInteger('status')->default(2);//0:inactivo, 1:activo, 2:borrador
            $table->timestamps();

            $table->foreign('thumbnail_id')->references('id')->on('medias')->onDelete('set null');
            $table->foreign('banner_id')->references('id')->on('medias')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['thumbnail_id']);
            $table->dropForeign(['banner_id']);
            $table->dropForeign(['category_id']);
        });
        Schema::dropIfExists('posts');
    }
}
