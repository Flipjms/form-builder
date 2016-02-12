<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clumsy_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('section');
            $table->string('section_slug');
            $table->string('name');
            $table->string('slug');
            $table->text('form');
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
        Schema::drop('clumsy_forms');
    }
}
