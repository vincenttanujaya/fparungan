<?php
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;


Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('mahasiswa')->user();

    $iduser = Auth::user()->id;
    // dd($users);
    $myskill = DB::select(DB::raw("SELECT s.id_skill,s.nama_skill FROM skill s,mempunyai m WHERE m.id_skill=s.id_skill AND m.id_mahasiswa='$iduser'"));
    $skill = DB::select(DB::raw("SELECT * FROM skill WHERE id_skill NOT IN (SELECT id_skill FROM mempunyai WHERE id_mahasiswa='$iduser')"));
    // dd($myskill);
    $rank = DB::select(DB::raw("SELECT r.rank as ranku FROM mahasiswas m, rank r WHERE m.id_rank = r.id_rank AND m.id='$iduser'"));
    $rank=$rank[0]->ranku;

      $jmlpyk = DB::select(DB::raw("SELECT jumlah_proyek('$iduser') as jml"));
      $jmlpyk = $jmlpyk[0]->jml;
      // dd($jmlpyk);
    if ($rank === "Bronze") {
      $warna= 'bronze.png';
    }
    if ($rank === "Silver") {
      $warna= 'silver.png';
    }
    if ($rank === "Gold") {
      $warna= 'gold.png';
    }
    $aktif='1';

    $proyek = DB::select(DB::raw("SELECT *
                                  FROM list_proyek l
                                  WHERE username='$iduser'
                                  AND id_proyek NOT IN (SELECT id_proyek
                                                        FROM diambil
                                                        WHERE id_mahasiswa = '$iduser'
                                                        OR status_apply='1') "));
    $skillpr = DB::select(DB::raw("SELECT id_proyek,nama_skill FROM dibutuhkan JOIN proyek USING(id_proyek) JOIN skill USING(id_skill)"));
    // dd($skillpr);
    return view('mahasiswa.home',['skill'=>$skill,'myskill'=>$myskill,'rank'=>$rank,'warna'=>$warna,'proyek'=>$proyek,'skillpr'=>$skillpr,'aktif'=>$aktif,'jumlah'=>$jmlpyk]);
})->name('home');

Route::get('/profil', function(){
  $users[] = Auth::user();
  $users[] = Auth::guard()->user();
  $users[] = Auth::guard('mahasiswa')->user();
  $iduser = Auth::user()->id;
  // dd($users);
  $myskill = DB::select(DB::raw("SELECT s.id_skill,s.nama_skill FROM skill s,mempunyai m WHERE m.id_skill=s.id_skill AND m.id_mahasiswa='$iduser'"));
  $skill = DB::select(DB::raw("SELECT * FROM skill WHERE id_skill NOT IN (SELECT id_skill FROM mempunyai WHERE id_mahasiswa='$iduser')"));
  // dd($myskill);
  $rank = DB::select(DB::raw("SELECT r.rank as ranku FROM mahasiswas m, rank r WHERE m.id_rank = r.id_rank AND m.id='$iduser'"));
  $rank = $rank[0]->ranku;


    $jmlpyk = DB::select(DB::raw("SELECT jumlah_proyek('$iduser') as jml"));
    $jmlpyk = $jmlpyk[0]->jml;
  // dd($rank);

  if ($rank === "Bronze") {
    $warna= 'bronze.png';
  }
  if ($rank === "Silver") {
    $warna= 'silver.png';
  }
  if ($rank === "Gold") {
    $warna= 'gold.png';
  }
  $userss = Auth::user()->id;
  $aktif='2';
  $iduser = DB::select(DB::raw("SELECT * FROM profil WHERE id='$userss'"));
  $propil = DB::select(DB::raw("SELECT * FROM mahasiswas m, universitas u WHERE u.id_universitas = m.ID_UNIV AND m.id='$userss' "));
  
  $namaproyek = DB::select(DB::raw("SELECT DISTINCT nama_proyek as nama FROM profil WHERE id='$userss' "));

  return view('mahasiswa.profil',['usernow'=>$iduser,'aktif'=>$aktif,'skill'=>$skill,'myskill'=>$myskill,'rank'=>$rank,'warna'=>$warna,'nama_proyek'=>$namaproyek,'jumlah'=>$jmlpyk,'propil'=>$propil[0]]);
});

Route::get('/proyek', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('mahasiswa')->user();

    $iduser = Auth::user()->id;
    // dd($users);
    $myskill = DB::select(DB::raw("SELECT s.id_skill,s.nama_skill FROM skill s,mempunyai m WHERE m.id_skill=s.id_skill AND m.id_mahasiswa='$iduser'"));
    $skill = DB::select(DB::raw("SELECT * FROM skill WHERE id_skill NOT IN (SELECT id_skill FROM mempunyai WHERE id_mahasiswa='$iduser')"));
    // dd($myskill);
    $rank = DB::select(DB::raw("SELECT r.rank as ranku FROM mahasiswas m, rank r WHERE m.id_rank = r.id_rank AND m.id='$iduser'"));
    $rank=$rank[0]->ranku;
      $jmlpyk = DB::select(DB::raw("SELECT jumlah_proyek('$iduser') as jml"));
      $jmlpyk = $jmlpyk[0]->jml;
   // dd($rank);
    if ($rank === "Bronze") {
      $warna= 'bronze.png';
    }
    if ($rank === "Silver") {
      $warna= 'silver.png';
    }
    if ($rank === "Gold") {
      $warna= 'gold.png';
    }
    $aktif='3';
    $proyek = DB::select(DB::raw("SELECT p.*, d.status_apply, pe.* FROM diambil d JOIN proyek p ON ( p.id_proyek = d.id_proyek ) JOIN penyedia pe ON (p.id_penyedia=pe.id) WHERE d.id_mahasiswa = '$iduser'"));
    // dd($proyek);
    $skillpr = DB::select(DB::raw("SELECT id_proyek,nama_skill FROM dibutuhkan JOIN proyek USING(id_proyek) JOIN skill USING(id_skill)"));
    // dd($jmlpyk);
    return view('mahasiswa.proyeksaya',['skill'=>$skill,'myskill'=>$myskill,'rank'=>$rank,'warna'=>$warna,'proyek'=>$proyek,'skillpr'=>$skillpr,'aktif'=>$aktif,'jumlah'=>$jmlpyk]);
});

Route::post('/tambahskill', function (Request $request) {

    $iduser = Auth::user()->id;
    $idskill = $request->pilih;
    DB::select(DB::raw("INSERT INTO mempunyai VALUES ('$iduser','$idskill')"));
    return redirect('mahasiswa/home');
});

Route::post('/hapusskill', function (Request $request) {

    $iduser = Auth::user()->id;
    $namaskill = $request->id;
    // dd($namaskill);
    // $idskill = DB::select(DB::raw("SELECT id_skill FROM skill WHERE nama_skill='$namaskill'"))->first();;
    // dd($idskill);

    DB::select(DB::raw("DELETE FROM mempunyai WHERE id_mahasiswa = '$iduser' AND id_skill IN (SELECT id_skill FROM skill WHERE nama_skill='$namaskill')"));
    return redirect('mahasiswa/home');
});

Route::post('/ambil', function (Request $request) {

    $iduser = Auth::user()->id;
    $idproyek = $request->ambil;
    // dd($request->ambil);
    DB::select(DB::raw("INSERT INTO diambil VALUES ('$iduser','$idproyek',0)"));
    return redirect('mahasiswa/proyek');
});

Route::post('/hapusproyek', function (Request $request) {

    $iduser = Auth::user()->id;
    $idproyek = $request->id;
    // dd($namaskill);
    // $idskill = DB::select(DB::raw("SELECT id_skill FROM skill WHERE nama_skill='$namaskill'"))->first();;
    // dd($idproyek);
    DB::select(DB::raw("CALL cancelProyek($idproyek,$iduser)"));
    return redirect('mahasiswa/proyek');
});
