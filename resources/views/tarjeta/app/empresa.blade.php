@extends('layouts.tarjeta_app.app')
@push('stylesheet')
  <style>
      .cursor {
          cursor: pointer;
      }

      .my-custom-scrollbar {
          position: relative;
          height: {{ $isMobile ? '500px' : '440px' }};
          overflow: auto;
      }

      .table-wrapper-scroll-y {
          display: block;
      }

      .mobile-navbar {
          display: none;
      }


      @media (max-width: 767px) {
          .mobile-navbar {
              border-top: 1px solid #6528e0;
              display: flex;
              justify-content: space-between;
              position: fixed;
              bottom: 0;
              left: 0;
              right: 0;
              background-color: #fff;
              /* color: #fff; */
              padding: 2px;
              z-index: 9999;
              box-shadow: #6528e0 0px 0px 10px;
          }

          .navbar-item {
              display: flex;
              flex-direction: column;
              align-items: center;
              /* color: #fff; */
              text-decoration: none;
              width: 100%;
          }

          .navbar-item i {
              margin-bottom: 1px;
          }
      }
  </style>
@endpush
@section('content')
<main class="flex-shrink-0">
  <header>
    <div class="navbar navbar-dark bg-woow shadow-sm fixed-top">
      <div class="container">
          <a href="#" class="navbar-brand">
              <img src="{{ asset('assets/tarjeta/logo.svg') }}" width="100" alt="">
              <a class="btn btn-bd-primary ms-3" href="{{ route('tarjeta.app.index') }}">
                  <strong>VOLVER</strong>
              </a>
          </a>
      </div>
    </div>
  </header>


  <header class="py-2 content bg-woow">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card text-start shadow">
              <div class="card-body">
                <ul class="nav nav-pills nav-fill mb-3 mx-2 gap-3" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                      <button class="nav-link active border shadow-sm" id="pills-home-tab"
                          data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab"
                          aria-controls="pills-home" aria-selected="true">
                          Información
                      </button>
                  </li>
                  <li class="nav-item" role="presentation">
                      <button class="nav-link border shadow-sm" id="pills-profile-tab"
                          data-bs-toggle="pill" data-bs-target="#pills-profile" type="button"
                          role="tab" aria-controls="pills-profile" aria-selected="false">
                          Editar
                      </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link border shadow-sm" id="pills-password-tab"
                        data-bs-toggle="pill" data-bs-target="#pills-password" type="button"
                        role="tab" aria-controls="pills-password" aria-selected="false">
                        Cambiar contraseña
                    </button>
                </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                      <div class="card-body">
                        <h4 class="card-title">Información de integración</h4>
                        <p class="card-text">
                          <code>
                            {{route('api.v1.tarjeta.transferir')}}
                          </code>

                        </p>

                        <table class="table">
                          <tbody>
                            <tr>
                              <td scope="row"><strong>COMPAÑIA</strong></td>
                              <td>
                                <code>{{ current_tarjeta_user()->getIntegrationCompany() }}</code>
                              </td>
                            </tr>
                            <tr>
                              <td scope="row"><strong>USUARIO</strong></td>
                              <td>
                                <code>{{ current_tarjeta_user()->getIntegrationUser() }}</code>
                              </td>
                            </tr>
                            <tr>
                              <td scope="row"><strong>SECRET KEY</strong></td>
                              <td>
                                <code>{{ current_tarjeta_user()->getSecretKey() }}</code>
                              </td>
                            </tr>
                          </tbody>
                        </table>

                        <p>
                          Puedes tambien ver la integracion en nuestra documentacion
                          <a href="{{ route('api.doc') }}" target="_blank" rel="noopener noreferrer">Documentación</a>
                        </p>
                      </div>
                  </div>
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                    <div class="container">
                      {{-- <h4 class="card-title">Titlasase</h4> --}}
                      {{-- <p class="card-text">Text</p> --}}

                      <form action="{{ route('tarjeta.app.empresa.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                          <div class="mb-3 row">
                            <label for="company" class="col-sm-6 col-form-label"><strong>Empresa</strong></label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="company" name="company" value="{{ current_tarjeta_user()->getIntegrationCompany() }}" required>
                            </div>
                          </div>

                          <div class="mb-2 row">
                            <label for="user" class="col-sm-6 col-form-label"><strong>USUARIO</strong></label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="user" value="{{ current_tarjeta_user()->getIntegrationUser() }}" name="user" required>
                            </div>
                          </div>

                          <div class="mb-2 row">
                            <label for="secret_key" class="col-sm-6 col-form-label"><strong>SECRET KEY</strong></label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" min="1" id="secret_key" value="{{ current_tarjeta_user()->getSecretKey() }}" name="secret_key" required>
                              {{-- <small class="text-primary">(Saldo para transferir: $ {{current_tarjeta_user()->me_card()->getSaldo() ?? 0 }} )</small> --}}
                            </div>
                          </div>

                        </div>
                        <div class="d-grid gap-2">
                          <button class="btn btn-lg btn-bd-primary" type="submit">Guardar</button>
                        </div>
                        {{-- <button type="submit" class="btn bg-primary btn-lg btn-block">
                          <strong>Transferir</strong>
                        </button> --}}
                      </form>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="pills-password" role="tabpanel" aria-labelledby="pills-password-tab" tabindex="0">
                    <div class="container">
                      <h4 class="card-title">Cambiar contraseña</h4>
                      {{-- <p class="card-text">Text</p> --}}

                      <form action="{{ route('tarjeta.app.perfil.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                          <div class="mb-3 row">
                            <label for="company" class="col-sm-6 col-form-label"><strong>Contraseña</strong></label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="password" name="password" value="" required>
                            </div>
                          </div>
                        </div>
                        <div class="d-grid gap-2">
                          <button class="btn btn-lg btn-bd-primary" type="submit">Guardar</button>
                        </div>
                        {{-- <button type="submit" class="btn bg-primary btn-lg btn-block">
                          <strong>Transferir</strong>
                        </button> --}}
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </header>
</main>

@endsection
@push('javascript')
  @include('tarjeta.app._swal')
@endpush
