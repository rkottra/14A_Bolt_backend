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
        Schema::create('termekek', function (Blueprint $table) {
            $table->id();
            $table->string("nev", 100);
            $table->text("leiras");
            $table->integer("ar");
            $table->double("kedvezmeny");
            $table->string("kepUrl");
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
        Schema::dropIfExists('termekek');
    }
};
