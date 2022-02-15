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
        Schema::create('mst_product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('unit');
            $table->integer('price');
            $table->text('description')->nullable();
            $table->string('created_user')->default('admin');
            $table->string('updated_user')->default('admin');
            $table->timestamps();

            // Unique
            $table->unique('name', 'uni_name');

            // Index
            $table->index('price', 'idx_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_product');
    }
};
