@php

    $nombre = '';
    $direccion = '';

    if (current_store_user()) {
        $nombre = current_store_user()->nombre;
        $direccion = current_store_user()->direccion;
    }

@endphp
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
        margin-top: 90px;
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
    <div class="container">
      <div class="row">

        <div class="col-md-5">
          <div class="card">
            <img class="card-img-top" src="holder.js/100px180/" alt="">
            <div class="card-body">
              <h4 class="card-title">Detalle del cliente</h4>
              <p class="card-text">Ingrese sus datos para enviar el producto a su domicilio</p>
              <p class="text-primary">Por la compra de cualquiera de nuestro producto su despacho es totalmente <strong>GRATIS</strong></p>
              <form action="{{ route('sucursal.pago.store') }}" method="POST">
                @csrf
                <input type="hidden" name="listaproductos" id="listaproductos">
                <div class="row">
                    <div class="col-md-12 mb-3">
                      <div class="form-group row">
                        <label class="col-md-4" for="nombre">Nombre <small class="text-danger">*</small></label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $nombre }}" required/>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12 mb-3">
                      <div class="form-group row">
                        <label for="direccion" class="col-md-4">Dirección <small class="text-danger">*</small></label>
                        <div class="col-md-8">
                          <textarea class="form-control" id="direccion" name="direccion" rows="3" required>{{ $direccion }}</textarea>
                        </div>
                      </div>
                    </div>


                    <div class="col-md-12 mb-3">
                      <div class="form-group row">
                        <label for="direccion" class="col-md-4">Medio de pago <small class="text-danger">*</small></label>
                        <div class="col-md-8">
                          <select class="form-select form-select-lg" name="pago" id="pago">
                            @foreach ($tarjetas as $t)
                              <option value="{{ $t->code }}">{{ $t->nombre }}</option>
                            @endforeach
                            <option disabled>BANCO ESTADO</option>
                            <option disabled>KIPHU</option>
                            <option disabled>SANTANDER</option>
                          </select>
                        </div>
                      </div>
                    </div>


                    <div class="d-grid gap-2">
                      <button class="btn btn-primary btn-lg mx-2" type="submit">
                        <strong>PAGAR</strong>  $<strong><span id="cart_price_total_one">0</span></strong>
                      </button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Listado de compras</h4>
              {{-- <p class="card-text">Text</p> --}}
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
              {{-- $<strong><span id="cart_price_total_one">0</span> --}}

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

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

const c = new Carrito();

function obtenerInformacionProductos(data) {
  var productos = JSON.parse(data);
  var resultado = [];

  for (var i = 0; i < productos.length; i++) {
    var id_producto = productos[i].id;
    var precio = productos[i].precio;
    var cantidad = productos[i].cantidad;

    resultado.push({ id: id_producto, precio: precio, cantidad: cantidad });
  }

  return resultado;
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

  listaproductos.value = JSON.stringify(obtenerInformacionProductos(JSON.stringify(productos)));


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
  }

  $("#cart_price_total_one").html(currency(total, format).format());
  // $("#cart_price_total_two").html(currency(total, format).format());
  // $("#cart_price_total_original").html(currency(total, format).format());
}




loadTable();



  </script>
</body>
</html>
