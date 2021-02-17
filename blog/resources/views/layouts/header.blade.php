<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  <!-- Custom Fonts needed -->
  <!-- Ubuntu, san-serif-->
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet" />
  <!-- Vira Code, monospace -->
  <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>

  <title>Blog | @yield('title')</title>
  <style>
      body {
          font-family:Verdana, Geneva, Tahoma, sans-serif;
      }

      #header-wrapper {
          /* Background image */
          height: 50vh;
          /* @yield('image') */
          background-image: url({{ @asset('/assets/img/' . Route::currentRouteName() .'-bg.jpg') }});
          background-repeat: no-repeat;
          background-size: cover;
          background-position: center;
      }

      .bg-black-dimm-50 {
          background-color: rgba(0,0,0,0.50);
      }

      .height-100 {
        height: 100%;
      }

      .jumbutron {
          height:85%;
          /* display: flex;
          justify-content: center;
          align-items: center */
      }

      .text-white-dimm-50 {
          color: rgb(247, 247, 247);
          opacity: 0.8;
      }

      .social-link {
          color: black;
          text-decoration: none;
      }

      .social-link:hover {
          color: black;
          opacity: 0.75;
      }

      .simple-link {
          color: black;
      }
      .simple-link:hover {
          color: black;
          opacity: 0.75;
      }

      .btn-custom {
          background-color: #17A2B8;
          color: white;
          border-radius: 0;
      }

      .form-control {
        border: none;
        border-bottom: 1px solid lightgray;
        border-radius: 0;
        padding: 15px 10px;
        box-shadow: none;
      }

      .form-control:focus {
            color: #212529;
            background-color: #fff;
            border-color: #fff;
            /* outline: 0; */
            box-shadow: 0px 5px 3px 0px rgba(219, 219, 219, 0.25);
      }

  </style>
</head>
<body>
    <div class="container-fluid">
        <div id="header-wrapper" class="row">
            <div class="col-12 bg-black-dimm-50 height-100">
                <div class="container height-100">
                    <div class="row">
                        <div id="navbar-wrapper" class="col-12">
                            <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
                                <div class="container-fluid">
                                  <a class="navbar-brand fw-bold" href="/">Blog</a>
                                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                  </button>
                                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                      <li class="nav-item px-2">
                                        <a class="nav-link text-uppercase fw-bold {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" aria-current="page" href="/">Home</a>
                                      </li>
                                      <li class="nav-item px-2">
                                        <a class="nav-link text-uppercase fw-bold {{ Route::currentRouteName() == 'about' ? 'active' : '' }}" href="/about">About</a>
                                      </li>
                                      <li class="nav-item px-2">
                                        <a class="nav-link text-uppercase fw-bold {{ Route::currentRouteName() == 'post' ? 'active' : '' }}" href="/post">Semple post</a>
                                      </li>
                                      <li class="nav-item px-2">
                                        <a class="nav-link text-uppercase fw-bold {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}" href="/contact">Contact</a>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </nav>
                        </div>
                    </div>
                    <div class="row jumbutron justify-content-center align-items-center">
                        @yield('jumbutron')
                    </div>
                </div>
            </div>
        </div>
    