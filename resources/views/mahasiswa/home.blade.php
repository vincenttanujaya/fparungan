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

      <div class="card" style="margin-top:10px;">
        <div class="card-header" style="background-color: #ffffff; color:black;">
          <div class="row">
                <a class="mx-4" style="font-size:14px; margin-top:5px;"> Rank Anda: {{$jumlah}} </a><br>
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
      <h5 class="mx-1" style="margin-top:10px;"> Proyek Tersedia </h5>
      <!-- CARD -->
      @foreach($proyek as $proyek)
      <div class="mx-1" >
        <div class="card" style="margin-top:10px;">
          <div class="card-header" >
            <h5> {{$proyek->nama_proyek}}<br><small>{{$proyek->nama_depan}} {{$proyek->nama_belakang}}</small> </h5>
          </div>
          <div class="card-body">
            <p class="card-text">{{$proyek->definisi}}</p>
            <a><b>Deadline    :</b></a>
            <a style="font-size: 20px;">{{$proyek->deadline}} </a> <br>
            <a><b>Imbalan    :</b></a>
            <a style="font-size: 20px;">Rp. {{$proyek->imbalan}}</a> <br>
            <form action="{{url('/mahasiswa/ambil')}}" method="post">
              {{ csrf_field() }}
              <button href="#" class="btn btn-primary float-right" name="ambil" value="{{$proyek->id_proyek}}">Ajukan Penawaran</button>
            </form>
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
