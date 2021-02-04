<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTrackers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trackers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tracker_type');
            $table->integer('task_id')->default(0);
            $table->integer('subtask_id')->default(0);
            $table->integer('outcome_id')->default(0);
            $table->integer('saletype_id')->default(0);
            $table->integer('image_id')->default(0);
            $table->integer('difficulty_id')->default(0);
            $table->string('trans_stamp')->nullable();
            $table->string('order_id')->nullable();
            $table->string('ticket_id')->nullable();
            $table->string('sku')->nullable();
            $table->string('notes')->nullable();            
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
