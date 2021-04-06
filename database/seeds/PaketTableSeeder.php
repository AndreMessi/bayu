<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class PaketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $jadwal = [];
        $gallery = [];
        $f= Faker\Factory::create();
        for ($i=1;$i<20;$i++){
            $data[] = [
                'paket_kode'=>'000'.$i,
                'paket_nama'=>'Paket '.$i,
                'paket_tujuan'=>'Tujuan '.$i,
                'paket_transportasi'=>Arr::random(['mobil','bus']),
            ];
            for ($j=0;$j<2;$j++){
                $jadwal[] = [
                    'jadwal_paket_id'=>$i,
                    'jadwal_waktu_berangkat'=>Arr::random([date('Y-m-d 07:00'),date('Y-m-d 10:00')]),
                    'jadwal_harga'=>Arr::random([100000,200000,300000,400000]),
                ];
            }
            for ($j=0;$j<3;$j++){
                $gallery[] = [
                    'gallery_paket_id'=>$i,
                    'gallery_title'=>$f->text(10),
                    'gallery_img'=>$f->imageUrl(),
                    'gallery_desc'=>$f->text(),
                ];
            }
        }
        DB::table('paket')->insert($data);
        DB::table('jadwal')->insert($jadwal);
        DB::table('gallery')->insert($gallery);
    }
}
