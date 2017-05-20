<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchives extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('nationality');
            $table->date('birth_date');
            $table->string('relagion');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('military');
            $table->integer('years_experience');
            $table->string('university');
            $table->string('faculty');
            $table->string('department');
            $table->integer('gpa');
            $table->integer('graduation_year');
            $table->string('cv');
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
            $table->boolean('response')->nullable();
            $table->text('refuse')->nullable();
            $table->integer('job_id')->unsigned();
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->date('date');
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
        Schema::dropIfExists('archives');
    }
}
