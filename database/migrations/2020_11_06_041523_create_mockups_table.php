<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMockupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mockups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('keywords')->nullable();
            $table->text('description')->nullable();
            $table->integer('price');
            $table->foreignId('author');
            $table->foreignId('category_id');
            $table->foreignId('type_id');
            $table->string('slug');
            $table->text('info')->nullable();
            $table->foreignId('file_extension');
            $table->string('size')->nullable();
            $table->foreignId('dimensions')->nullable();
            $table->foreignId('license')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mockups');
    }
}
