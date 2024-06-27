<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        if (strlen($katakunci)) {
            $data = Pegawai::where('nama', 'like', "%$katakunci%")
                ->orWhere('no_telp', 'like', "%$katakunci%")
                ->orWhere('tgl_lahir', 'like', "%$katakunci%")
                ->orWhere('alamat', 'like', "%$katakunci%")
                ->paginate(5);
        }else{
            $data = Pegawai::orderBy('id', 'asc')->paginate(5);
        }
        return view('Pegawai.data-pegawai')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'no_telp'=>'required|numeric',
            'tgl_lahir'=>'required',
            'alamat'=>'required',
        ],[
            'nama.required'=>'Nama harus diisi!',
            'no_telp.required'=>'No Telpon wajib diisi!',
            'no_telp.numeric'=>'No telpon hanya boleh angka!',
            'tgl_lahir.required'=>'Tanggal lahir harus diisi!',
            'alamat.required'=>'Alamat harus diisi!'
        ]);
        $data = [
            'nama'=>$request->nama,
            'no_telp'=>$request->no_telp,
            'tgl_lahir'=>$request->tgl_lahir,
            'alamat'=>$request->alamat,
        ];
        Pegawai::create($data);
        return redirect()->to('Pegawai')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Pegawai::where('id', $id)->first();
        return view('Pegawai.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'=>'required',
            'no_telp'=>'required|numeric',
            'tgl_lahir'=>'required',
            'alamat'=>'required',
        ],[
            'nama.required'=>'Nama harus diisi!',
            'no_telp.required'=>'No Telpon wajib diisi!',
            'no_telp.numeric'=>'No telpon hanya boleh angka!',
            'tgl_lahir.required'=>'Tanggal lahir harus diisi!',
            'alamat.required'=>'Alamat harus diisi!'
        ]);
        $data = [
            'nama'=>$request->nama,
            'no_telp'=>$request->no_telp,
            'tgl_lahir'=>$request->tgl_lahir,
            'alamat'=>$request->alamat,
        ];
        Pegawai::where('id', $id)->update($data);
        return redirect()->to('Pegawai')->with('success', 'Berhasil update data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Pegawai::where('id', $id)->delete();
        return redirect()->to('Pegawai')->with('success', 'Data berhasil di hapus!');
    }
}
