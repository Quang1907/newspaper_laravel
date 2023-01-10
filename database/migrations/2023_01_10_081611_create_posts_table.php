<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string( 'name' );
            $table->string( 'slug' );
            $table->string( 'category_id' );
            $table->string( 'description' );
            $table->string( 'small_description' );
            $table->string( 'meta_title' );
            $table->foreignId( 'user_id' )->references( 'id' )->on( 'users' );
            $table->string( 'image' );
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
        Schema::dropIfExists('posts');
    }
}
