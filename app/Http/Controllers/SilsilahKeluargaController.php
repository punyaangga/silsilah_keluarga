<?php

namespace App\Http\Controllers;

use App\Http\Requests\SilsilahKeluargaRequest;
use App\Models\silsilah_keluarga;

class SilsilahKeluargaController extends Controller
{
    public function index(){
        $dataOrangTua = silsilah_keluarga::where('id_orang_tua',1)
        ->orWhere('id_orang_tua',null)
        ->get();
        
        return view('addDataKeluarga',compact('dataOrangTua'));
    }
    public function store(SilsilahKeluargaRequest $request){
        $data = $request->all();
        silsilah_keluarga::create($data);
        return redirect()->route('silsilah_keluarga.index');
    }
}
