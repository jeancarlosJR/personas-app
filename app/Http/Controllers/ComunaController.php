<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comuna;
use Illuminate\Support\Facades\DB;

class ComunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$comunas = Comuna::all();
        $comunas = DB::table("tb_comuna")
        ->join("tb_municipio","tb_comuna.muni_codi", "=" , "tb_municipio.muni_codi")
        ->select("tb_comuna.*", "tb_municipio.muni_nomb")
        ->get();

        return view ('comuna.index' , ['comunas' => $comunas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipios = DB::table('tb_municipio')
        ->orderBy('muni_nomb')
        ->get();

        return view ('comuna.new' , ['municipios' => $municipios]);
    }

}
