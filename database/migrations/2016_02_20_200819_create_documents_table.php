<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('document',function(Blueprint $table){
            $table->increments('id');
            $table->string('titre');
            $table->string('pathimg');
            $table->string('pathfile');
            $table->longText('contenu');
            $table->integer('id_categories');
            $table->integer('id_auteur');
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
        Schema::drop('document');

    }
}
