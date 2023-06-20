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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('description');
            $table->string('Publicite')->default('0');
            $table->string('Glissier')->default('0');
            $table->string('Promotion')->default('0');
            $table->date('datePromo')->nullable();
            $table->string('marque');
            $table->float('price');
            $table->float('price_of');
            $table->string('brefDesc');
            $table->string('image');
            $table->string('categories_parent');
            $table->string('status')->default(1);
            $table->integer('Quantite');
            $table->string('tendence')->default('noactive');
            $table->foreignId('idC')->constrained('categories', 'id')->cascadeOnDelete();
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
        Schema::dropIfExists('produits');
    }
};
