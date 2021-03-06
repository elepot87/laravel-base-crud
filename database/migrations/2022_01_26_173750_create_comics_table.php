<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('title', 60);
            $table->string('slug');
            $table->text('description');
            $table->string('thumb');
            $table->string('series', 50);
            $table->string('price', 10);
            $table->date('sale_date', 10);
            $table->string('type', 20);
            $table->string('artists', 200);
            $table->string('writers', 200);
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
        Schema::dropIfExists('comics');
    }
}