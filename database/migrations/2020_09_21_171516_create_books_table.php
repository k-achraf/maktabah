<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('paralel')->nullable();
            $table->text('info')->nullable();
            $table->string('keywords')->nullable();
            $table->string('image')->nullable();
            $table->string('copies')->default(0);
            $table->string('date')->nullable();
            $table->string('isbn')->nullable();
            $table->string('language')->nullable();
            $table->string('type')->nullable();
            $table->string('source')->nullable();
            $table->string('place')->nullable();
            $table->integer('time')->nullable();
            $table->string('relation')->nullable();
            $table->string('coverage')->nullable();
            $table->string('contributor')->nullable();
            $table->string('identifier')->nullable();
            $table->integer('number')->nullable();
            $table->string('file')->nullable();
            $table->string('format')->nullable();
            $table->integer('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('authors');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('property')->unsigned();
            $table->foreign('property')->references('id')->on('property');
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
        Schema::dropIfExists('books');
    }
}
