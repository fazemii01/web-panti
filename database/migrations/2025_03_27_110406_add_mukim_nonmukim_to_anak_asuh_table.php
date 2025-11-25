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
        Schema::table('anak_asuh', function (Blueprint $table) {
            $table->enum('mukim_nonmukim', ['mukim', 'non-mukim'])->after('jenis_kelamin')->default('mukim');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anak_asuh', function (Blueprint $table) {
            $table->dropColumn('mukim_nonmukim');
        });
    }
};
