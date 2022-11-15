<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Supplier extends Controller
{

    protected $id_supplier;
    protected $nama_supplier;
    protected $alamat_supplier;
    protected $telp_supplier;

    public function index(){
        // Menampilkan list supplier
        echo "Hello World !";
    }

    public function form(){
        return view("supplier/formtambah");
    }

    public function process(Request $request){
        echo "Nama Supplier : ";
        echo $request->input('nama');
        echo "<br>";
        echo '<hr>';
        echo "Alamat Supplier : ";
        echo $request->input('alamat');
        echo "<br>";
        echo '<hr>';
        echo " No. Telpon : ";
        echo $request->input('telefon');
        echo "<br>";
        echo '<hr>';
    }
    public function tambah(){
        
    }

    public function edit(){
        
    }

    public function hapus(){
        
    }

    public function detail($id){
        echo "nama saya $id";
    }
}



?>