<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TanggapanController extends Controller
{
    public function index() {

        $data = array('title' => 'Tanggapan | Petugas');
        return view('tanggapan.dashboard',$data);
    }
}
