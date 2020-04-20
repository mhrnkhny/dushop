<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('seller');
            $table->string('image')->nullable();
            $table->enum('existence', [0, 1])->default(0);
            $table->integer('number');
            $table->string('product_key')->unique();
            $table->integer('price');
            $table->longText('description');
            $table->enum('sex', ['all', 'men', 'women', 'childish']);
            $table->enum('category_name', ['shoes', 'manto', 'coats', 'pants', 'bags', 'shirts', 'Tshirts', 'underwear', 'hats', 'socks', 'glasses']);
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
        Schema::dropIfExists('products');
    }
}
