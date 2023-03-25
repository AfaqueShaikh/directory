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
        Schema::create('website_trackers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')
                ->nullable();
            $table->string('website_url')->nullable();
            $table->string('page_url')->nullable();
            $table->double('time')->nullable();
            $table->timestamp('last_visited_at')->nullable();
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
        Schema::dropIfExists('website_trackers');
    }
};
