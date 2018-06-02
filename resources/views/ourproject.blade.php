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
        <div class="container text-center">

          <form action="" class="my-3" method="get">
            {{ csrf_field() }}
            <div class="input-group">
              <select class="custom-select" id="inputGroupSelect04" name="bulan">
                <option selected> Pilih Bulan </option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Button</button>
              </div>
            </div>
          </form>

          <div class="container">
            <table class="table table-bordered table-dark">
              <thead>
                <tr>
                  <th scope="col">Nama Mahasiswa</th>
                  <th scope="col">Nama Proyek</th>
                  <th scope="col">Definisi</th>
                  <th scope="col">Imbalan</th>
                </tr>
              </thead>
              <tbody>
                @foreach($bulan as $bulan)
                <tr>
                  <th scope="row">{{$bulan->nama_depan}} {{$bulan->nama_belakang}}</th>
                  <td>{{$bulan->nama_proyek}}</td>
                  <td>{{$bulan->definisi}}</td>
                  <td>{{$bulan->imbalan}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

        </div>


        <!-- BOOTSTRAP SCRIPT -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    </body>
</html>
