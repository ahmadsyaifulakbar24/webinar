<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id')->constrained('params')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('sub_unit_id')->constrained('params')->onDelete('cascade')->onUpdate('cascade');
            $table->string('poster_path');
            $table->string('topic');
            $table->date('date');
            $table->time('time');
            $table->text('description');
            $table->string('code')->unique();
            $table->enum('status', ['publish', 'finish', 'unpublish']);
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
        Schema::dropIfExists('trainings');
    }
}
