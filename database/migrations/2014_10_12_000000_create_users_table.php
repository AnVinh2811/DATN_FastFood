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
        Schema::create('users', function (Blueprint $table) {
            $table->id('customer_id');
            $table->string('customer_name');
            $table->string('customer_email')->unique();
            $table->string('customer_password');
            $table->int('customer_phone');
            $table->string('code_active');
            $table->string('customer_vip');
            $table->string('code');
            $table->dateTime('code_time');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
