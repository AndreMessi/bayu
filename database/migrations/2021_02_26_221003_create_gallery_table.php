<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery', function (Blueprint $table) {
            $table->bigIncrements('gallery_id');
            $table->unsignedBigInteger('gallery_paket_id');
            $table->foreign('gallery_paket_id')->references('paket_id')->on('paket')->onUpdate('cascade')->onDelete('cascade');
            $table->string('gallery_title');
            $table->longText('gallery_img');
            $table->text('gallery_desc');
            $table->timestamp('gallery_created_at')->useCurrent();
            $table->timestamp('gallery_updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery');
    }
}
