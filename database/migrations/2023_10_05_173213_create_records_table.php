<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->date('date');
            $table->integer('amount');
            $table->string('memo')->nullable(true);
            $table->timestamps();
            // 外部キー制約
            // $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
};