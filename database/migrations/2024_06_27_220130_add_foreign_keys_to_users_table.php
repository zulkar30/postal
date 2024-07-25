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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('lansia_id')->nullable();
            $table->foreign('lansia_id', 'fk_users_to_lansia')
            ->references('id')->on('lansia')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->unsignedBigInteger('petugas_id')->nullable();
            $table->foreign('petugas_id', 'fk_users_to_petugas')
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('fk_users_to_petugas');
            $table->dropForeign('fk_users_to_lansia');
        });
    }
};
