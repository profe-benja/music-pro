<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'MusicPro - La mejor tienda del mundo')</title>
  <link rel="shortcut icon" href="{{ asset('assets/tarjeta/beatpaylogo.svg') }}" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
  @laravelPWA
  <style>
      .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
      }

      @media (min-width: 768px) {
          .bd-placeholder-img-lg {
              font-size: 3.5rem;
          }
      }

      .b-example-divider {
          width: 100%;
          height: 3rem;
          background-color: rgba(0, 0, 0, .1);
          border: solid rgba(0, 0, 0, .15);
          border-width: 1px 0;
          box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
          flex-shrink: 0;
          width: 1.5rem;
          height: 100vh;
      }

      .bi {
          vertical-align: -.125em;
          fill: currentColor;
      }

      .nav-scroller {
          position: relative;
          z-index: 2;
          height: 2.75rem;
          overflow-y: hidden;
      }

      .nav-scroller .nav {
          display: flex;
          flex-wrap: nowrap;
          padding-bottom: 1rem;
          margin-top: -1px;
          overflow-x: auto;
          text-align: center;
          white-space: nowrap;
          -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
          --bd-violet-bg: #712cf9;
          --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

          --bs-btn-font-weight: 600;
          --bs-btn-color: var(--bs-white);
          --bs-btn-bg: var(--bd-violet-bg);
          --bs-btn-border-color: var(--bd-violet-bg);
          --bs-btn-hover-color: var(--bs-white);
          --bs-btn-hover-bg: #6528e0;
          --bs-btn-hover-border-color: #6528e0;
          --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
          --bs-btn-active-color: var(--bs-btn-hover-color);
          --bs-btn-active-bg: #5a23c8;
          --bs-btn-active-border-color: #5a23c8;
      }

      html {
          background: rgb(140, 82, 255);
          background: linear-gradient(90deg, rgba(140, 82, 255, 1) 0%, rgba(92, 225, 230, 1) 100%);
      }

      .bg-woow {
          background: rgb(140, 82, 255);
          background: linear-gradient(90deg, rgba(140, 82, 255, 1) 0%, rgba(92, 225, 230, 1) 100%);
      }

      .bg-woow2 {
          background: rgb(140, 82, 255);
          background: linear-gradient(90deg, rgba(140, 82, 255, 1) 0%, rgba(221, 92, 230, 1) 100%);
      }

      .bg-woow3 {
          background: rgb(227, 101, 255);
          background: linear-gradient(0deg, rgba(227, 101, 255, 1) 0%, rgba(0, 0, 0, 1) 100%);
      }

      .bg-woow4 {
        background: rgb(140,82,255);
        background: linear-gradient(90deg, rgba(140,82,255,1) 0%, rgba(80,30,84,1) 100%);
      }

      .nav-pills .nav-link.active,
      .nav-pills .show>.nav-link {
          color: var(--bs-nav-pills-link-active-color);
          background-color: rgb(140, 82, 255);
      }

      .bd-mode-toggle {
          z-index: 1500;
      }

      .content {
          margin-top: 65px;
      }

      .cart-item {
          display: flex;
          align-items: center;
          justify-content: space-between;
          margin-bottom: 10px;
      }

      .offcanvas,
      .offcanvas-lg,
      .offcanvas-md,
      .offcanvas-sm,
      .offcanvas-xl,
      .offcanvas-xxl {
          --bs-offcanvas-zindex: 1045;
          --bs-offcanvas-width: 499px;
      }

      @import url('https://fonts.googleapis.com/css?family=Barlow|Major+Mono+Display&display=swap');

      body {
          background-color: rgb(250, 250, 250);
      }

      * {
          box-sizing: border-box;
          margin: 0px;
          padding: 0px;
      }

      .font-barlow-sc {
          font-family: 'Barlow', cursive;
      }

      .font-number {
          font-family: 'Major Mono Display', monospace;
      }

      .p-30 {
          padding: 30px;
      }

      .mt-30 {
          margin-top: 30px;
      }

      .credit-card {
          box-sizing: content-box;
          /* width: 350px; */
          height: 190px;
          background: url("{{ asset('assets/tarjeta/card/verticalpurple.png') }}");
          background-size: cover;
          border-radius: 15px;
          padding: 30px;
          /* -webkit-box-shadow: 0px 5px 30px 0px rgba(111,111,111,0.3); */
          /* -moz-box-shadow: 0px 5px 30px 0px rgba(111,111,111,0.3); */
          /* box-shadow: 0px 5px 30px 0px rgba(111,111,111,0.3); */
          position: relative;
          z-index: 1;
      }

      .logo-visa {
          height: 20px;
      }

      .text-uppercase {
          text-transform: uppercase;
      }

      .text-white {
          color: rgb(255, 255, 255);
      }

      .text-blue {
          color: rgb(37, 92, 190);
      }

      .text-gray {
          color: rgb(126, 126, 126);
      }

      .text-right {
          text-align: right;
      }

      .text-center {
          text-align: center;
      }

      .d-none {
          display: none;
      }

      .d-flex {
          display: flex;
      }

      .flex-column {
          flex-direction: column;
      }

      .justify-content-between {
          justify-content: space-between;
      }

      .m-auto {
          margin: auto;
      }

      .size-card-info {
          font-size: 0.55rem;
          letter-spacing: 0.2rem;
          line-height: 1rem;
      }

      .size-card-user {
          font-size: 1rem;
      }

      .size-card-number {
          font-size: 1.8rem;
      }
  </style>
  @stack('stylesheet')
</head>
<body>
  <div class="app">
      @yield('app')
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  @stack('javascript')
</body>
</html>
