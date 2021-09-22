<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('book_name');
            $table->string('author_name');
            $table->string('book_publication');
            $table->string('book_edition');
            $table->string('user_id');
            $table->softDeletes();      //remove this for soft delete
            // dont uncomment this $table->string('name_user');
            //$table->timestamps();
        });

        Schema::table('request_books', function (Blueprint $table) {
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
        Schema::dropIfExists('request_books');
    }
}
