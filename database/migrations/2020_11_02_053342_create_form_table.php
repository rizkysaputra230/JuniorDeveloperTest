<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('form', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 25);
            $table->string('last_name', 25);
            $table->string('username', 25)->unique();
            $table->string('gender');
            $table->date('birth_date');
            $table->tinyInteger('is_agreed');
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
        Schema::dropIfExists('form');
    }
}
