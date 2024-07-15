<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorluckywheelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colorluckywheels', function (Blueprint $table) {
            $table->id();
            $table->string('color_background');
            $table->string('color_title');
            $table->string('color_tab1');
            $table->string('color_tab2');
            $table->string('color_pointer');
            $table->string('color_center');
            $table->string('color_border');
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
        Schema::dropIfExists('colorluckywheels');
    }
}
