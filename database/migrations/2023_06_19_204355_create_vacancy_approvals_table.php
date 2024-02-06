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
        Schema::create('vacancy_approvals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vacancy_request_id');
            $table->unsignedBigInteger('approver_id');
            $table->string('approved_at');
            $table->string('status')->default('pending');
            $table->text('comments');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('vacancy_request_id')->references('id')->on('vacancy_requests')->onDelete('cascade');
            $table->foreign('approver_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacancy_approvals');
    }
};
