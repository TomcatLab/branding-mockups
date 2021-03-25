<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMockupImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mockup_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mockup_id');
            $table->string('filename',200);
            $table->string('url',200);
            $table->string('full_url',200);
            $table->boolean('preview')->nullable();
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
        Schema::dropIfExists('mockup_images');
    }
}
