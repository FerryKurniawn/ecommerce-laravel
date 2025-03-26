<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('products', function (Blueprint $table) {
        // Mengubah kolom 'image' menjadi varchar(1024) dan nullable
        $table->string('image', 1024)->nullable()->change();
    });
}

public function down()
{
    Schema::table('products', function (Blueprint $table) {
        // Mengembalikan kolom 'image' ke varchar(255) dan nullable
        $table->string('image', 255)->nullable()->change();
    });
}


};
