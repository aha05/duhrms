<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('person_id')->unsigned();
            $table->string('emp_id');
            $table->string('job_title');
            $table->string('position');
            $table->string('employment_type');
            $table->date('date_of_hire')->default(now()->format('Y-m-d'));
            $table->string('location');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
};
