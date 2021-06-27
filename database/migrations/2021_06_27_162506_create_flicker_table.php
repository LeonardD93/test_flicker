<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlickerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('flicker', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('link');
            $table->string('media');
            $table->string('date_taken');
            $table->text('description');
            $table->string('published');
            $table->string('author');
            $table->string('author_id');
            $table->text('tags');
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
        Schema::dropIfExists('flicker');
    }
}
