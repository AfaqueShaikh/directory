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
        Schema::dropIfExists('products');
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')
                ->unsigned()
                ->index()
                ->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->unsignedBigInteger('category_id')
                ->unsigned()
                ->index()
                ->nullable();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->string('slug')
                ->unique()
                ->nullable();

            $table->decimal('price')->nullable();

            $table->decimal('discount')->nullable();
            $table->decimal('other_discount')->nullable();

            $table->string('sku')->nullable();
            $table->bigInteger('available_qty')->nullable();
            $table->boolean('is_available')
                ->default(true)
                ->comment('0 => Out of Stock, 1 => Available');

            $table->boolean('active')->default(true);

            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });

        Schema::dropIfExists('product_trans');
        Schema::create('product_trans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')
                ->unsigned()
                ->index()
                ->nullable();
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->text('discount_desc')->nullable();
            $table->string('image')->nullable();

            $table->string('lang')->default('en');
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
        Schema::dropIfExists('product_trans');
        Schema::dropIfExists('products');
    }
};
