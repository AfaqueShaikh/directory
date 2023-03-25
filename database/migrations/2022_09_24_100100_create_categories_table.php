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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->integer('parent_id')->default(0);
            $table->boolean('active')->default(1);
            $table->enum('category_type', ['marketplace', 'preferences'])
                ->default('marketplace');
            $table->text('options')->nullable();//json
            $table->boolean('is_featured')->default(0);
            $table->integer('order_id')->nullable();
            $table->timestamps();
        });

        Schema::create('categories_trans', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('category_id')->unsigned()->index()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('lang');
            $table->string('img',255)->nullable();
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
        Schema::dropIfExists('categories_trans');
        Schema::dropIfExists('categories');
    }
};
