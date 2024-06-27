@extends('Layout.template')
@section('konten')
<!-- START DATA -->
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h1 class="pb-3">DAFTAR PEGAWAI</h1>
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
            <form class="d-flex" action="{{url('Pegawai')}}" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
        </div>

        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='{{url('Pegawai/create')}}' class="btn btn-primary">+ Tambah Data</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-2">Nama</th>
                    <th class="col-md-2">No Telephone</th>
                    <th class="col-md-2">Tanggal Lahir</th>
                    <th class="col-md-3">Alamat</th>
                    <th class="col-md-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $data->firstItem() ?>
                @foreach ($data as $item)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->no_telp}}</td>
                    <td>{{$item->tgl_lahir}}</td>
                    <td>{{$item->alamat}}</td>
                    <td>
                        <a href='{{url('Pegawai/'.$item->id.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                        <form onsubmit="return confirm('Anda yakin untuk menghapus data?')" action="{{url('Pegawai/'.$item->id)}}" class="d-inline" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
        {{$data->links()}}
    </div>
<!-- AKHIR DATA -->
@endsection

