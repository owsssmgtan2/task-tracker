<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOutcomes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outcomes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id');
            $table->integer('subtask_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('type');
            $table->integer('is_active')->default(1);
            $table->integer('added_by')->default(1);
            $table->integer('last_update')->default(1);
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
