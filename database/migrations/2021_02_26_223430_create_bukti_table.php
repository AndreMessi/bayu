<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBuktiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukti', function (Blueprint $table) {
            $table->bigIncrements('bukti_id');
            $table->unsignedBigInteger('bukti_pesan_id');
            $table->longText('bukti_img');
            $table->timestamp('bukti_created_at')->useCurrent();
            $table->timestamp('bukti_updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukti');
    }
}
