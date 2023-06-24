<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table -> integer('id_vendeur') ->unsigned();
            $table -> foreign('id_vendeur') ->references('id')->on('user')->onDelet('cascade');
            $table -> integer('id_acheteur') ->unsigned();
            $table -> foreign('id_acheteur') ->references('id')->on('user')->onDelet('cascade');
            $table -> integer('id_annonce') ->unsigned();
            $table -> foreign('id_annonce') ->references('id')->on('annonces')->onDelet('cascade');
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
        Schema::dropIfExists('messages');
    }
}
