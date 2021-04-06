<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\StandardTagFactory;
use stdClass;

class PaketController extends Controller
{
    public function index(){
        $data = DB::table('paket')->get();
        return view('pages.paket',compact('data'));
    }

    public function form(Request $request){
        $paket = [];
        $jadwal = [];
        $gallery = [];
        if ($request->filled('id')){
            $paket = DB::table('paket')->where('paket_id','=',$request->id)->first();
            $jadwal = DB::table('jadwal')->where('jadwal_paket_id','=',$request->id)->get();
            $gallery = DB::table('gallery')->where('gallery_paket_id','=',$request->id)->get();
        }
        return view('pages.paketForm',compact('paket','jadwal','gallery'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = DB::table('paket')->updateOrInsert(
            ['paket_id'=>$request->id],
            $request->except(['_token','id'])
        );
        if ($data) {
            return redirect('paket/form?id='.DB::getPdo()->lastInsertId())->with('success','Data Berhasil Tersimpan');
        }
        return back()->withErrors(['Data Gagal Tersimpan']);
    }

    public function storeJadwal(Request $request)
    {
        $data = DB::table('jadwal')->updateOrInsert(
            ['jadwal_id'=>$request->id],
            $request->except(['_token','id'])
        );
        if ($data) {
            return back()->with('success','Data Berhasil Tersimpan');
        }
        return back()->withErrors(['Data Gagal Tersimpan']);
    }

    public function storeGallery(Request $request): RedirectResponse
    {
        $data = DB::table('gallery')->updateOrInsert(
            ['gallery_id'=>$request->id],
            $request->except(['_token','id'])
        );
        if ($data) {
            return back()->with('success','Data Berhasil Tersimpan');
        }
        return back()->withErrors(['Data Gagal Tersimpan']);
    }

    public function delete($id): RedirectResponse
    {
        $data = DB::table('paket')->where('paket_id','=',$id)->delete();
        if ($data) {
            return back()->with('success','Data Berhasil Dihapus');
        }
        return back()->withErrors(['Data Gagal Dihapus']);
    }

    public function detail($id){
        $data = new stdClass();
        $data->paket = DB::table('paket')->where('paket_id','=',$id)->first();
        $data->jadwal = DB::table('jadwal')->where('jadwal_paket_id','=',$id)->get();
        $data->gallery = DB::table('gallery')->where('gallery_paket_id','=',$id)->get();
        return view('pages.paketDetail',compact('data'));
    }

    public function search(Request $request)
    {
        $data = DB::table('paket')->where('paket_nama','like','%%'.$request->q.'%%')
        ->orWhere('paket_tujuan', 'like', '%%'.$request->q.'%%')->get();
        return view('pages.search',compact('data'));
    }

}
