<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('gender_id');
            $table->string('photo');
            $table->integer('nationality_id');
            $table->string('type');
            $table->string('address');
            $table->string('marriage_status');
            $table->string('salary');
            $table->string('ic_no');
            $table->string('ic_attachment');
            $table->string('spouse_name');
            $table->string('spouse_occupation');
            $table->string('spouse_phone');
            $table->string('spouse_workplace');
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
        Schema::dropIfExists('teachers');
    }
}
