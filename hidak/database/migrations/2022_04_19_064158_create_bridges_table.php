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
        Schema::create('bridges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bridgeName', 100)->require()->unique();
            $table->string('description', 3000)->require();
            $table->boolean('isPublicRoad')->default(1);
            $table->double('flowKm')->require()->unique()->min(0)->max(2850);
            $table->string('routes', 500);
            $table->integer('location')->unsigned();
            $table->date('deliveryDate')->default(date('Y-m-d'));
            $table->string('pictureUrl', 300);
            $table->foreign('location')
                ->references('id')
                ->on('locations')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bridges');
    }
};
