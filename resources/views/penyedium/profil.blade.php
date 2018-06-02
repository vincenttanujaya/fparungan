@extends('penyedium.layout.navpenyedia')

@section('content')

<div class="container-fluid" id="home_mahasiswa">
  <div class="row">
    <div class="col-4">
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
    <div class="container">
      <div class="text-center my-5">
      <img src="{{url('/img/profil/default.png')}}" style="width: 23%;border:1px solid #717171;" alt="..." class="rounded-circle">
      <h4 class="my-2" id="username" style="color: #737373">@<a>{{$penyedia->username}}</a></h4>
      <h2 id="nama user"><b>{{$penyedia->nama_depan}} {{$penyedia->nama_belakang}} </b></h2>
    </div>
    </div>
    <div class="container" style="margin-top: -2%">
      <div class="row text-center">
        <div class="form-group mx-auto">
        <div class="row text-center">
        <label for="disabledTextInput">Email</label>
        <input class="form-control" id="disabledInput" type="text" placeholder="{{$penyedia->email}}" disabled>
      </div>
      <div class="row text-center my-2">
        <label for="disabledTextInput">No Handphone</label>
        <input class="form-control" id="disabledInput" type="text" placeholder="{{$penyedia->no_hp}}" disabled>
      </div>
        </div>
      </div>
    </div>
  </div>
@endsection
