<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanEvaluasiController extends Controller
{
    //
    public function index(){
        return view('contents.laporanevaluasi.index');
    }
}
