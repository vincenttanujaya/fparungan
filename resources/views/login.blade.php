<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <title>Arungan | Login</title>
  </head>
  <body>
    <div class="text-center">
  		<img src="{{url('img/logoarungan.png')}}" class="rounded" alt="logo" width="27%">
	</div>
	<div class="text-center">
		<a href=""></a>
	</div><!--
	<div class="text-center">
		<div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
  			<a href="#" class="btn btn-outline-primary"> Mahasiswa</a>
  			<a href="#" class="btn btn-outline-primary"> Penyedia</a>
		</div>
	</div> -->
	<form method="POST" action="{{url('/mahasiswa/login')}}" id="loginlogin">
    {{ csrf_field() }}
		<div class="container" id="loginstuff">
      <div class="row">
          <select class="form-control mx-auto" id="peran">
            <option value="mahasiswa" >Mahasiswa</option>
            <option value="penyedium" >Penyedia</option>
          </select>
        </div>
        <!-- NAMA -->
      <div class="row my-3">
        <input type="email" class="form-control mx-auto" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email" value="{{ old('email') }}" autofocus>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      <!-- PASS -->
      <div class="row my-3">
        <input type="password" class="form-control mx-auto" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password" name="password" >
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
    </div>
    <div class="text-center my-3">
      <button type="submit" class="btn btn-primary btn-lg">
        Login
      </button>
    </div>
  </form>



  <div class="text-center">
    <button type="button" id="btdaftar" class="btn btn-outline-primary"  data-toggle="modal" data-target="#formdaftar">
    Buat akun sekarang!
    </button>
  </div>

  <div class="modal fade" id="formdaftar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Ayo Daftar</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <ul class="nav nav-tabs " role="tablist">
              <li class="nav-item mx-1">
                <a class="btn btn-primary" href="#mahasiswa" role="tab" data-toggle="tab">Mahasiswa</a>
              </li>
              <li class="nav-item">
                <a class="btn btn-primary" href="#buzz" role="tab" data-toggle="tab">Penyedia</a>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane" id="mahasiswa">

                <!-- FORM REGISTER MAHASISWA -->
                <form method="POST" role="form" action="{{ url('/mahasiswa/register') }}">
                  {{ csrf_field() }}
                  <!-- NAMADEPAN -->
                  <div class="form-group" id="apa">
                    <input id="nama_depan" type="text" class="form-control" name="nama_depan" value="{{ old('nama_depan') }}" autofocus placeholder="Nama Depan">
                    @if ($errors->has('nama_depan'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nama_depan') }}</strong>
                        </span>
                    @endif
                  </div>

                  <!-- NAMABELAKANG -->
                  <div class="form-group">
                    <input id="nama_belakang" type="text" class="form-control" name="nama_belakang" value="{{ old('nama_belakang') }}" autofocus placeholder="Nama Belakang">
                    @if ($errors->has('nama_belakang'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nama_belakang') }}</strong>
                        </span>
                    @endif
                  </div>
                  <!-- EMAIL -->
                  <div class="form-group">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>
                  <!-- HP -->
                  <div class="form-group">
                    <input id="no_hp" type="text" class="form-control" name="no_hp" value="{{ old('no_hp') }}" autofocus placeholder="No. HP">
                    @if ($errors->has('no_hp'))
                        <span class="help-block">
                            <strong>{{ $errors->first('no_hp') }}</strong>
                        </span>
                    @endif
                  </div>
                  <!-- USERNAME -->
                  <div class="form-group">
                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" autofocus placeholder="Username">
                  </div>
                  <!-- PASSWORD -->
                  <div class="form-group">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
                  <!-- PASSWORD CONFIRM -->
                  <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                  </div>
                  <!-- TANGGAL LAHIR -->
                  <div class="form-group">
                    <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" autofocus>
                    <small>Tanggal Lahir</small>
                  </div>
                  <!-- UNIV -->
                  <div class="form-group">
                    <select id="id_univ" class="form-control" name="id_univ">
                      <option value="">Pilih univ kamu ...</option>
                      @foreach($univ as $univ)
                        <option value="{{$univ->id_universitas}}">{{$univ->nama_universitas}}</option>
                      @endforeach
                    </select>
                  </div>
                  <button type="submit"  class="btn btn-primary">Daftar</button>
                </form>

              </div>
              <div role="tabpanel" class="tab-pane fade" id="buzz">
                <!-- FORM PENYEDIA -->
                <form method="POST" action="{{ url('/penyedium/register') }}">
                  {{ csrf_field() }}
                  <!-- namadepan -->
                  <div class="form-group" id="apa">
                    <input id="nama_depan" type="text" class="form-control" name="nama_depan" value="{{ old('nama_depan') }}" autofocus placeholder="Nama_Depan">
                    @if ($errors->has('nama_depan'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nama_depan') }}</strong>
                        </span>
                    @endif
                  </div>
                  <!-- namabelakang -->
                  <div class="form-group">
                    <input id="nama_belakang" type="text" class="form-control" name="nama_belakang" value="{{ old('nama_belakang') }}" autofocusc placeholder="Nama Belakang" >
                    @if ($errors->has('nama_belakang'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nama_belakang') }}</strong>
                        </span>
                    @endif
                  </div>
                  <!-- username -->
                  <div class="form-group">
                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" autofocus placeholder="Username">
                  </div>
                  <!-- email -->
                  <div class="form-group">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>
                  <!-- hp -->
                  <div class="form-group">
                    <input id="no_hp" type="text" class="form-control" name="no_hp" value="{{ old('no_hp') }}" autofocus placeholder="No. HP">
                    @if ($errors->has('no_hp'))
                        <span class="help-block">
                            <strong>{{ $errors->first('no_hp') }}</strong>
                        </span>
                    @endif
                  </div>
                  <!-- password -->
                  <div class="form-group">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
                  <!-- passwordconfirm -->
                  <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                  </div>
                  <button type="submit"  class="btn btn-primary">Daftar</button>
                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
      $('#peran').change(function () {
        $('#loginlogin').attr('action', '/' + $('#peran').val() + '/login');
      });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
