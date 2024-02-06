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
        Schema::create('leave_approvals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('approver_id')->unsigned();
            $table->bigInteger('leave_request_id')->unsigned();
            $table->string('approved_at');
            $table->string('status');
            $table->text('comments');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('approver_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('leave_request_id')->references('id')->on('leave_requests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leave_approvals');
    }
};
