<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoncesTable extends Migration

{
    /*
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('titre');
            $table->string('description');
            $table->integer('prix');
            $table -> integer('id_ville') ->unsigned();
            $table -> foreign('id_ville') ->references('id')->on('villes')->onDelete('cascade ');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('annonces');
    }
}
