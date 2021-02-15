<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}" type="text/css">
    <title>Business casual</title>
    </head>
  <body >
      <div class="container-fluid bg-dimm-25">
          <div id="header-row" class="row">
              <div class="col-12 text-center my-5">
                  <h1 class="text-white display-4 font-weight-bold">BUSINESS CASUAL</h1>
              </div>
              <div class="col-12 p-0">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dimm-98">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto ml-auto">
                        <li class="nav-item">
                          <a class="nav-link h5" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link h5 active text-warning" href="/login">Log in</a>
                        </li>
                        @if(session()->has('loggedinUser'))
                        <li class="nav-item">
                          <a class="nav-link h5" href="/logout">Log out</a>
                        </li>
                        @endif
                    </ul>
                    </div>
                  </nav>
              </div>
          </div>
          <div id="body-row" class="row">
           <div class="col-12 py-5 my-5">
             <div class="container py-5">
               <div class="row">
                 <div class="col-12 text-white py-5 my-5">
                   <h3 class="pb-3">Your name is: {{ session()->get('loggedinUser')['firstname'] }}</h3>
                   <h3 class="pb-3">Your surname: is {{ session()->get('loggedinUser')['lastname'] }}</h3>
                   <h3 class="pb-5">
                     @if(session()->get('loggedinUser')['email']) 
                        Your email is: {{ session()->get('loggedinUser')['email'] }}
                     @endif
                    </h3>
                 </div>
               </div>
             </div>
           </div>
          </div>

          <div id="footer-row" class="row bg-dimm-98">
            <div class="col-12 text-center text-light py-3">
              Copyright &copy; Your Website 2021
            </div>
          </div>
      </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> --}}

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>