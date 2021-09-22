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
            $table->increments('id');
            $table->string('book_name');
            $table->string('author_name');
            $table->string('shelf_no');
            $table->string('shelf_image');
            $table->string('row_no');
            $table->string('column_no');
            $table->string('book_image');
            $table->string('book_quantity');
            $table->string('user_id');
            $table->softDeletes();      //remove this for soft delete
            // dont use timestamp
            //$table->timestamps();
        });

        Schema::table('books', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('users');
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
