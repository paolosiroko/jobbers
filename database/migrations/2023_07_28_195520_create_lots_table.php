<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lots', function (Blueprint $table) {
            $table->id();
            $table->integer('Sr_no');
            $table->string('slug')->unique();
            $table->integer('Roll_no')->nullable();
            $table->string('Fabric_type')->nullable();
            $table->string('Panna60')->nullable();
            $table->string('Meter')->nullable();
            $table->string('size')->default('')->nullable();
            $table->integer('total')->nullable();
            $table->enum('status', ['pending', 'started'])->default('pending');
            $table->enum('is_complete', ['pending', 'complete'])->default('pending');
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
        Schema::dropIfExists('lots');
    }
}
