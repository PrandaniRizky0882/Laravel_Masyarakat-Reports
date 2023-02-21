<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use App\Models\Pengaduan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TanggapanController extends Controller
{
    public function index() {

        $data = array('title' => 'Tanggapan');
        $pengaduan = Pengaduan::all();
        return view('tanggapan.dashboard', $data, compact('pengaduan'));
    }

    public function create() {

        $data = array('title' => 'Create Responses');
        return view('tanggapan.create',$data);
    }

    public function store(Request $request) {

        $this->validate($request, [
            'id_tanggapan'      => 'max:15',
            'id_pengaduan'      => 'max:15',
            'tgl_tanggapan'     => 'required',
            'tanggapan'         => 'max:255',
            'id_petugas'        => 'max:15',

        ]);

        // Tanggapan::create([
        //     'id_tanggapan'              => $request->id_tanggapan,
        //     'id_pengaduan'              => $request->id_pengaduan,
        //     'tgl_tanggapan'             => $request->tgl_tanggapan,
        //     'tanggapan'                 => $request->tanggapan,
        //     'id_petugas'                => $request->id_petugas,
        // ]);



        return redirect()->route('tanggapan.dashboard');
    }

    public function show($id) {

        $data = array('title' => 'Tanggapan');
        $tanggapan = Tanggapan::join('pengaduans','pengaduans.id_pengaduan','tanggapans.id_pengaduan') 
        ->join('petugas','petugas.id_petugas','tanggapans.id_petugas') 
        ->select('tanggapans.*','pengaduans.*') 
        ->where('tanggapans.id_pengaduan') 
        ->get(); 

        return view('tanggapan.show',$data, compact('tanggapan'));
    }

}
