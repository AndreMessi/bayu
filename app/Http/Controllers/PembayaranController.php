<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index(){
        $data = DB::table('pesan')
            ->leftJoin('users','id','=','pesan_user_id')
            ->leftJoin('jadwal','jadwal_id','=','pesan_jadwal_id')
            ->leftJoin('paket','paket_id','=','jadwal_paket_id')
            ->leftJoin('bukti','pesan_id','=','bukti_pesan_id');
        if (auth()->user()->role==='admin'){
            $data = $data->get();
        }else{
            $data = $data->where('id','=',Auth::id())->get();
        }
        return view('pages.pembayaran',compact('data'));
    }

    public function pesan(Request $request){
        $data = DB::table('pesan')->updateOrInsert([
            'pesan_user_id' => Auth::id(),
            'pesan_jadwal_id' => $request->pesan_jadwal_id,
        ],[
            'pesan_user_id' => Auth::id(),
            'pesan_jadwal_id' => $request->pesan_jadwal_id,
            'pesan_lokasi_jemput' => $request->pesan_lokasi_jemput,
        ]);
        if ($data){
            return redirect('pembayaran')->with('success','Data Telah Terkirim Silahkan Menunggun Konfirmasi Dari Admin');
        }
        return back()->withErrors(['Gagal Memesan Tiket']);
    }

    public function updateStatus(Request $request){
        $data = DB::table('pesan')
            ->where('pesan_id','=',$request->pesan_id)->update(
            [
                'pesan_status' => $request->pesan_status
            ]
        );
        if ($data){
            return back()->with('success','Berhasil Mengubah Status');
        }
        return back()->withErrors(['Gagal Mengubah Status']);
    }

    public function uploadBukti(Request $request){
        $data = DB::table('bukti')->updateOrInsert([
            'bukti_pesan_id' => $request->bukti_pesan_id,
            'bukti_img' => $request->bukti_img,
        ],
        [
            'bukti_pesan_id' => $request->bukti_pesan_id,
            'bukti_img' => $request->bukti_img,
        ]
        );
        if ($data){
            return back()->with('success','Berhasil Mengupload Bukti');
        }
        return back()->withErrors(['Gagal Mengupload Bukti']);
    }

    public function cetak_pdf(){
        $cetak = Pembayaran::all();
        $pdf = PDF::loadview('pembayaran.pembayaran_pdf', ['pembayaran' => $cetak]);
        return $pdf->download('laporan-pembayaran-pdf.pdf');
    }

}
