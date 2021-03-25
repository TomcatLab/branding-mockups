<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presentations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mockup_id');

            $table->string('img_1_1',200)->nullable();
            $table->string('img_h_1_1',200)->nullable();
            
            $table->string('img_2_1',200)->nullable();
            $table->string('img_h_2_1',200)->nullable();
            $table->string('img_2_2',200)->nullable();
            $table->string('img_h_2_2',200)->nullable();

            $table->string('img_3_1',200)->nullable();
            $table->string('img_h_3_1',200)->nullable();

            $table->string('img_4_1',200)->nullable();
            $table->string('img_h_4_1',200)->nullable();
            $table->string('img_4_2',200)->nullable();
            $table->string('img_h_4_2',200)->nullable();

            $table->string('img_5_1',200)->nullable();
            $table->string('img_h_5_1',200)->nullable();

            $table->string('img_6_1',200)->nullable();
            $table->string('img_h_6_1',200)->nullable();
            $table->string('img_6_2',200)->nullable();
            $table->string('img_h_6_2',200)->nullable();

            $table->string('img_7_1',200)->nullable();
            $table->string('img_h_7_1',200)->nullable();

            $table->string('img_8_1',200)->nullable();
            $table->string('img_h_8_1',200)->nullable();
            $table->string('img_8_2',200)->nullable();
            $table->string('img_h_8_2',200)->nullable();

            $table->string('img_9_1',200)->nullable();
            $table->string('img_h_9_1',200)->nullable();
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
        Schema::dropIfExists('presentations');
    }
}
