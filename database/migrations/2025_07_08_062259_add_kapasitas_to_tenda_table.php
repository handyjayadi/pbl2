<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKapasitasToTendaTable extends Migration
{
    public function up()
    {
        Schema::table('tenda', function (Blueprint $table) {
            $table->integer('kapasitas')->after('stok')->nullable(); // Atur posisi dan nullable jika perlu
        });
    }

    public function down()
    {
        Schema::table('tenda', function (Blueprint $table) {
            $table->dropColumn('kapasitas');
        });
    }
}
