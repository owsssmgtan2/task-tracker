<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTasks extends Migration
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
        $table->string('name');
        $table->string('type');
        $table->integer('is_active')->default(1);
        $table->integer('added_by')->default(1);
        $table->timestamps();
        $table->softDeletes();

        });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
