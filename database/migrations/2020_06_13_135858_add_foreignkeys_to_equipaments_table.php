<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignkeysToEquipamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipaments', function (Blueprint $table) {
            $table
            ->foreign('place_id', 'fk_e_place_id')
            ->references('id')
            ->on('places')
            ->onUpdate('RESTRICT')
            ->onDelete('RESTRICT');
            $table
            ->foreign('manufacturer_id', 'fk_e_manufacturer_id')
            ->references('id')
            ->on('manufacturers')
            ->onUpdate('RESTRICT')
            ->onDelete('RESTRICT');
            $table
            ->foreign('category_id', 'fk_e_category_id')
            ->references('id')
            ->on('categories')
            ->onUpdate('RESTRICT')
            ->onDelete('RESTRICT');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipaments', function (Blueprint $table) {
            $table->dropForeign([
                'fk_e_place_id',
                'fk_e_manufacturer_id',
                'fk_e_category_id']);
            //
        });
    }
}
