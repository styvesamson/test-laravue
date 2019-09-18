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
            $table->bigIncrements('id');
            $table->string('sku');
            $table->string('name', 64)->unique();
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('cover')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->decimal('sale_price')->nullable();
            $table->integer('status')->default(0);
            $table->decimal('length')->nullable();
            $table->decimal('width')->nullable();
            $table->decimal('height')->nullable();
            $table->string('distance_unit')->nullable();
            $table->decimal('weight')->default(0)->nullable();
            $table->string('mass_unit')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
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
