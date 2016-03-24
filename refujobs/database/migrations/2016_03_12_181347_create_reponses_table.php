<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reponses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reponse');
            $table->integer('question_id');
            $table->timestamps();
        });

        // Schema::table('reponses', function(Blueprint $table) {
        //     $table->foreign('quizz_id')->references('id')->on('quizzs')
        //                 ->onDelete('cascade')
        //                 ->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('reponses', function(Blueprint $table) {
        //     $table->dropForeign('reponses_quizz_id_foreign');
        // });     
 
        // Schema::drop('reponses');
    }
}
