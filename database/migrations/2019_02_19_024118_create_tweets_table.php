<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweets', function (Blueprint $table) {
            // ・id               id
            $table->increments('id');

            // ・ユーザーID         user_id
            $table->integer('user_id')->unsigned();

            // ・ツイートする内容    tweet
            $table->string('tweet', 500);

            // ・created_at       created_at
            // ・updated_at       updated_at
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
        Schema::dropIfExists('tweets');
    }
}
