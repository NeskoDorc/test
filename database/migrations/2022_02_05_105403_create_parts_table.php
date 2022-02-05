<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\Supplier::class)->nullable();
            $table->string('part_desc');
            $table->string('category');
            $table->string('part_number');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('priority');
            $table->integer('days_valid');

            $table->string('condition');







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
        Schema::dropIfExists('parts');
    }
}
