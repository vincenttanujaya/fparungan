@extends('penyedium.layout.navpenyedia')
<?php
use \App\Http\Controllers\HomeController;
?>
@section('content')
<div class="container-fluid" id="home_mahasiswa">
  <div class="row">
    <div class="col-4">

      <div class="card" style="margin-top:10px;">
        <div class="card-header" style="background-color: #ffffff; color:black;">
          <div class="row">
            <div class="container">
              <h5>PERINGKAT UNIVERSITAS</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Universitas</th>
                    <th scope="col">Proyek Selesai</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($rank as $rank)
                  <tr>
                    <th scope="row">{{$rank->nama_universitas}}</th>
                    <td>{{$rank->jml_mahasiswa}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="card" style="margin-top:10px;">
        <div class="card-header" style="background-color: #ffffff; color:black;">
          <div class="row">
            <!-- AWAL -->
            <div class="container">
              <div class="text-center my-3">
                <h1 id="nama user" style="color: #737373; font-size: 275%;"><b>Proyek Baru</b></h1>
              </div>
            </div>
            <div class="container" style="width: 700px">
                <form method="post" action="{{url('/penyedium/tambah')}}">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="exampleFormControlInput1" class="mx-auto my-2">Nama Proyek</label>
                    <input required type="text" class="form-control" name="nama_proyek" id="exampleFormControlInput1" placeholder="Nama Proyek..." style="width: 100%">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Deskripsi Proyek</label>
                    <textarea required class="form-control" id="exampleFormControlTextarea1" name="deskripsi_proyek" placeholder="Deskripsi Proyek..." rows="10" style="width: 100%"></textarea>
                  </div>

                  <div class="form-row align-items-center">
                    <div class="col-md-6 my-1">
                      <label for="tgl">Deadline Proyek</label>
                      <input required type="date" name="deadline" min="{{$today}}"class="form-control" id=tgl>
                    </div>
                    <div class="col-md-6 my-1 ml-auto">
                      <label for="imbalan">Imbalan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Rp</div>
                        </div>
                        <input required type="number" name="duit" min="100000" class="form-control" id="imbalan" placeholder="...">
                      </div>

                    </div>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mx-auto my-3" data-toggle="modal" data-target="#exampleModal" style="color: #efefef;background-color: #4232b8; box-shadow: none; width: 130px; border-radius: 20px">Lanjutkan </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Skill yang dibutuhkan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body mx-auto">
                                  <div class="checkbox">
                                    @foreach($skill as $skill)
                                      <label class="checkbox-inline mx-1"><input  type="checkbox" name="skill[]" value="{{$skill->id_skill}}">{{$skill->nama_skill}}</label>
                                    @endforeach
                                  </div>


                          </div>
                          <div class="modal-footer">
                            <!-- <button type="submit" name="kirim" class="btn btn-primary" style="color: #efefef;background-color: #4232b8; box-shadow: none;">Save changes</button> -->
                            <input type="submit" name="kirim" value="Buat Proyek" class="btn btn-primary mx-auto" style="color: #efefef;background-color: #4232b8; box-shadow: none; border-radius:20px;">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- MODAL ALHIR -->
                  </div>
                    </form>
                  </div>
                <!-- AKHIR -->
            </div>
          </div>
      </div>

    </div>
    <div class="col-8" id="tempatproyek">
      <h5 class="mx-1" style="margin-top:10px;"> Proyek Ku </h5>
      @foreach($proyek as $proyek)
      <!-- CARD -->
      <div class="mx-1" >
        <div class="card" style="margin-top:10px;">
          <div class="card-header" >
            <div class="row">
            <div class="col">
                <h5> {{$proyek->nama_proyek}}</h5>
            </div>
            <div class="col">
              @if($proyek->status==='Penawaran')
              <?php
                $total = HomeController::total($proyek->id_proyek);
              ?>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#penawar{{$proyek->id_proyek}}">Lihat Penawar <span class="badge badge-light"> {{$total}}</span> </button>
                <div class="modal fade" id="penawar{{$proyek->id_proyek}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Penawar {{$proyek->nama_proyek}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Username</th>
                              <th scope="col"></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($mhs as $mhss)
                            @if($proyek->id_proyek===$mhss->id_proyek)
                            <tr>
                              <form action="{{url('/penyedium/edit')}}" method="post">
                                {{ csrf_field() }}
                                <td>{{$mhss->nama_depan}} {{$mhss->nama_belakang}}</td>
                                <input type='hidden' name='idproyek' value='{{$proyek->id_proyek}}' />
                                <input type='hidden' name='idmahasiswa' value='{{$mhss->id}}' />
                                <td><button type="submit" class="btn btn-danger btn-sm ml-auto float-right" name="button" value="1">Tolak</button><button type="submit" class="btn btn-success btn-sm float-right" name="button" value="2">Terima</button></td>
                              </form>
                            </tr>
                            @endif
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              @elseif($proyek->status==='Proses')
                <button type="button" class="btn btn-success float-right" disabled>Sedang Proses</button>
              @elseif($proyek->status==='Selesai')
                <button type="button" class="btn btn-dark float-right" disabled>Selesai</button>
              @endif
            </div>
          </div>
          </div>
          <div class="card-body">
            <p class="card-text">{{$proyek->definisi}}</p>
            <a><b>Deadline    :</b></a>
            <a style="font-size: 20px;">{{$proyek->deadline}} </a> <br>
            <a><b>Imbalan    :</b></a>
            <a style="font-size: 20px;">Rp. {{$proyek->imbalan}}</a> <br>
            @if($proyek->status==='Penawaran')
              <form action="{{url('/penyedium/hapus')}}" method="post">
                {{ csrf_field() }}
                <button href="#" class="btn btn-danger float-right" name="ambil" value="{{$proyek->id_proyek}}">Hapus Proyek</button>
              </form>
            @elseif($proyek->status==='Proses')
              <form action="{{url('/penyedium/selesai')}}" method="post">
                {{ csrf_field() }}
                <button href="#" class="btn btn-dark float-right" name="ambil" value="{{$proyek->id_proyek}}">Selesai</button>
              </form>
            @elseif($proyek->status==='Selesai')
            @endif
            @foreach($skillpr as $skillprr)
              @if ($skillprr->id_proyek === $proyek->id_proyek)
                <span class="badge badge-primary">{{$skillprr->nama_skill}}</span>
              @endif
            @endforeach
          </div>
        </div>
      </div>
      @endforeach
      @foreach($pyk as $pyk)
      <!-- CARD -->
      <div class="mx-1" >
        <div class="card" style="margin-top:10px;">
          <div class="card-header" >
            <div class="row">
            <div class="col">
                <h5> {{$pyk->nama_proyek}}</h5>
            </div>
            <div class="col">
            </div>
          </div>
          </div>
          <div class="card-body">
            <p class="card-text">{{$pyk->definisi}}</p>
            <a><b>Deadline    :</b></a>
            <a style="font-size: 20px;">{{$pyk->deadline}} </a> <br>
            <a><b>Imbalan    :</b></a>
            <a style="font-size: 20px;">Rp. {{$pyk->imbalan}}</a> <br>
            @foreach($skillpr as $skillprr)
              @if ($skillprr->id_proyek === $pyk->id_proyek)
                <span class="badge badge-primary">{{$skillprr->nama_skill}}</span>
              @endif
            @endforeach
          </div>
        </div>
      </div>
      @endforeach
      <!-- CARDEND -->
    </div>
  </div>
</div>
@endsection
