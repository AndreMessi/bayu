@extends('partials.layout')
@section('title','Pembayaran')
@section('content')
    @auth
        @if(auth()->user()->role==='admin')
            <div class="col-12">
                <div class="card">
                    <div class="card-body overflow-auto">
                        <table id="dTable" class="table table-bordered table-hover w-100">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Pemesan</th>
                                <th>Nama Paket</th>
                                <th>Tempat Tujuan</th>
                                <th>Lokasi Penjemputan</th>
                                <th>Transportasi</th>
                                <th>Waktu Berangkat</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Bukti</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($data)>0)
                                @foreach($data as $i)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{@$i->nama}}</td>
                                        <td>{{@$i->paket_nama}}</td>
                                        <td>{{@$i->paket_tujuan}}</td>
                                        <td>{{@$i->pesan_lokasi_jemput}}</td>
                                        <td>{{@$i->paket_transportasi}}</td>
                                        <td>{{@$i->jadwal_waktu_berangkat}}</td>
                                        <td>{{@$i->jadwal_harga}}</td>
                                        <td style="width: 400px">
                                            <form id="formPesan-{{$i->pesan_id}}" action="{{route('update.status')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="pesan_id" value="{{$i->pesan_id}}">
                                                <select class="form-control w-100" onchange="formPesan({{$i->pesan_id}})" name="pesan_status">
                                                    <option value="menunggu" {{@$i->pesan_status === 'menunggu' ? 'selected':''}}>Menunggu</option>
                                                    <option value="upload" {{@$i->pesan_status === 'upload' ? 'selected':''}}>Upload Bukti</option>
                                                    <option value="berhasil" {{@$i->pesan_status === 'berhasil' ? 'selected':''}}>Berhasil</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            @if(@$i->bukti_img)
                                                <img src="{{@$i->bukti_img}}" />
                                            @endif
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
        @elseif(auth()->user()->role==='pengguna')
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table id="dTable" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Pemesan</th>
                                <th>Nama Paket</th>
                                <th>Tempat Tujuan</th>
                                <th>Lokasi Penjemputan</th>
                                <th>Transportasi</th>
                                <th>Waktu Berangkat</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Bukti</th>
                                <th>Upload Bukti</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($data)>0)
                                @foreach($data as $i)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{@$i->nama}}</td>
                                        <td>{{@$i->paket_nama}}</td>
                                        <td>{{@$i->paket_tujuan}}</td>
                                        <td>{{@$i->pesan_lokasi_jemput}}</td>
                                        <td>{{@$i->paket_transportasi}}</td>
                                        <td>{{@$i->jadwal_waktu_berangkat}}</td>
                                        <td>{{@$i->jadwal_harga}}</td>
                                        <td>{{@$i->pesan_status}}</td>
                                        <td>
                                            @if(@$i->bukti_img)
                                                <a href="{{@$i->bukti_img}}" data-toggle="lightbox" data-title="bukti-{{$i->pesan_id}}" data-gallery="gallery">
                                                    <img src="{{@$i->bukti_img}}" class="img-thumbnail" />
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if(@$i->pesan_status === 'upload')
                                                <form action="{{route('upload.bukti')}}" method="post" id="form-{{$i->pesan_id}}">
                                                    @csrf
                                                    <input type="file" accept="image/*" onchange="loadFile(event,{{$i->pesan_id}})" />
                                                    <input id="uploadBukti-{{$i->pesan_id}}" type="hidden" class="custom-file-input" name="bukti_img">
                                                    <input type="hidden" name="bukti_pesan_id" value="{{$i->pesan_id}}">
                                                </form>
                                            @else
                                                'Menunggu Konfirmasi Admin'
                                            @endif
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
        @endif
    @endauth
@endsection
@section('js_after')
    <script>
        const formPesan = p => {
            $(`#formPesan-${p}`).submit()
        }
        const loadFile = function(event,id) {
            let reader = new FileReader();
            reader.onload = function(){
                let output = document.getElementById(`uploadBukti-${id}`);
                output.value = reader.result;
                $(`#form-${id}`).submit()
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
