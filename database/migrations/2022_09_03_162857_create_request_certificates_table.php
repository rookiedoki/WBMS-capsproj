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
        Schema::create('request_certificates', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('doctype');
            $table->string('date');
            $table->string('paymentMethod');
            $table->string('referenceNumber');
            $table->string('purpose');
            $table->string('screenshot');
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
        Schema::dropIfExists('request_certificates');
    }
};
