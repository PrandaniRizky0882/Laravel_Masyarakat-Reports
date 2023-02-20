<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Codedge\Fpdf\Fpdf\Fpdf;


class PengaduanController extends Controller
{

    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }

    public function index() {
        $data = array('title' => 'Dashboard');
        $pengaduan = Pengaduan::all();
        return view('masyarakat.dashboard',$data, compact('pengaduan'));
    }

    public function create() {

        $data = array('title' => 'Create Reports');
        return view('masyarakat.create',$data);
    }

    public function show($id) {

        $data = array('title' => 'Detail');
        $pengaduan = DB::table('pengaduans')->where('id_pengaduan',$id)->first();
        return view('masyarakat.show',$data, compact('pengaduan'));
    }

    public function store(Request $request) {

       
        $this->validate($request, [
            'id_pengaduan'      => 'max:15',
            'tgl_pengaduan'     => 'required',
            'nik'               => 'required|max:10',
            'isi_laporan'       => 'required|max:255',
            'foto'              => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'status',
            
        ]);

        //upload image
        $image = $request->file('foto');
        $image->storeAs('public/images', $image->hashName());
        
        //create post
        Pengaduan::create([
            'id_pengaduan'      => $request->id_pengaduan,
            'tgl_pengaduan'     => $request->tgl_pengaduan,
            'nik'               => $request->nik,
            'foto'              => $image->hashName(),
            'isi_laporan'       => $request->isi_laporan,
            'status',
        ]);

        
        return redirect()->route('masyarakat.dashboard');
    
      }



    public function edit($id) 
    {
      
        // $pengaduan = Pengaduan::find($id);
        $pengaduan = DB::table('pengaduans')->where('id_pengaduan',$id)->first();

        return view('masyarakat.edit', compact('pengaduan'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'tgl_pengaduan'     => 'required',
            'nik'               => 'required|max:10',
            'isi_laporan'       => 'required|max:255',
            'foto'              => 'image|mimes:jpeg,png,jpg,gif,svg',
            
        ]);

        // menecek apakah gambar telah diupload

        if ($request->hasFile('foto')) {
            
            $image = $request->file('foto');
            $image->storeAs('public/images', $image->hashName());


             DB::table('pengaduans')->where('id_pengaduan',$id)->update([
                'tgl_pengaduan'             => $request->tgl_pengaduan,
                'nik'                       => $request->nik,
                'isi_laporan'               => $request->isi_laporan,
                'foto'                      => $image->hashName(),
            ]);

            // hapus foto lama

            
            // Storage::

        } else {

            $pengaduan = DB::table('pengaduans')->where('id_pengaduan',$id)->update([
                'tgl_pengaduan'             => $request->tgl_pengaduan,
                'nik'                       => $request->nik,
                'isi_laporan'               => $request->isi_laporan,
            ]);
            

        }

        return redirect()->route('masyarakat.dashboard');



    }

    public function delete($id) {

        $pengaduan = DB::table('pengaduans')->where('id_pengaduan',$id)->delete();

        return redirect()->route('masyarakat.dashboard');
    }

    public function cetak() {
        $this->fpdf->SetFont('Times', 'B', 15);
        $this->fpdf->AddPage();
        $this->fpdf->Cell(0, 10,"Pengaduan Masyarakat",0,"","C");
        $this->fpdf->Ln();
        $this->fpdf->Cell(80);
        $this->fpdf->Cell(30,10,'Dusun | Mekar Sari',0,0,'C');       
        
        $this->fpdf->Ln();
        $this->fpdf->Ln();

        $this->fpdf->SetFont('Times','B', 12);
        $this->fpdf->Cell(30,8,"Nik",1,"","C");
        $this->fpdf->Cell(70,8,"Laporan",1,"","C");
        $this->fpdf->Cell(25,8,"Tanggal",1,"","C");
        $this->fpdf->Cell(25,8,"Status",1,"","C");
        $this->fpdf->Cell(45,8,"Foto",1,"","C");


        $this->fpdf->Ln();

        $pengaduan = Pengaduan::all();
        foreach ($pengaduan as $data) {
            $this->fpdf->Cell(30,8,$data->nik,1,"","C");
            $this->fpdf->Cell(70,8,$data->isi_laporan,1,"","C");
            $this->fpdf->Cell(25,8,$data->tgl_pengaduan,1,"","C");
            $this->fpdf->Cell(25,8,$data->status,1,"","C");
            // $this->fpdf->Image('Storage/images/'.$data->foto,150,30,25,25);
            
            $this->fpdf->Ln();

        }
        


        $this->fpdf->Output();

        exit;
    }


    // public function cetak_gambar($id) {

    //     $this->fpdf->AddPage();
    //     $this->fpdf->Ln();


    //     $pengaduan = Pengaduan::findOrFail($id);
    //     $this->fpdf->Image('Storage/images/'.$pengaduan->foto,150,30,25,25);

    //     $this->fpdf->Output();
        


    // }
    
}


            // jika foto tidak diupdate
            // $pengaduan = Pengaduan::find($id);
            // $pengaduan->tgl_pengaduan                   = $request->tgl_pengaduan;
            // $pengaduan->nik                             = $request->nik;
            // $pengaduan->isi_laporan                     = $request->isi_laporan;
            // $pengaduan->foto                            = $image->hashName();

            // $pengaduan->save();
            //-----------------//
            // $pengaduan->update([
            //     'tgl_pengaduan'     => $request->tgl_pengaduan,
            //     'nik'               => $request->nik,
            //     'isi_laporan'       => $request->isi_laporan,
            // ]);


                    // return dd($pengaduan);

        // elquent
        // $pengaduan = Pengaduan::find($id);
        // $pengaduan->tgl_pengaduan       = $request->tgl_pengaduan;
        // $pengaduan->nik                 = $request->nik;
        // $pengaduan->isi_laporan         = $request->isi_laporan;
        // $pengaduan->foto                = $request->foto;
        // $pengaduan->status              = $request->status;

        // $pengaduan->save();