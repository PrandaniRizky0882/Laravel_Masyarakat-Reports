<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class PengaduanController extends Controller
{
    public function index() {
        $pengaduan = Pengaduan::all();
        return view('masyarakat.dashboard', compact('pengaduan'));
    }

    public function create() {

        return view('masyarakat.create');
    }

    public function show($id) {

        // $pengaduan = Pengaduan::find($id);
        
        // // cara kedua
        // // $kiki = Pengaduan::all();

        // // $pengaduans = $kiki->find($id);

        // return view('masyarakat.show', compact('pengaduan'));
        $pengaduan = DB::table('pengaduans')->where('id_pengaduan',$id)->first();
        return view('masyarakat.show', compact('pengaduan'));
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


        // Pengaduan::create([
        //     'id_pengaduan'      => $request->id_pengaduan,
        //     'tgl_pengaduan'     => $request->tgl_pengaduan,
        //     'nik'               => $request->nik,
        //     'foto'              => $image->hasName(),
        //     'isi_laporan'       => $request->isi_laporan,
        //     'status',
        // ]);

        // $file = $request->file('foto');

        
        // // lokasi menyimpan folder foto di public dengan folder data_file
        // $file->move('data_files',$file->getClientOriginalName());
/**
 * cara pertama masih sama
 */
        // $imageName = time().'.'.$request->foto->extension();
        // $uploadedImage = $request->foto->move(public_path('data_files'), $imageName);
        // $imagePath = 'data_files/' . $imageName;
        
        // if ($pengaduan = Pengaduan::create()) {
        //     $pengaduan->foto = $imagePath;
        //     $pengaduan->save();
        // }

 /**
* cara kedua masih sama dan error pada field tgl_pengaduan[duplicate]
*/
        // if($request->hasFile('foto')){
        //     $resorce = $request->file('foto');
    
        //     $name   = $resorce->getClientOriginalName();
        //     // lokasi menyimpan folder foto di public dengan folder data_file
        //     $resorce->move(\base_path() ."/public/images", $name);
        //     $save = DB::table('pengaduans')->insert(['foto' => $name]);
    
        //     }

        

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

            // mengambil data lama
            // $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();

            // $fotolama  = public_path('public/images/'. $pengaduan->foto);

            // File::delete($fotoLama);



            // // // menghapus data lama
            // Storage::delete('public/images/'. $pengaduan->foto);
            


            // $pengaduan = Pengaduan::find($id);
            // $pengaduan->tgl_pengaduan                   = $request->tgl_pengaduan;
            // $pengaduan->nik                             = $request->nik;
            // $pengaduan->isi_laporan                     = $request->isi_laporan;
            // $pengaduan->foto                            = $image->hashName();

            // $pengaduan->save();

            // $pengaduan->update([
            //     'tgl_pengaduan'     => $request->tgl_pengaduan,
            //     'nik'               => $request->nik,
            //     'foto'              => $image->hashName(),
            //     'isi_laporan'       => $request->isi_laporan,
            // ]);

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
        // $pengaduan = Pengaduan::find($id);
        // $pengaduan->delete();
        $pengaduan = DB::table('pengaduans')->where('id_pengaduan',$id)->delete();

        return redirect('masyarakat.dashboard');
    }

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