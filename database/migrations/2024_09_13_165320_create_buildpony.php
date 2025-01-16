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
        Schema::create('buildponys', function (Blueprint $table) {
            $table->id();
            $table->date('created_at');
            $table->timestamp('updated_at')->nullable();
            $table->tinyText('typeName');
            $table->tinyText('affinity');
            $table->tinyInteger('charm');
            $table->tinyInteger('intel');
            $table->tinyInteger('str');
            $table->tinyInteger('hp');
            $table->tinyText('white')->nullable();
            $table->tinyText('ink')->nullable();
            $table->tinyText('eyeCol')->nullable();
            $table->tinyText('haircol2')->nullable();
            $table->tinyText('shade')->nullable();
            $table->tinyText('accentCol')->nullable();
            $table->tinyText('accentCol2')->nullable();
            $table->tinyText('baseCol')->nullable();
            $table->tinyText('hairCol')->nullable();
            $table->tinyText('sex');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buildpony');
    }
};
