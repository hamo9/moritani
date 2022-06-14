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
            $table->string('title')->unique();

            $table->text('body');
            $table->integer('category_id')->unsigned();
            $table->boolean('type')->default(0);
            $table->integer('subCategory_id')->unsigned()->nullable();
            $table->integer('read_count')->unsigned()->default(0);

            $table->text('photo')->nullable();
            $table->string('created_by');
            $table->boolean('remove')->default(0);
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
