<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->text('cv_notes')->nullable();
            $table->boolean('cv_result')->nullable();
            $table->integer('english')->nullable();
            $table->integer('iq')->nullable();
            $table->integer('technical')->nullable();
            $table->boolean('exam_result')->nullable();
            $table->text('interview_notes')->nullable();
            $table->boolean('interview_result')->nullable();
            $table->integer('degree')->nullable();
            $table->text('offer')->nullable();
            $table->string('response',1)->nullable();
            $table->text('refuse')->nullable();
            $table->integer('app_id')->unsigned();
            $table->foreign('app_id')->references('id')->on('applicants');



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
        Schema::dropIfExists('evaluations');
    }
}
