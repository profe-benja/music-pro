<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'MusicPro - La mejor tienda del mundo')</title>
    <link rel="shortcut icon" href="{{ asset('assets/blogooos.png') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

      .bd-mode-toggle {
        z-index: 1500;
      }

      .content {
        margin-top: 70px;
      }

      .cart-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px;
      }

      .offcanvas, .offcanvas-lg, .offcanvas-md, .offcanvas-sm, .offcanvas-xl, .offcanvas-xxl {
        --bs-offcanvas-zindex: 1045;
        --bs-offcanvas-width: 499px;
      }
    </style>
</head>
<body>
  <header data-bs-theme="dark">
      <div class="navbar navbar-dark bg-dark shadow-sm fixed-top">
          <div class="container">
              <a href="#" class="navbar-brand">
                  <img src="{{ asset('assets/blogooos.png') }}" width="50px" alt="">
                  <strong class="ms-3">MUSIC PRO</strong>
              </a>

              <div class="d-flex">
                <button class="btn btn-bd-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                  <i class="bi-cart-fill me-1"></i>
                  {{-- <span class="badge bg-dark text-white ms-1 rounded-pill"> --}}
                    <strong>🛒 $<span id="cart_price_total_original"></span></strong>
                  {{-- </span> --}}
                </button>

                @if (!current_store_user())
                  <a href="{{ route('sucursal.accesocliente') }}" class="btn btn-danger ms-3">Iniciar Sesión 🤘</a>
                @else
                  <div class="dropdown ms-3">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ current_store_user()->correo }}
                    </a>

                    <ul class="dropdown-menu">
                      {{-- <li><a class="dropdown-item" href="#">Action</a></li> --}}
                      {{-- <li><a class="dropdown-item" href="#">Another action</a></li> --}}
                      {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                      <li class="text-center">
                        <a href="{{ route('logout') }}" class="btn btn-danger">Cerrar Sesión 🤘</a>
                      </li>
                    </ul>
                  </div>
                @endif
              </div>
          </div>
      </div>
  </header>

  <div class="content">
    <div id="carouselExample" class="carousel slide">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ asset('assets/banner/1.png') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('assets/banner/2.png') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('assets/banner/3.png') }}" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <div class="album py-5 bg-body-tertiary">
      <div class="container">
        <div class="row">
          @foreach ($productos as $p)
            <div class="col-6 col-md-4 col-lg-2 mb-2">
              <div class="card shadow-sm align-self-stretch" id="product-{{ $p->codigo }}" data-id="{{ $p->id }}" data-code="{{ $p->codigo }}" data-precio={{ $p->precio }} data-info='@json($p->getRawInfo())'>
                <img src="{{ asset($p->present()->getImagen()) }}" width="120px" class="bd-placeholder-img card-img-top" alt="">
                <div class="card-body">
                  <p class="card-text">{{ $p->nombre }}</p>
                  <p class="card-text text-danger fw-bold">${{ $p->getPrecio() }}</p>


                  <div class="d-grid gap-2">
                    {{-- <button class="btn btn-dark btn-sm" type="button">
                      Comprar
                    </button> --}}
                    <button id="btn_cart" class="btn btn-dark btn-sm btn_cart" data-id="{{ $p->id }}" data-code="{{ $p->codigo }}">
                      <i class="fas fa-cart-plus me-2"></i>
                      Comprar
                    </button>
                    {{-- <button id="btn_cart_open" class="btn btn-success btn-long btn-lg" data-id="{{ $p->id }}" data-code="{{ $p->codigo }}"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="">
                      <i class="bi-cart-fill text-white"></i>
                      Ver carrito
                    </button> --}}
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasRightLabel">
        <i class="bi-cart-fill me-2"></i>
        Carrito de pedido
      </h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th></th>
          </tr>
        </thead>
        <tbody id="cart_body">
        </tbody>
      </table>
    </div>
    <div class="offcanvas-footer mb-3">
      <div class="d-grid gap-2">
        <button class="btn btn-success btn-lg mx-2" disabled type="button" id="button_pay">
          <i class="bi bi-whatsapp"></i>
          Envía el pedido por Whatsapp $<strong><span id="cart_price_total_one">0</span></strong>
        </button>

        @if (current_store_user())
          <a class="btn btn-primary btn-lg mx-2" href="{{ route('sucursal.pago') }}" >
            <strong>PAGAR</strong>
          </a>
        @else
          <a class="btn btn-primary btn-lg mx-2" href="{{ route('sucursal.acceso') }}" >
            <strong>INICIAR SESIÓN</strong>
          </a>
        @endif
      </div>
    </div>
  </div>



  <div id="musicpro_number_request" data-product-find="{{ route('api.v1.product.find') }}" data-phone="56994891197"></div>
  {{-- <footer class="text-body-secondary py-5">
    <div class="container">
      <p class="float-end mb-1">
        <a href="#">Back to top</a>
      </p>
      <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
      <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/5.3/getting-started/introduction/">getting started guide</a>.</p>
    </div>
  </footer> --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/currency.js@~1.2.0/dist/currency.min.js"></script>
  <script>





class Carrito {
  constructor(clave) {
    this.clave = clave || "productos";
    this.productos = this.all();
  }

  add(producto) {
    if (!this.find(producto.id)) {
      this.productos.push({...producto, cantidad: 1});
      this.save();
    } else {
      this.update(producto.id, this.find(producto.id).cantidad + 1);
    }
  }

  remove(id) {
    const indice = this.productos.findIndex(p => p.id === id);
    if (indice != -1) {
      this.productos.splice(indice, 1);
      this.save();
    }
  }

  update(id, cantidad) {
    const producto = this.find(id);
    if (producto) {
      producto.cantidad = cantidad;
      this.save();
    }
  }

  save() {
    localStorage.setItem(this.clave, JSON.stringify(this.productos));
  }

  all() {
    const productosCodificados = localStorage.getItem(this.clave);
    return JSON.parse(productosCodificados) || [];
  }

  find(id) {
    return this.productos.find(producto => producto.id === id);
  }

  count() {
    return this.productos.length;
  }

  reset() {
    localStorage.clear();
  }
}

class WhatsappPhone {
  constructor(phone, message) {
    this.phone = phone;
    this.message = message;
  }

  mobilecheck() {
    var check = false;
    (function(a) { if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true; })(navigator.userAgent || navigator.vendor || window.opera);
    return check;
  }

  send() {
    var apilink = 'http://';
    apilink += this.mobilecheck() ? 'api' : 'web';
    apilink += '.whatsapp.com/send?phone=' + this.phone + '&text=' + encodeURI(this.message);
    window.open(apilink);
  }
}

const c = new Carrito();

function findProduct(data) {
  var rawrshop = document.getElementById('musicpro_number_request');
  fetch(rawrshop.dataset.productFind, {
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      method: 'POST',
      body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(function(resp) {
      if (resp.status == 200) {
        c.add(resp.result.product);
        loadTable();
      }
    })
    .catch(function(error) {
      console.log(error);
    });
}

function loadTable() {
  var productos = c.all();
  var total = 0;
  var format = {
    precision: 0,
    decimal: ',',
    separator: '.',
  }
  $("#btn_cart_open").hide();
  $("#btn_cart").show();

  $("#cart_body").html("");
  for (var i = 0; i < productos.length; i++) {
    total += productos[i].precio_raw * productos[i].cantidad;
    var tr = `<tr>
        <td>
          <div class="row g-0">
            <div class="col-md-4">
              <img src="${productos[i].asset}" class="img-fluid" alt="Imagen del producto">
            </div>
            <div class="col-md-8">
              <div class="card-body ms-2">
                <small><strong>${productos[i].nombre}</strong></small><br>
                <small class="card-text fw-bold text-danger">Un: ${productos[i].cantidad}</small><br>
                <small style="font-size='2px;'">$${currency(productos[i].precio_raw, format).format()}</small>
                </div>
            </div>
          </div>
        </td>
        <td class="text-end">$${currency(productos[i].precio_raw * productos[i].cantidad, format).format()}</td>
        <td>
          <button class="btn btn-outline-danger delete_cart" id="delete_cart" data-id="${productos[i].id}">
            <i class="fa fa-trash text-danger"></i>
          </button>
        </td>
      </tr>`;
    $("#cart_body").append(tr);

    blockedButton(productos[i]);
  }

  $("#cart_price_total_one").html(currency(total, format).format());
  $("#cart_price_total_two").html(currency(total, format).format());
  $("#cart_price_total_original").html(currency(total, format).format());

  $("#button_pay").attr("disabled", true);
  if (total > 0) {
    $("#button_pay").removeAttr("disabled");
  }
}

function blockedButton(prod) {
  let button_id = $("#btn_cart_open").data("id");
  if (button_id == prod.id) {
    $("#btn_cart_open").show();
    $("#btn_cart").hide();
  }
}

$(".btn_cart").click(function() {
  let data = {
    id: parseInt($(this).data("id")),
    code: $(this).data("code")
  }
  findProduct(data);
});

loadTable();

$(document).on('click', '.delete_cart', function() {
  let id = parseInt($(this).data("id"));
  c.remove(id);
  loadTable();
});

$(document).on('click', '#button_pay', function() {
  var rawrshop = document.getElementById('musicpro_number_request');
  var productos = c.all();
  var total = 0;
  var format = {
    precision: 0,
    decimal: ',',
    separator: '.',
  }
  let m = "¡Hola! Te envío mi pedido:\n\n";
  for (var i = 0; i < productos.length; i++) {
    total += productos[i].precio_raw * productos[i].cantidad;
    m += "*"+productos[i].cantidad+"* *unidad(es)* - *Código: " + productos[i].codigo + "* - Precio: $" + currency(productos[i].precio_raw, format).format() + " " + productos[i].nombre + " - Total: $"+currency(productos[i].precio_raw * productos[i].cantidad, format).format()+"\n\n";
  }
  m += `*TOTAL $` + currency(total, format).format() + `*`;
  // c.reset();
  // loadTable();

  const Wp = new WhatsappPhone(rawrshop.dataset.phone, m);
  Wp.send();
});


  </script>
</body>
</html>
