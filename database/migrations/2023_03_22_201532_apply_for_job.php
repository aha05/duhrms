<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_for_job', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('age');
            $table->string('sex');
            $table->string('email');
            $table->string('phone');
            $table->string('level');
            $table->float('GPA');
            $table->string('attachment');
            $table->string('numberofdoc');
            $table->date('date_of_registration')->default(now()->format('Y-m-d'));
            $table->string('remark');
            $table->string('hr_status')->default('pending')->nullable();
            $table->string('dep_status')->default('pending')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('apply_for_job');
    }
};
