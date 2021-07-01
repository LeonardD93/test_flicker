<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNullableFlicker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('flicker', function (Blueprint $table) {
            $table->string('title')->nullable()->change();
            
            $table->string('media')->nullable()->change();
            $table->string('date_taken')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->string('published')->nullable()->change();
            $table->string('author')->nullable()->change();
            $table->string('author_id')->nullable()->change();
            $table->text('tags')->nullable()->change();
        });
    }

    public function down()
    {
        //
    }
}
