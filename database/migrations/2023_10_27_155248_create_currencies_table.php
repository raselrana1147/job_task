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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('valuteID')->comment('currency identifier returned by the method');
            $table->string('numCode')->comment('numeric currency code');
            $table->string('charCode')->comment('currency code in letters');
            $table->string('name')->comment('currency name');
            $table->float('value',8,2)->comment('exchange rate value');
            $table->date('date')->comment('publication date of the exchange rate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
