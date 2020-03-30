<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5d0a5d530eb1fExamQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('exam_question')) {
            Schema::create('exam_question', function (Blueprint $table) {
                $table->integer('exam_id')->unsigned()->nullable();
                $table->foreign('exam_id', 'fk_p_316256_316254_questi_5d0a5d530edf6')->references('id')->on('exams')->onDelete('cascade');
                $table->integer('question_id')->unsigned()->nullable();
                $table->foreign('question_id', 'fk_p_316254_316256_exam_q_5d0a5d530ef25')->references('id')->on('questions')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_question');
    }
}
