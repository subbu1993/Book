<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
           Schema::create('bookinfo',function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->integer('author_id');
                $table->string('genre');
                $table->integer('review_sum');
                $table->integer('review_count');
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
        //
    }
}
