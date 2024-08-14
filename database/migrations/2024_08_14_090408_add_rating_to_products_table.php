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
        $table->decimal('rating', 3, 1)->default(); // Rating dari 0.0 hingga 5.0
            $table->id();
            $table->string('produk');
            $table->string('slug');
            $table->integer('harga');
            $table->string('kategori');
            $table->string('foto');
            $table->string('deskripsi');
            $table->string('rating');
            $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('rating');
        });
    }
};
