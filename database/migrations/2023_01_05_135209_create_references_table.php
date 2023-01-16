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
        Schema::create('references', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('authors');
            $table->string('title');
            $table->string('website_name')->nullable();
            $table->string('book_title')->nullable();
            $table->string('book_author')->nullable();
            $table->string('periodic_title')->nullable();
            $table->string('publishing')->nullable();
            $table->string('newspaper_name')->nullable();
            $table->string('url')->nullable();
            $table->string('locality')->nullable();
            $table->string('district')->nullable();
            $table->integer('year')->nullable();
            $table->integer('day')->nullable();
            $table->integer('month')->nullable();
            $table->string('pages')->nullable();
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
        Schema::dropIfExists('references');
    }
};
