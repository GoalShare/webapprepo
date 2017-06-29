<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Goal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('goals', function (Blueprint $table) {
          $table->string('goalid',75);
          $table->string('email',175);
          $table->string('goalname',255);
          $table->string('goalintent',255);
          $table->string('goalcategory',255);
          $table->string('goalpriority',255);
          $table->date('goalstartdate');
          $table->date('goalenddate');
          $table->string('goalauthorization',30)->nullable();
          $table->string('goalpermission',30)->nullable();
          $table->float('goalcompletedpercentage')->default(0);
          $table->smallinteger('pinned')->default(0);
          $table->smallinteger('gottasks')->default(0);
          $table->string('goalpictureone',255);
          $table->string('goalpicturetwo',255);
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
        Schema::dropIfExists('goal');
    }
}
