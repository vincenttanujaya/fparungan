<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Arungan</title>
        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/welcome.css">
    </head>
    <body>
        <div class="row">
          <div class="col">
            <a class="btn btn-link"  onclick="document.querySelector('#aboutus').scrollIntoView({ behavior: 'smooth'});"id="tentangkami">About Us</a>
          </div>
          <div class="col">
          </div>
          <div class="col" id="login">
            <a class="btn btn-link" href="{{url('/login')}}" id="logiin">Login</a>
          </div>
        </div>

        <div class="container-fluid" id="atas">
            <img id="logobesar"src="{{url('img/logo.png')}}" class="logo" alt="Logo">
            <img id="logobesar2"src="{{url('img/logo2.png')}}" class="logo" alt="Logo">
        </div>


        <div class="container-fluid" id="aboutus">
            <div class="row">
              <div class="col-sm">
              </div>
              <div class="col-sm my-5">
                <div class="jumbotron jumbotron-fluid">
                  <div class="container" id="definisi">
                    <br>
                    <p class="lead">"Arungan merupakan sebuah website yang bertujuan untuk memfasilitasi para pencari proyek dan juga penyedianya. Disinilah tempat yang tepat untuk menjalankan relasi yang menguntungkan kedua belah pihak."</p>
                      <button type="button" id="btdaftar" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#formdaftar">
                        Daftar Sekarang
                      </button>
                  </div>
                </div>
              </div>
            </div>
            <img src="{{url('img/definisi.png')}}" id="imgdef" alt="...">
        </div>

        <!-- Modal -->
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

        <!-- BOOTSTRAP SCRIPT -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    </body>
</html>
