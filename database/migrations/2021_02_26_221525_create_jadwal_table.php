<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->bigIncrements('jadwal_id');
            $table->unsignedBigInteger('jadwal_paket_id');
            $table->foreign('jadwal_paket_id')->references('paket_id')->on('paket')->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('jadwal_waktu_berangkat');
            $table->unsignedBigInteger('jadwal_harga');
            $table->timestamp('jadwal_created_at')->useCurrent();
            $table->timestamp('jadwal_updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal');
    }
}
