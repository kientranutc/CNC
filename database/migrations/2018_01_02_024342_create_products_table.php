<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('image')->default('');
            $table->integer('category_id')->default(0);
            $table->string('slug')->default('');
            $table->float('price',15,0)->default(0);
            $table->tinyInteger('sale')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->text('description');
            $table->text('product_detail');
            $table->integer('viewed')->default(0);
            $table->string('tag')->default(0);
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
