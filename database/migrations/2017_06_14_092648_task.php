<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Task extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tasks', function (Blueprint $table) {
          $table->increments('id');
          $table->string('email',175);
          $table->string('goalid',75);
          $table->string('taskname',255);
          $table->string('taskintent',255);
          $table->string('taskpriority',255);
          $table->date('taskstartdate');
          $table->date('taskenddate');
          $table->string('taskauthorization',30)->nullable();
          $table->string('taskpermission',30)->nullable();
          $table->smallinteger('taskcompletedpercentage')->default(0);
          $table->smallinteger('taskweight')->default(0);
          $table->smallinteger('pinned')->default(0);
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
        Schema::dropIfExists('task');
    }
}
