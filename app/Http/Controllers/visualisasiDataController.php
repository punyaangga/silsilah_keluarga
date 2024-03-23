<?php

namespace App\Http\Controllers;

use App\Models\silsilah_keluarga;
use Illuminate\Http\Request;

class visualisasiDataController extends Controller
{
    public function index()
    {
        $rootNodes = silsilah_keluarga::whereNull('id_orang_tua')->get();
        $familyTree = $this->fetchFamilyTree($rootNodes);
        return view('visualisasiData', compact('familyTree'));
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

}
