<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeathersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up ()
    {
        Schema::create('weathers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('zip_codes_id')->unsigned();
            $table->foreign('zip_codes_id')
                ->references('id')->on('zip_codes');
            $table->string('temperature_string');
            $table->string('weather');
            $table->string('relative_humidity');
            $table->string('feelslike_string');
            $table->string('pressure_in');
            $table->string('visibility_mi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down ()
    {
        Schema::dropIfExists('weathers');
    }
}
