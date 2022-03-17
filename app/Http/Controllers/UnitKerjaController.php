<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UnitKerjaController extends Controller
{
    //
    public function index(){        
        return view('contents.unitkerja.index');
    }

    public function create(){
        $user = User::where('unit_kerja_id',NULL)
            ->get();
        return view('contents.unitkerja.create',compact('user'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->only('name'), [
            'name' => 'required',
        ]);
        if ($validator->passes()) {
            UnitKerja::create($request->only('name'));
            return response()->json([
                "status"=>"Success",
                "type" => true,
                "message" => "Success Berhasil Di tambahkan"
            ]);
        }
        return response()->json([
            "status"=>"Error",
            "type" => false,
            "message" => $validator->errors()->all()
        ]);
    }

    public function edit($id){

    }

    public function update(){

    }

    public function delete($id){

    }

    public function getAllUnitKerja(){
        $unitKerja = UnitKerja::all();
        return response()->json($unitKerja);
    }
}
