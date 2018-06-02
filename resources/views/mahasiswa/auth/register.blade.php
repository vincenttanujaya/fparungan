@extends('mahasiswa.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                  <!-- FORMNYA -->
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/mahasiswa/register') }}">
                        {{ csrf_field() }}

                        <!-- NAMADEPAN -->
                        <div class="form-group{{ $errors->has('nama_depan') ? ' has-error' : '' }}">
                            <label for="nama_depan" class="col-md-4 control-label">Nama Depan</label>
                            <div class="col-md-6">
                                <input id="nama_depan" type="text" class="form-control" name="nama_depan" value="{{ old('nama_depan') }}" autofocus>
                                @if ($errors->has('nama_depan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_depan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- NAMABELAKANG -->
                        <div class="form-group{{ $errors->has('nama_belakang') ? ' has-error' : '' }}">
                            <label for="nama_belakang" class="col-md-4 control-label">Nama Belakang</label>
                            <div class="col-md-6">
                                <input id="nama_belakang" type="text" class="form-control" name="nama_belakang" value="{{ old('nama_belakang') }}" autofocus>
                                @if ($errors->has('nama_belakang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_belakang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- USERNAME -->
                        <div class="form-group">
                            <label for="username" class="col-md-4 control-label">Username</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" autofocus>
                            </div>
                        </div>
                        <!-- NO.HP -->
                        <div class="form-group{{ $errors->has('no_hp') ? ' has-error' : '' }}">
                            <label for="no_hp" class="col-md-4 control-label">No. HP</label>
                            <div class="col-md-6">
                                <input id="no_hp" type="text" class="form-control" name="no_hp" value="{{ old('no_hp') }}" autofocus>
                                @if ($errors->has('no_hp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_hp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- TANGGAL LAHIR -->
                        <div class="form-group">
                            <label for="tanggal_lahir" class="col-md-4 control-label">TANGGAL LAHIR</label>
                            <div class="col-md-6">
                                <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" autofocus>
                            </div>
                        </div>

                        <!-- ID_UNIV -->
                        <div class="form-group">
                            <label for="id_univ" class="col-md-4 control-label">UNIV</label>
                            <div class="col-md-6">
                                <input id="id_univ" type="text" class="form-control" name="id_univ" value="{{ old('id_univ') }}" autofocus>
                            </div>
                        </div>


                        <!-- EMAIL -->
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
