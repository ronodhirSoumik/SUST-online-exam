<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsResultsAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams_results_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exams_result_id')->unsigned()->nullable();
            $table->foreign('exams_result_id')->references('id')->on('exams_results')->onDelete('cascade');
            $table->integer('question_id')->unsigned()->nullable();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->integer('option_id')->unsigned()->nullable();
            $table->foreign('option_id')->references('id')->on('question_options')->onDelete('cascade');
            $table->tinyInteger('correct')->default(0);
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
        Schema::dropIfExists('exams_results_answers');
    }
}
