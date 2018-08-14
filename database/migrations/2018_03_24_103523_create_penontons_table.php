<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenontonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penontons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_bioskop');
            $table->string('user');
            $table->string('kategori');
            $table->string('film');
            $table->string('tgl_tayang');
            $table->integer('jml_penonton');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('penontons');
    }
}
