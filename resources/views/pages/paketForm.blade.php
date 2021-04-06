@extends('partials.layout')
@section('title','Form Data Paket')
@section('css_after')
    <style>
        .r-img {
            height: 250px;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
@endsection()
@section('content')
    @auth
        @if(auth()->user()->role==='admin')
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-body bg-white">
                        <form class="form-horizontal" method="POST" action="{{route('pages.paket.store')}}">
                            @csrf
                            <input type="hidden" class="form-control" name="id" value="{{@$paket->paket_id}}">
                            <div class="">
                                <div class="form-group row">
                                    <label for="paket_kode" class="col-sm-2 col-form-label">Kode Paket</label>
                                    <div class="col-sm-10">
                                        <input id="paket_kode" type="text" class="form-control" name="paket_kode" value="{{@$paket->paket_kode}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="paket_nama" class="col-sm-2 col-form-label">Nama Paket</label>
                                    <div class="col-sm-10">
                                        <input id="paket_nama" type="text" class="form-control" name="paket_nama" value="{{@$paket->paket_nama}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="paket_tujuan" class="col-sm-2 col-form-label">Tujuan</label>
                                    <div class="col-sm-10">
                                        <input id="paket_tujuan" type="text" class="form-control" name="paket_tujuan" value="{{@$paket->paket_tujuan}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="paket_transportasi" class="col-sm-2 col-form-label">Transportasi</label>
                                    <div class="col-sm-10">
                                        <input id="paket_transportasi" type="text" class="form-control" name="paket_transportasi" value="{{@$paket->paket_transportasi}}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">Jadwal</div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{route('pages.paket.storeJadwal')}}">
                            @csrf
                            <input id="jadwal_id" type="hidden" class="form-control" name="id">
                            <input type="hidden" class="form-control" name="jadwal_paket_id" value="{{@$paket->paket_id}}">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="jadwal_waktu_berangkat" class="">Waktu Berangkat</label>
                                    <div class="">
                                        <input id="jadwal_waktu_berangkat" type="datetime-local" class="form-control" name="jadwal_waktu_berangkat">
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="jadwal_harga" class="">Harga</label>
                                    <div class="">
                                        <input id="jadwal_harga" type="text" class="form-control" name="jadwal_harga" placeholder="Harga Paket">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="button" class="btn btn-info" onclick="jadwalBatal()">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                        <div class="mt-4">
                            <table id="dTable" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Waktu Berangkat</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($jadwal)>0)
                                    @foreach($jadwal as $k=>$i)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$i->jadwal_waktu_berangkat}}</td>
                                            <td>{{$i->jadwal_harga}}</td>
                                            <td>
                                                <button class="btn btn-info" onclick="jadwalEdit({{json_encode($i)}})">Edit</button>
                                                <a class="btn btn-danger" href="/delete/jadwal/{{$i->jadwal_id}}">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr><td colspan="5" class="text-center">Data Kosong</td></tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">Gallery</div>
                        <div class="card-body bg-white">
                            <form method="POST" action="{{route('pages.paket.storeGallery')}}">
                                @csrf
                                <input id="gallery_id" type="hidden" class="form-control" name="id">
                                <input type="hidden" class="form-control" name="gallery_paket_id" value="{{@$paket->paket_id}}">
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="gallery_title" class="">Judul</label>
                                        <div class="">
                                            <input id="gallery_title" type="text" class="form-control" name="gallery_title" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="gallery_desc" class="">Deskripsi</label>
                                        <div class="">
                                            <input id="gallery_desc" type="text" class="form-control" name="gallery_desc" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="gallery_img" class="">Gambar</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input id="gallery_img_input" type="file" class="custom-file-input" accept="image/*" onchange="loadFile(event)">
                                                <input id="gallery_img" type="hidden" class="custom-file-input" name="gallery_img">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="button" class="btn btn-info" onclick="galleryBatal()">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                            <div class="row mt-5">
                                <div class="col-12 mb-3"><h3>Daftar Gambar</h3></div>
                                @if(count($gallery)>0)
                                    @foreach($gallery as $k=>$i)
                                        <div class="col-3 mb-3">
                                            <div style="background-image: url('{{$i->gallery_img}}')" class="r-img"></div>
                                            <div class="btn-group d-flex justify-content-between">
                                                <button class="btn btn-info" onclick="galleryEdit({{json_encode($i)}})">Edit</button>
                                                <a class="btn btn-danger" href="/delete/gallery/{{$i->gallery_id}}">Hapus</a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                </div>
            </div>
        @endif
    @endauth
@endsection
@section('js_after')
    <script>
        const jadwalEdit = p => {
            $(`#jadwal_id`).val(p.jadwal_id);
            $(`#jadwal_waktu_berangkat`).val(p.jadwal_waktu_berangkat.replace(/\s+/g, 'T'));
            $(`#jadwal_harga`).val(p.jadwal_harga);
        };
        function jadwalBatal() {
            $(`#jadwal_id`).val(null);
            $(`#jadwal_waktu_berangkat`).val('');
            $(`#jadwal_harga`).val('');
        }
        const galleryEdit = p => {
            $(`#gallery_id`).val(p.gallery_id);
            $(`#gallery_title`).val(p.gallery_title);
            $(`#gallery_desc`).val(p.gallery_desc);
            $(`#gallery_img`).val(p.gallery_img);
        };
        function galleryBatal(){
            $(`#gallery_id`).val(null);
            $(`#gallery_title`).val(null);
            $(`#gallery_desc`).val(null);
            $(`#gallery_img`).val(null);
        };
        const loadFile = function(event) {
            let reader = new FileReader();
            reader.onload = function(){
                let output = document.getElementById('gallery_img');
                output.value = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endsection
