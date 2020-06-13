<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('place_id');
            $table->unsignedInteger('manufacture_id');
            $table->unsignedInteger('category_id');
            $table->string('model');
            $table->mediumText('description')-> nullable;
            $table->enum('state',['maintenace','active','inactive','maintenance_pending'])->default('active');
            $table->string('serial_number');
            $table->decimal('aquisition_value');
            $table->string('patrimony');
            $table->string('available_quantity');
            $table->string('files');
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
        Schema::dropIfExists('equipments');
    }
}
