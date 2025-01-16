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
        Schema::create('items', function (Blueprint $table) {
            $table->id('itemid');
            $table->timestamps(precision: 0);
            $table->integer('ponyid')->nullable();
            $table->text('itemtype');
            $table->text('image')->charset('binary');
            $table->decimal('buff', total: 5, places: 2)->nullable();
            $table->decimal('debuff', total: 5, places: 2)->nullable();
            $table->set('rarity', ['common', 'uncommon', 'rare', 'crystal', 'seasonal', 'legendary', 'mythic']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
