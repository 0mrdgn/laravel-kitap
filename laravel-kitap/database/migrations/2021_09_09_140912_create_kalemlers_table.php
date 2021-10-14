<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKalemlersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kalemlers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('selflink');
            $table->foreignId('markaid');
            $table->double('fiyat');
            $table->string('image');
            $table->text("aciklama")->nullable();
            $table->timestamps();

            $table->foreign('markaid')->references('id')->on('markalars')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kalemlers');
    }
}
