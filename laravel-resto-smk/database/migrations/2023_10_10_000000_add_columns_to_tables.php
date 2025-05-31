<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToTables extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('level');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->enum('status', ['pending', 'diproses', 'selesai']);
        });

        Schema::table('pelanggans', function (Blueprint $table) {
            $table->boolean('aktif')->default(true);
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('level');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('pelanggans', function (Blueprint $table) {
            $table->dropColumn('aktif');
        });
    }
}
