@extends('mahasiswa.layout.navmahasiswa')

@section('content')
<div class="container-fluid" id="home_mahasiswa">
  <div class="row">
    <div class="col-3">

      <div class="card" style="margin-top:10px;">
        <div class="card-header" style="background-color: #ffffff; color:black;">
          <div class="row">
                <a class="mx-4" style="font-size:14px; margin-top:5px;"> Rank Anda: </a><br>
                <img src="/img/{{$warna}}" class="mx-3" style="width: 80%; height: 80px; margin-right:20px;">
            </div>
          </div>
      </div>
      <!-- SKILL -->
      <div class="card" style="margin-top:10px;">
        <div class="card-header" style="background-color:#382468;color:white;">
          <h5>Skill Anda</h5>
        </div>
        <div class="card-body" style="overflow: auto; max-height: 200px;">
          @foreach($myskill as $myskill)
          <form method="post" action="{{url('/mahasiswa/hapusskill')}}" >
            {{ csrf_field() }}
            <div class="row">
              <div class="col-7 text-center">
                <input class="form-control-plaintext float-right" type="text"  placeholder="" name="id" value="{{$myskill->nama_skill}}" readonly>
              </div>
              <div class="col-5">
                <button type="submit" class="btn btn-danger mb-2 btn-sm" name"tombol" value="{{$myskill->nama_skill}}" >Hapus</button>
              </div>
            </div>
          </form>
          @endforeach
        </div>
        <div class="card-footer text-muted">
          <form method="post" action="{{url('/mahasiswa/tambahskill')}}">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-7">
                <select class="form-control"  name="pilih">
                  @foreach($skill as $skill)
                    <option value="{{$skill->id_skill}}" name="pilih">{{$skill->nama_skill}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-5">
                <button type="submit" class="btn btn-primary mb-2">Tambah</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- END SKILL -->




    </div>
    <div class="col-9" id="tempatproyek">
      <h5 class="mx-1" style="margin-top:10px;"> Proyek Saya </h5>
      <!-- CARD -->
      @foreach($proyek as $proyek)
      <div class="mx-1" >
        <div class="card" style="margin-top:10px;">
          <div class="card-header" >
            <div class="row">
              <div class="col-8">
                  <h5> {{$proyek->nama_proyek}}<br><small>{{$proyek->nama_depan}} {{$proyek->nama_belakang}}</small> </h5>
              </div>
              <div class="col">
                @if($proyek->status_apply===0)
                  <button type="button" class="btn btn-secondary float-right" disabled>Menunggu Konfirmasi</button>
                @elseif($proyek->status_apply===1)
                  <button type="button" class="btn btn-success float-right" disabled>Diterima</button>
                @elseif($proyek->status_apply===2)
                  <button type="button" class="btn btn-danger float-right" disabled>Ditolak</button>
                @elseif($proyek->status_apply===3)
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
            @if($proyek->status_apply===0)
              <form action="{{url('/mahasiswa/hapusproyek')}}" method="post">
                {{ csrf_field() }}
                <button href="#" class="btn btn-danger float-right" name="id" value="{{$proyek->id_proyek}}">Batalkan</button>
              </form>
            @elseif($proyek->status_apply===1)
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Hubungi Penyedia</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{$proyek->nama_depan}} {{$proyek->nama_belakang}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <b> Email: </b> {{$proyek->email}}
                        <br>
                        <b> No Handphone: </b> {{$proyek->no_hp}}
                      </div>
                    </div>
                  </div>
                </div>

            @elseif($proyek->status_apply===2)
              <form action="{{url('/mahasiswa/hapusproyek')}}" method="post">
                {{ csrf_field() }}
                <button href="#" class="btn btn-danger float-right" name="id" value="{{$proyek->id_proyek}}">Hapus</button>
              </form>
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
      <!-- CARDEND -->
    </div>
  </div>
</div>
@endsection
