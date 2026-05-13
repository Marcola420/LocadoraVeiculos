<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::table('carros', function (Blueprint $table) {
        $table->string('modelo')->nullable()->change();
        $table->integer('ano')->nullable()->change();
        $table->string('placa')->nullable()->change();
    });
}

public function down()
{
    Schema::table('carros', function (Blueprint $table) {
        $table->string('modelo')->nullable(false)->change();
        $table->integer('ano')->nullable(false)->change();
        $table->string('placa')->nullable(false)->change();
    });
}

};
