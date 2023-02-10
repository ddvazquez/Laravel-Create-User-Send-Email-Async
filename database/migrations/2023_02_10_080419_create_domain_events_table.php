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
        Schema::create('domain_events', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('aggregate_id');
            $table->string('name');
            $table->json('body');
            $table->timestamp('occurred_on');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domain_events');
    }
};

