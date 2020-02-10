<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tcs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("student_id");
            $table->integer("user_id");
            $table->string("session");
            $table->string("nationality");
            $table->string("failed");
            $table->text("subjects");
            $table->string("tpd");
            $table->string("twd");
            $table->string("scout");
            $table->string("dues");
            $table->string("games");
            $table->string("conduct");
            $table->date("doa");
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
        Schema::dropIfExists('tcs');
    }
}
