<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlMonitoraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('url_monitora', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('url_id');
        $table->foreign('url_id')->references('id')->on('urls')->onDelete('cascade');
        $table->smallInteger('status_code');
        $table->longText('response');        
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
      Schema::dropIfExists('url_monitora');
    }
}
