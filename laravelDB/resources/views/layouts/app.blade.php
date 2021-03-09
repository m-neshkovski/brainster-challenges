<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('./assets/css/app.css') }}">
    <style>
        .baner-row {
            height: 70vh;
            background-image: url("{{ @asset('./assets/img/synthesio-0301.gif') }}");
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
  </head>
  <body>
      {{-- Нав бар --}}
      <div class="container-fluid">
          <div class="row">
              <div class="col-12 px-0">
                <nav class="navbar navbar-expand-lg navbar-light header-bg-color">
                    <div class="container">
                        <a class="navbar-brand text-center d-flex flex-column justify-content-center align-items-center" href="/">
                            <img src="{{ asset('./assets/img/logo_footer_black.png') }}" alt="" width="40px" class="d-block align-top">
                            <div id="logo-text" class="logo-font-size fw-bold">
                                BRAINSTER
                            </div>
                        </a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto fw-bold">
                            @if(session()->get('loggedin') !== NULL && session()->get('loggedin'))
                              <li class="nav-item">
                                <a id="logout" type="button" class="nav-link" href="/admin/logout">Одјави се</a>
                              </li>
                            @else
                              <li class="nav-item">
                                <a class="nav-link" href="https://codepreneurs.brainster.co/" target="_blank">Академија за програмирање</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="https://marketpreneurs.brainster.co/" target="_blank">Академија за маркетинг</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="https://design.brainster.co/" target="_blank">Академија за дизајн</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="https://blog.brainster.co/" target="_blank">Блог</a>
                              </li>
                              <li class="nav-item">
                                <a id="vrabotiModalBtn" type="button" class="nav-link {{ Route::currentRouteName() == 'home.login' ? 'disabled' : '' }}" href="#" data-bs-toggle="modal" data-bs-target="#vrabotiModal">Вработи наши студенти</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="/admin/login">Логирај се</a>
                              </li>
                            @endif
                        </ul>
                      </div>
                    </div>
                  </nav>
                  </div>
              </div>
          </div>
      </div>
    
      <div class="container-fluid">
        {{-- Body of page --}}
        {{-- <div class="row"> --}}
            @yield('body')
        {{-- </div> --}}
        {{-- Footer --}}
        <div class="row bg-light py-3">
            <div class="col-12 text-center d-flex justify-content-center align-items-center">
                <div class="mx-2">Made with <i class="fas custom-heart fa-heart"></i> by</div>
                <div class="mx-2">
                    <a class="text-dark logo-font-size fw-bold d-flex flex-column justify-content-center align-items-center" href="/">
                        <div>
                            <img src="{{ asset('./assets/img/logo_footer_black.png') }}" alt="Logo image" height="40px">
                        </div>
                        <div>
                            BRAINSTER
                        </div>
                    </a>
                </div>
                <div class="mx-2">- <a href="https://www.facebook.com/brainster.co/">Say hi!</a> - Terms</div>
            </div>
        </div>
      </div>

      <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    {{-- Script for modal --}}
    @if ($errors->any())
    <script>
        $(document).ready(function() {
             $('#vrabotiModal').toggleClass('show');
             $('#vrabotiModal').toggleClass('d-block');
             $('#vrabotiModal').removeAttr('aria-hidden');
             $('body').toggleClass('modal-open');

             $(document).on('click', '#vrabotiModalCloseBtn', function() {
              $('body').removeClass('modal-open');
              $('#vrabotiModal').removeClass('show');
              $('#vrabotiModal').removeClass('d-block');
              $('#vrabotiModal').addAttr('aria-hidden', true);
             })
        });
    </script>
    @endif
  </body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js" integrity="sha512-UwcC/iaz5ziHX7V6LjSKaXgCuRRqbTp1QHpbOJ4l1nw2/boCfZ2KlFIqBUA/uRVF0onbREnY9do8rM/uT/ilqw==" crossorigin="anonymous"></script>
</html>