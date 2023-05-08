@extends('layouts.webapp.app')
@push('stylesheet')

@endpush
@section('content')
@include('webapp.components.nav._home')
<div class="">
  <div class="container mt-4 mb-4">
    <div class="row">
      <div class="col-12 col-md-3 mb-4">
        @include('webapp.components.card._my_account')
      </div>
      <div class="col-md-9">
        <div class="row">
          @include('webapp.components.nav._nav')
          @include('webapp.components.nav._items')


{{--
          <div class="col-12 col-md-6 col-lg-4 text-center">
            <div class="card mb-3 shadow cursor position-relative" style="max-width: 540px;"
              data-bs-toggle="modal" data-bs-target="#barModal">
              <div class="row g-0">
                <div class="col-4 align-self-center">
                  <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" class="brillo img-fluid p-2"
                    width="100px" alt="...">
                </div>
                <div class="col-8 align-self-center">
                  <div class="card-body">
                    <h5 class="card-title fw-bold d-none d-md-block">
                      Recibir
                      <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt=""
                      >
                      {{ current_config()->nombre }}
                    </h5>
                    <h3 class="card-title fw-bold d-md-none">
                      Recibir
                      <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt="">
                      {{ current_config()->nombre }}
                    </h3>
                    <p class="card-text">
                      <small class="text-muted">{{ $text ?? '' }}</small>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}

          <div class="col-12 col-md-6 col-lg-4 text-center">
            <div class="card mb-3 shadow cursor position-relative" style="max-width: 540px;"
              data-bs-toggle="modal" data-bs-target="#findModal">
              <div class="row g-0">
                <div class="col-4 align-self-center">
                  <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" class="brillo img-fluid p-2"
                    width="100px" alt="...">
                </div>
                <div class="col-8 align-self-center">
                  <div class="card-body">
                    <h5 class="card-title fw-bold d-none d-md-block">
                      Recibir
                      <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt=""
                      >
                      {{ current_config()->nombre }}
                    </h5>
                    <h3 class="card-title fw-bold d-md-none">
                      Recibir
                      <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt="">
                      {{ current_config()->nombre }}
                    </h3>
                    <p class="card-text">
                      <small class="text-muted">{{ $text ?? '' }}</small>
                      {{-- <small>{{ current_user()->myQR() }}</small> --}}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('webapp.components.modal._qr')


<div class="modal fade" id="findModal" tabindex="-1" aria-labelledby="findModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="findModalLabel">Recibe <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt="">
          {{ current_config()->nombre }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <strong>¿Tienes algun código?</strong>
            </div>
            <form action="{{ route('webapp.code') }}" method="post">
              @csrf
              <div class="col-md-12 text-center">
                    <label for="" class="form-label">Ingresa código</label>
                    <input type="text" name="code" maxlength="10" class="form-control form-control-lg text-center" placeholder="" onkeyup="this.value=this.value.toUpperCase();" required>
              </div>
              <div class="col-md-12 text-center mt-2">
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-dark btn-lg" data-bs-dismiss="modal">BUSCAR</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


{{--
<div class="modal fade" id="barModal" tabindex="-1" aria-labelledby="barModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="barModalLabel">Recibir <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt="">
          {{ current_config()->nombre }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="row">


          <form action="" id="form_jwt" method="POST">
            @csrf
            <input type="text" name="jwt" id="jwt_token">
            <button type="submit" class="btn btn-primary">SEND</button>
          </form>

          <section class="row" id="demo-content">
            <div class="col-md-12 d-flex justify-content-center">
              <a class="btn btn-primary btn-sm mb-2 mr-2" id="startButton"><i class="fas fa-camera"></i></a>
              <a class="btn btn-primary btn-sm mb-2" id="resetButton">Reiniciar</a>
            </div>

            <div class="col-md-12">
              <video id="video" width="100%" class="rounded border border-dark bg-white"></video>
            </div>

            <div class="col-md-12">
              <div id="sourceSelectPanel" style="display:none">
                <label for="sourceSelect">Cambiar dispositivo:</label>
                <select class="form-control" id="sourceSelect">
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div style="display: table">
                <label for="decoding-style">Cámara:</label>
                <select class="form-control" id="decoding-style" size="1">
                  <option value="once">Decode once</option>
                  <option value="continuously">Decode continuously</option>
                </select>
              </div>
            </div>
          </section>

        </div>

        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center mt-2">
              <div class="d-grid gap-2">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}

@endsection
@push('extra')
  @include('webapp.components.nav._bar')
@endpush

@push('javascript')
<script src="https://unpkg.com/qrious@4.0.2/dist/qrious.js"></script>
<script src="{{ asset('webapp/js/qr.js') }}"></script>

<script type="text/javascript" src="{{ asset('vendor/zxing/js/index.js') }}"></script>
<script type="text/javascript">
  function decodeOnce(codeReader, selectedDeviceId) {
    codeReader.decodeFromInputVideoDevice(selectedDeviceId, 'video').then((result) => {
      $('#jwt_token').val(result.text);
      // $("#form_jwt").submit();
    }).catch((err) => {
      console.error(err)
      // document.getElementById('result').textContent = err;
    })
  }
  function decodeContinuously(codeReader, selectedDeviceId) {
    codeReader.decodeFromInputVideoDeviceContinuously(selectedDeviceId, 'video', (result, err) => {
      // if (result) {
      //   document.getElementById('result').textContent = result.text;
      // }

      // if (err) {
      //   if (err instanceof ZXing.NotFoundException) {
      //     console.log('No QR code found.')
      //   }

      //   if (err instanceof ZXing.ChecksumException) {
      //     console.log('A code was found, but it\'s read value was not valid.')
      //   }

      //   if (err instanceof ZXing.FormatException) {
      //     console.log('A code was found, but it was in a invalid format.')
      //   }
      // }
    })
  }

  window.addEventListener('load', function () {
    let selectedDeviceId;
    const codeReader = new ZXing.BrowserQRCodeReader();

    codeReader.getVideoInputDevices()
      .then((videoInputDevices) => {
        const sourceSelect = document.getElementById('sourceSelect');
        selectedDeviceId = videoInputDevices[0].deviceId;
        if (videoInputDevices.length >= 1) {
          videoInputDevices.forEach((element) => {
            const sourceOption = document.createElement('option');
            sourceOption.text = element.label;
            sourceOption.value = element.deviceId;
            sourceSelect.appendChild(sourceOption);
          })
          sourceSelect.onchange = () => {
            selectedDeviceId = sourceSelect.value;
          };
          const sourceSelectPanel = document.getElementById('sourceSelectPanel');
          sourceSelectPanel.style.display = 'block';
        }

        document.getElementById('startButton').addEventListener('click', () => {
          const decodingStyle = document.getElementById('decoding-style').value;
          if (decodingStyle == "once") {
            decodeOnce(codeReader, selectedDeviceId);
          } else {
            decodeContinuously(codeReader, selectedDeviceId);
          }
        })

        document.getElementById('resetButton').addEventListener('click', () => {
          codeReader.reset();
          // document.getElementById('result').textContent = '';
        })
      })
      .catch((err) => {
        console.error(err);
      })
  })
</script>
@endpush

