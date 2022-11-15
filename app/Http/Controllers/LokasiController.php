<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\LokasiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LokasiController extends Controller
{
    protected $LokasiModel;
    public function __construct()
    {
        $this->lokasiModel = new LokasiModel;
        $this->middleware('auth:web',[]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //
        $gudang = LokasiModel::latest();
        // dd(request('search'));
        if(request('search')) {
            $gudang -> where('nama_lokasi','like','%',request('search'),'%');
        }

        return view('gudang.index',[
            "title" => 'Daftar Lokasi',
            "lokasi" => DB::table('lokasi')->paginate(4),
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tambah(){
        return view('gudang.tambah');
    }

    public function store(Request $request)
    {
        // try {
            $data = [
                'nama_lokasi' => $request->input('nama_lokasi'),
                'penanggung_jawab' => $request->input('penanggung_jawab'),
                'keterangan'        => $request->input('keterangan')
            ];
            //substr(hexdec(random_int(0,9999908)),4,-4);

            $id_lokasi = substr(md5(rand(0, 99999)), -4);
            $data['id_lokasi'] = $id_lokasi;
            // echo json_encode($data);
            //insert data ke database
            $insert = $this->LokasiModel->create($data);
            //Promise 
            if ($insert) {
                //redirect('gudang','refresh');
                return redirect('gudang');
            } else {
                return "input data gagal";
            }
        // } catch (Exception $e) {
        //     return $e->getMessage();
        //     //return "yaaah error nih, sorry ya";
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LokasiModel  $lokasiModel
     * @return \Illuminate\Http\Response
     */
    public function show(LokasiModel $lokasiModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LokasiModel  $lokasiModel
     * @return \Illuminate\Http\Response
     */
    public function edit(LokasiModel $lokasiModel, $id_lokasi = null)
    {
        $edit = $this->LokasiModel->whereIdLokasi($id_lokasi)->first();
        // echo json_encode($edit);
        return view('gudang.edit', ['edit' => $edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LokasiModel  $lokasiModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LokasiModel $lokasiModel)
    {
        $data = [
            'nama_lokasi'   => $request->input('nama_lokasi'),
            'penanggung_jawab' => $request->input('penanggung_jawab'),
            'keterangan'    => $request->input('keterangan')
        ];
        $upd = $this->LokasiModel
                    ->where('id_lokasi', $request->input('id_lokasi'))
                    ->update($data);
        if ($upd) {
        //redirect('gudang','refresh');
            return redirect('gudang');
        } else {
            return "update data gagal";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LokasiModel  $lokasiModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(LokasiModel $lokasiModel, $id_lokasi = null)
    {
        $hapus = $this->LokasiModel
                            ->where('id_lokasi',$id_lokasi)
                            ->delete();
            if($hapus){
                return redirect('gudang');
            }
    }
}
