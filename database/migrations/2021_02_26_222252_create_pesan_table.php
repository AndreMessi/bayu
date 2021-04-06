<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePesanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesan', function (Blueprint $table) {
            $table->bigIncrements('pesan_id');
            $table->unsignedBigInteger('pesan_user_id');
            $table->foreign('pesan_user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('pesan_jadwal_id');
            $table->foreign('pesan_jadwal_id')->references('jadwal_id')->on('jadwal')->onUpdate('cascade')->onDelete('cascade');
            $table->text('pesan_lokasi_jemput');
            $table->enum('pesan_status',['menunggu','upload','berhasil'])->default('menunggu');
            $table->timestamp('pesan_created_at')->useCurrent();
            $table->timestamp('pesan_updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesan');
    }
}
