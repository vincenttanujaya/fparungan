<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index(){
    $univ = DB::table('universitas')->get();
    return view('welcome', ['univ'=>$univ]);
  }

  public function login(){
    $univ = DB::table('universitas')->get();
    return view('login', ['univ'=>$univ]);
  }
  public static function total(int $id){
    $total = DB::select(DB::raw("SELECT jumlah_mahasiswa($id) AS jml"));
    return $total[0]->jml;
  }
  public function our(Request $request, $bulan){
      $bulan = 5;
      if($request->has('bulan')){
        $bulan=$request->bulan;
      }
      $bulan = DB::select(DB::raw("CALL deadline('$bulan')"));
      // dd($bulan);
    return view('ourproject', ['bulan'=>$bulan]);
  }
}
