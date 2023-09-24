<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // المشتريات
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_storage')->default(0);
            $table->foreignId('category_id')->constrained("categories")->cascadeOnDelete();
            $table->foreignId('bill_id')->constrained("purchase_bills")->cascadeOnDelete();
            $table->integer("amount");
            $table->decimal("price", 9, 2);
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
        Schema::dropIfExists('purchases');
    }
}
