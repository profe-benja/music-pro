
@extends('layouts.admin.app')
@push('stylesheet')

@endpush
@section('content')
<div class="container-fluid">
  <div class="row">
    @include('accion._tabs_accion')
    <div class="col-md-12">

      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="row">
            @include('accion._tabs_accion_interno')
            <div class="d-none d-md-block col-lg-4 mb-4">
              <div class="card mb-4">
                <div class="card-body">
                  <h4 class="m-0 font-weight-bold">
                    {{ $a->nombre }}
                  </h4>
                  <div class="text-center">
                    <img src="{{ asset($a->present()->getImagen()) }}" width="300px" class="img-fluid rounded mt-3 mb-4" alt="...">
                  </div>
                  <p>
                    {{ $a->descripcion }}
                  </p>
                </div>
                <div class="card-footer text-center">
                  <h3>
                    <strong>
                      <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="30px" alt="">
                      {{ $a->getCredito() }}
                    </strong>
                  </h3>
                </div>
                <div class="card-footer text-center">
                  <h4>
                    @if ($a->estado == 1)
                      <span class="badge badge-primary">Borrador</span>
                    @else
                    @if ($a->estado == 2)
                      <span class="badge badge-dark">No disponible</span>
                    @else
                      <span class="badge badge-success">Disponible</span>
                    @endif
                    @endif
                  </h4>
                </div>
              </div>
            </div>

            <div class="col-lg-8 mb-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Usuarios</h6>
                </div>


                <div class="card-body">
                  <form action="{{ route('admin.accion.send', $a->id) }}" id="form_jwt" method="POST">
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
                      {{-- <span class="centrado">Hola</span> --}}
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

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('javascript')
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
