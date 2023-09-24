<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // المخزن
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('المخزن الرئيسي');
            $table->foreignId('category_id')->constrained("categories")->cascadeOnDelete();
            $table->integer("amount");
            $table->decimal("old_price", 9, 2)->default(0);
            $table->decimal("new_price", 9, 2)->default(0);
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
        Schema::dropIfExists('stores');
    }
}
