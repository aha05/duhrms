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
        Schema::create('leave_exit_forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('leave_request_id')->unsigned();
            $table->boolean('is_filled')->default(false);
            $table->string('will_travel_to');
            $table->string('contact_address');
            $table->string('contact_city_town');
            $table->string('contact_tel');
            $table->string('contact_email');
            $table->softDeletes();
            $table->timestamps();

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
        Schema::dropIfExists('leave_exit_forms');
    }
};
