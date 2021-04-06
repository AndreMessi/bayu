<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function index() {
        $data = DB::table('gallery')->get();
        return view('pages.gallery',compact('data'));
    }
}
