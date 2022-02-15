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
        Schema::create('tbl_customer_service', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id');
            $table->bigInteger('service_id');
            $table->integer('price');
            $table->string('created_user')->default('admin');
            $table->string('updated_user')->default('admin');
            $table->timestamps();

            // Unique
            $table->unique(['customer_id', 'service_id'], 'uni_customer_id_service_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_customer_service');
    }
};
