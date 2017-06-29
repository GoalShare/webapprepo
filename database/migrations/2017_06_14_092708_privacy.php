<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Privacy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('privacys', function (Blueprint $table) {
          $table->string('email',175);
          $table->string('goalid',75);
          $table->string('goalnameprivacy',10);
          $table->string('goalintentprivacy',10);
          $table->string('goalcategoryprivacy',10);
          $table->string('goalpriorityprivacy',10);
          $table->string('goalstartdateprivacy',10);
          $table->string('goalenddateprivacy',10);
          $table->string('goalcompletedpercentageprivacy',10);
          $table->timestamps();
          $table->primary(['goalid','email']);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privacy');
    }
}
