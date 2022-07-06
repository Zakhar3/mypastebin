<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pastes', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('title')->nullable(false);
            $table->text('code')->nullable(false);
            $table->string('author', 255)->nullable(true);
            $table->string('typed')->nullable(false);
            $table->integer('timer')->nullable(true);
            $table->string('syntax')->nullable(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pastes');
    }
}
