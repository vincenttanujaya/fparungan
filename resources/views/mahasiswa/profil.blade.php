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
        <div class="card-header" style="background-color: purple; color:white;">
          <div class="row">
              <a class="mx-auto" style="font-size:20px; margin-top:5px;"> PENGALAMAN ANDA :   </a><br>
              <div class="container">
              @foreach($nama_proyek as $nama_proyek)
                <a>{{$nama_proyek->nama}}</a>
              @endforeach
            </div>
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
    <div class="container">
      <div class="text-center my-5">
      <img src="{{url('/img/profil/default.png')}}" style="width: 23%;border:1px solid #717171;" alt="..." class="rounded-circle">
      <h4 class="my-2" id="username" style="color: #737373">@<a>{{$propil->username}}</a></h4>
      <h2 id="nama user"><b>{{$propil->nama_depan}} {{$propil->nama_belakang}} </b></h2>
    </div>
    </div>
    <div class="container" style="margin-top: -2%">
      <div class="row text-center">
        <div class="form-group mx-auto">
        <div class="row text-center">
        <label for="disabledTextInput">Email</label>
        <input class="form-control" id="disabledInput" type="text" placeholder="{{$propil->email}}" disabled>
      </div>
      <div class="row text-center my-2">
        <label for="disabledTextInput">No Handphone</label>
        <input class="form-control" id="disabledInput" type="text" placeholder="{{$propil->no_hp}}" disabled>
      </div>
      <div class="row text-center my-2">
        <label for="disabledTextInput">Universitas</label>
        <input class="form-control" id="disabledInput" type="text" placeholder="{{$propil->nama_universitas}}" disabled>
      </div>
      <div class="row text-center">
        <label for="disabledTextInput">Tanggal Lahir</label>
        <input class="form-control" id="disabledInput" type="text" placeholder="{{$propil->tanggal_lahir}}" disabled>
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection
