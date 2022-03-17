<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RencanaKerjaController extends Controller
{
    //
    public function index(){
        return view('contents.rencanakerja.index');
    }
}
