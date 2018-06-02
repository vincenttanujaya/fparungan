<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel Multi Auth Guard') }}</title>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/custom.css">
  </head>
  <body id="backgrounddalam">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="box-shadow: 1px 1px 5px;background-color: ;z-index:100;">
      @if (Auth::guest())
          <li><a href="{{ url('/penyedium/login') }}">Login</a></li>
          <li><a href="{{ url('/penyedium/register') }}">Register</a></li>
      @else
      <a class="navbar-brand" href="#"><img class="mx-auto" src="{{url('/img/logo2.png')}}" style="width: 40px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          @if($aktif==='1')
          <li class="nav-item active">
          @else
          <li class="nav-item">
          @endif
            <a class="nav-link mx-2" href="{{url('/mahasiswa/home')}}">Home <span class="sr-only">(current)</span></a>
          </li>
          @if($aktif==='2')
          <li class="nav-item active">
          @else
          <li class="nav-item">
          @endif
            <a class="nav-link mx-2" href="{{url('/mahasiswa/profil')}}">Profil </a>
          </li>
          @if($aktif==='3')
          <li class="nav-item active">
          @else
          <li class="nav-item">
          @endif
            <a class="nav-link mx-2" href="{{url('/mahasiswa/proyek')}}">Proyek Saya <span class="badge badge-light"> {{$jumlah}}</span> </a>
          </li>
        </ul>
        <span class="navbar-text" >
          <a href="{{ url('/mahasiswa/logout') }}"
              onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();" class="nav-link" >
              Logout
          </a>

          <form id="logout-form" action="{{ url('/mahasiswa/logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </span>
      </div>
      @endif
    </nav>
    @yield('content')
    <script src="/js/app.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>+
  </body>
</html>
