<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Hitung extends Controller
{

    protected $dt;
    protected $ta;
    protected $r;
    protected $hasil;

    public function index(){
        // Menampilkan form tambah
        return view("hitung/formhitung");
    }

    public function hitung_v_tabung(Request $request)
    {
        $this->dt = $request->dt;
        $this->r = $this->dt/2;
        $this->ta = $request->ta;
        $this->hasil = 22/7*$this->r*$this->r*$this->ta;

        return view('hitung/hasilhitung', [
            "dt" => $this->dt,
            "ta" => $this->ta,
            "r" => $this->r,
            "hasil" => round($this->hasil)
        ]);
    }
}



?>