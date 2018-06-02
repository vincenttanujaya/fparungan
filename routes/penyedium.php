<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('penyedium')->user();
    $today = date("Y-m-d");

    $iduser = Auth::user()->id;
    $pyk = DB::select(DB::raw("SELECT * FROM proyek WHERE id_penyedia='$iduser' AND id_proyek NOT IN (SELECT id_proyek FROM diambil) ORDER BY id_proyek DESC"));
    $proyek = DB::select(DB::raw("SELECT p.*,j.jml FROM proyek p LEFT JOIN jml_peminat j USING(id_proyek) WHERE id_penyedia='$iduser'  ORDER BY id_proyek DESC"));
    $skill = DB::select(DB::raw("SELECT * FROM skill"));
    $skillpr = DB::select(DB::raw("SELECT id_proyek,nama_skill FROM dibutuhkan JOIN proyek USING(id_proyek) JOIN skill USING(id_skill)"));
    $mhs = DB::select(DB::raw("SELECT * FROM list_peminat WHERE id_penyedia = '$iduser'"));
    $rank = DB::select(DB::raw("SELECT * FROM rankuniv"));
    // dd($rank);
    // dd($proyek);
    // dd(Auth::user());

    return view('penyedium.home',['proyek'=>$proyek,'skill'=>$skill,'today'=>$today,'skillpr'=>$skillpr,'mhs'=>$mhs,'pyk'=>$pyk,'rank'=>$rank]);
})->name('home');

Route::post('/hapus', function (Request $request) {

    $iduser = Auth::user()->id;
    // dd($namaskill);
    // $idskill = DB::select(DB::raw("SELECT id_skill FROM skill WHERE nama_skill='$namaskill'"))->first();;
    $idproyek = $request->ambil;
    DB::select(DB::raw("DELETE FROM proyek WHERE id_proyek = '$idproyek'"));
    return redirect('penyedium/home');
});

Route::post('/tambah', function (Request $request) {
    $iduser = Auth::user()->id;
    $skill = $request->skill;

    DB::select(DB::raw("INSERT INTO proyek(id_penyedia,nama_proyek,definisi,deadline,imbalan) VALUES ('$iduser','$request->nama_proyek','$request->deskripsi_proyek','$request->deadline','$request->duit') "));
    $id_proyek = DB::select(DB::raw("SELECT id_proyek FROM proyek WHERE id_penyedia='$iduser' AND nama_proyek='$request->nama_proyek' "));
    $id_proyek = $id_proyek[0]->id_proyek;

    // dd($skill);
    if($skill <> null){
    foreach ($skill as $skill) {
      DB::select(DB::raw("INSERT INTO dibutuhkan VALUES ('$skill','$id_proyek')"));
    }
    }
    return redirect('penyedium/home');
});

Route::post('/edit', function (Request $request) {
    $iduser = Auth::user()->id;
    $skill = $request->skill;

    $idmhs= $request->idmahasiswa;
    $idprk= $request->idproyek;
    // dd($skill);
    if($request->button==='2'){
      DB::select(DB::raw("CALL dealProyek('$idprk','$idmhs')"));
      DB::select(DB::raw("UPDATE proyek SET status='Proses' WHERE id_proyek='$idprk'"));
    }
    else{
      DB::select(DB::raw("UPDATE diambil SET status_apply=2 WHERE id_mahasiswa='$idmhs' AND id_proyek='$idprk'"));
    }
    return redirect('penyedium/home');
});

Route::post('/selesai', function (Request $request) {
    $iduser = Auth::user()->id;
    $skill = $request->skill;
    $idprk= $request->ambil;
    DB::select(DB::raw("UPDATE diambil SET status_apply=3 WHERE status_apply='1' AND id_proyek='$idprk'"));
    DB::select(DB::raw("UPDATE proyek SET status='Selesai' WHERE id_proyek='$idprk'"));

    return redirect('penyedium/home');
});

Route::get('/profil', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('penyedium')->user();
    $today = date("Y-m-d");

    $iduser = Auth::user()->id;

    $proyek = DB::select(DB::raw("SELECT p.*,j.jml FROM proyek p, jml_peminat j WHERE id_penyedia='$iduser' AND p.id_proyek = j.id_proyek ORDER BY id_proyek DESC"));
    $skill = DB::select(DB::raw("SELECT * FROM skill"));
    $skillpr = DB::select(DB::raw("SELECT id_proyek,nama_skill FROM dibutuhkan JOIN proyek USING(id_proyek) JOIN skill USING(id_skill)"));
    $mhs = DB::select(DB::raw("SELECT * FROM list_peminat WHERE id_penyedia = '$iduser'"));

    $penyedia=DB::select(DB::raw("SELECT * FROM penyedia WHERE id = '$iduser'"));

    // dd($iduser);
    // dd($pny);
    // dd(Auth::user());
    return view('penyedium.profil',['proyek'=>$proyek,'skill'=>$skill,'today'=>$today,'penyedia'=>$penyedia[0]]);
});
