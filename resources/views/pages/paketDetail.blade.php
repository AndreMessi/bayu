@extends('partials.layout')
@section('title','Detail Paket')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Kode Paket</th>
                        <th>Nama Paket</th>
                        <th>Tujuan</th>
                        <th>Transportasi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$data->paket->paket_kode}}</td>
                        <td>{{$data->paket->paket_nama}}</td>
                        <td>{{$data->paket->paket_tujuan}}</td>
                        <td>{{$data->paket->paket_transportasi}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-header"><h4>Jadwal & harga</h4></div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Waktu Berangkat</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(@$data->jadwal as $i)
                        <tr>
                            <td>{{$i->jadwal_waktu_berangkat}}</td>
                            <td>{{$i->jadwal_harga}}</td>
                            <td>
                                <button class="btn btn-primary" onclick="pesan({{$i->jadwal_paket_id}})">Pesan
                                    Sekarang
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-header"><h4>Gallery</h4></div>
                <div class="row">
                    @if(count(@$data->gallery)>0)
                        <div class="filter-container p-0 row">
                            @foreach($data->gallery as $i)
                                <div class="filtr-item col-sm-2" data-category="{{$i->gallery_paket_id}}">
                                    <a href="{{$i->gallery_img}}" data-toggle="lightbox"
                                       data-title="{{$i->gallery_title}}" data-gallery="gallery">
                                        <img src="{{$i->gallery_img}}" class="img-fluid mb-2"
                                             alt="{{$i->gallery_title}}"/>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="col-12">Data Kosong</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-pesan">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{route('pesan')}}">
                    <div class="modal-header">
                        <h4 class="modal-title">Form Pemesanan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="pesan_jadwal_id" id="pesan_jadwal_id" />
                        <div class="form-group">
                            <label for="pesan_lokasi_jemput">Lokasi Jemput</label>
                            <input class="form-control" id="pesan_lokasi_jemput" placeholder="Input Lokasi Penjemputan"
                                   name="pesan_lokasi_jemput"/>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
