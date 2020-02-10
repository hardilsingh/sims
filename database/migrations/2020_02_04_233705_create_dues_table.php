<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("1")->default(0);
            $table->string("2")->default(0);
            $table->string("3")->default(0);
            $table->string("4")->default(0);
            $table->string("5")->default(0);
            $table->string("6")->default(0);
            $table->string("7")->default(0);
            $table->string("8")->default(0);
            $table->string("9")->default(0);
            $table->string("10")->default(0);
            $table->string("11")->default(0);
            $table->string("12")->default(0);
            $table->string("session")->nullable();
            $table->string("student_id")->nullable();
            $table->string("concession")->default(0);
            $table->string("total")->default(0);


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
        Schema::dropIfExists('dues');
    }
}
