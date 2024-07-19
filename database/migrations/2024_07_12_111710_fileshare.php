<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Fileshare extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fileshares',function (Blueprint $table){
            $table->id();
            $table->integer('file_id');
            $table->integer('gnotes_id');
            $table->integer('department_id');
            $table->integer('section_id');
            $table->integer('user_id');
            $table->string('notifyby');
            $table->string('remarks');
            $table->string('duedate');
            $table->string('actiontype');
            $table->string('priority');
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
        Schema::dropIfExists('fileshares');
    }
}
