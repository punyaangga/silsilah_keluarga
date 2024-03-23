<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SilsilahKeluargaRequest;
use App\Http\Resources\globalResource;
use App\Models\silsilah_keluarga;


class ApiSilsilahKeluargaController extends Controller
{
   
    public function index()
    {
        $rootNodes = silsilah_keluarga::whereNull('id_orang_tua')->get();
        $familyTree = $this->fetchFamilyTree($rootNodes);
        try {
            return new globalResource(true, 'Data berhasil ditampilkan', $familyTree);
        } catch (\Exception $e) {
            return new globalResource(false, 'Data gagal ditampilkan',null);
        }
    }

    private function fetchFamilyTree($nodes)
    {
        $tree = [];

        foreach ($nodes as $node) {
            $children = $node->children()->get();

            if ($children->isNotEmpty()) {
                $node->children = $this->fetchFamilyTree($children);
            }

            $tree[] = $node;
        }

        return $tree;
    }

    public function store(SilsilahKeluargaRequest $request)
    {
        $nama = $request->nama;
        $jenis_kelamin = $request->jenis_kelamin;
        $id_orang_tua = $request->id_orang_tua;

        try {
            silsilah_keluarga::create([
                'nama' => $nama,
                'jenis_kelamin' => $jenis_kelamin,
                'id_orang_tua' => $id_orang_tua
            ]);
            return new globalResource(true, 'Data berhasil disimpan',null);
        } catch (\Exception $e) {
            return new globalResource(false, 'Data gagal disimpan',null);
        }
       
    }
}
