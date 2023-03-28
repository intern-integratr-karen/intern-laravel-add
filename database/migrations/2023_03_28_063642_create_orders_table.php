<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('person_id');
            $table->integer('quantity');
            $table->decimal('amount',8,2);
            $table->decimal('amount_paid',8,2);
            $table->timestamps();
            $table->softDeletes();
        
            $table->foreign('product_id')
                  ->on('products')
                  ->references('id')
                  ->onDeletes('cascade')
                  ->onUpdate('cascade');

            $table->foreign('person_id')
                  ->on('persons')
                  ->references('id')                
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
