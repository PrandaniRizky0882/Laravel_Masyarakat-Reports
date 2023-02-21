<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PetugasController extends Controller
{
    public function index() 
    {
        $data = array('title' => 'Dashboard');
        return view('petugas.dashboard', $data);
    }

    public function tampil() {

        $data = array('title' => 'Menu');
        $pengaduan = Pengaduan::all();
        return view('petugas.tampil', $data, compact('pengaduan'));
    }

    public function show($id) {

        $data = array('title' => 'Detail');
        $pengaduan = DB::table('pengaduans')->where('id_pengaduan',$id)->first();
        return view('petugas.show',$data, compact('pengaduan'));
    }

    public function edit($id) {
 
        $data = array('title' => 'Edit Pengaduan');
        $pengaduan = DB::table('pengaduans')->where('id_pengaduan',$id)->first();
        return view('petugas.edit',$data, compact('pengaduan'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'tgl_pengaduan'         => 'required',
            'nik'                   => 'required|max:10',
            'isi_laporan'           => 'required|max:255',
            'foto'                  => 'image|mimes:jpeg,png,jpg,gif,svg',
            'status'                => '',
        ]);

        if ($request->hasFile('foto')) {
            
            $image = $request->file('foto');
            $image->storeAs('public/images', $image->hashName());

            DB::table('pengaduans')->where('id_pengaduan', $id)->update([
                'tgl_pengaduan'             => $request->tgl_pengaduan,
                'nik'                       => $request->nik,
                'isi_laporan'               => $request->isi_laporan,
                'foto'                      => $image->hashName(),
                'status'                    => $request->status,
            ]);
        } else {
            
            $pengaduan = DB::table('pengaduans')->where('id_pengaduan',$id)->update([
                'tgl_pengaduan'             => $request->tgl_pengaduan,
                'nik'                       => $request->nik,
                'isi_laporan'               => $request->isi_laporan,
                'status'                    => $request->status,
            ]);
        }

        return redirect()->route('petugas.tampil');
    }

    public function delete($id) {
        $pengaduan = DB::table('pengaduans')->where('id_pengaduan', $id)->delete();

        return redirect()->route('petugas.tampil');
    }

}
