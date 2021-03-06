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
        Schema::create('ingatlanok', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kategoria')->require()->unsigned();
            $table->string('szoveg');
            $table->date('hirdetesDatuma')->default(date("Y-m-d"));
            $table->boolean('tehermentes')->require();
            $table->integer('ar')->reuire();
            $table->string('kepUrl');
            $table->foreign('kategoria')
            ->references('id')
            ->on('kategoriak')
            ->onDelete('cascade')
            ->onUpdate('restrict');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingatlanok');
    }
};
