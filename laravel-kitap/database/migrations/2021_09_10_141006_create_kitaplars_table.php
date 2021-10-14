<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKitaplarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kitaplars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('selflink');
            $table->foreignId('yazarid');
            $table->foreignId('yayineviid');
            $table->double('fiyat');
            $table->string('image');
            $table->text("aciklama")->nullable();
            $table->foreignId('kategoriid');
            $table->timestamps();

            $table->foreign('yazarid')->references('id')->on('yazarlars')->onDelete('cascade');
            $table->foreign('yayineviid')->references('id')->on('yayin_evis')->onDelete('cascade');
            $table->foreign('kategoriid')->references('id')->on('kategorilers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kitaplars');
    }
}
