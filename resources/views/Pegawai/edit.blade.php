@extends('Layout.template')
@section('konten')

<!-- START FORM -->
<form action='{{url('Pegawai/'.$data->id)}}' method='post'>
    @csrf
    @method('PUT')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h1 class="pb-3">UPDATE DATA PEGAWAI</h1>
        <a href="{{url('Pegawai')}}" class="btn btn-secondary mb-2"><< kembali</a>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' value="{{ $data->nama }}" id="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="no_telp" class="col-sm-2 col-form-label">No Telephone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='no_telp' value="{{$data->no_telp}}" id="no_telp">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name='tgl_lahir' value="{{$data->tgl_lahir}}" id="tgl_lahir" :min="getTodayDate()">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='alamat' value="{{$data->alamat}}" id="alamat">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
<!-- AKHIR FORM -->
@endsection
