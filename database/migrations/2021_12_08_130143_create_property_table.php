<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('uploaded_by');
            $table->string('owner_id')->nullable();
            $table->string('name');
            $table->text('description');
            $table->string('location');
            $table->string('type'); // Land, House
            $table->string('status'); // For Rent/Sale
            $table->string('terms'); //Monthly/Daily/Yearly
            $table->string('price');
            $table->string('total_units');
            $table->string('available_units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property');
    }
}
