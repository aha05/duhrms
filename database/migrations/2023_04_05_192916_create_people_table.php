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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->text('photo')->nullable();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('gender');
            $table->date('DOB')->default(now()->format('Y-m-d'));
            $table->string('phone')->unique();
            $table->string('religion');
            $table->string('marital_status');
            $table->integer('NO_of_children');
            $table->string('nationality');
            $table->string('region');
            $table->string('zone');
            $table->string('woreda');
            $table->string('kebele');
            $table->date('date_of_registration')->default(now()->format('Y-m-d'));
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
        Schema::dropIfExists('people');
    }
};
