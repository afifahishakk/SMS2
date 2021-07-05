<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuardiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('name');
            $table->string('gender_id');
            $table->string('phone_no');
            $table->string('email');
            $table->string('photo');
            $table->string('address');
            $table->string('occupation');
            $table->string('salary');
            $table->integer('relationship_id');
            $table->string('ic_attachment');
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
        Schema::dropIfExists('guardians');
    }
}
