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
        Schema::create('job_post', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->String('title');
            $table->string('department');
            $table->string('type')->default('Full Time');
            $table->text('description')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->date('post_date')->default(now()->format('Y-m-d'));;
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
        Schema::dropIfExists('job_post');
    }
};
