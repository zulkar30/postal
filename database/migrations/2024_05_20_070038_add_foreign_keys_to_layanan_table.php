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
        Schema::table('layanan', function (Blueprint $table) {
            $table->foreignId('lansia_id', 'fk_layanan_to_lansia')
            ->references('id')->on('lansia')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('petugas_id', 'fk_layanan_to_petugas')
            ->references('id')->on('petugas')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('layanan', function (Blueprint $table) {
            $table->dropForeign('fk_layanan_to_lansia');
            $table->dropForeign('fk_layanan_to_petugas');
        });
    }
};
