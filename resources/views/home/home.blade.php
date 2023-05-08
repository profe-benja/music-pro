
@extends('layouts.admin.app')
@push('stylesheet')

{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"> --}}
{{-- <link rel="stylesheet" href="{{ asset('js/select.dataTables.min.css') }}"> --}}
@endpush
@section('content')

<div class="row">
  <div class="col-sm-12">

    <div class="row flex-grow">
      <div class="col-12 grid-margin stretch-card">
        <div class="card card-rounded">
          <div class="card-body">
            <div class="d-sm-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title card-title-dash">FICHA DE SOLICITUD DE DOCUMENTOS PARA ASE</h4>
                <p class="card-subtitle card-subtitle-dash">BENEFICIOS ESTATALES 2023 ALUMNOS INICIO Y CURSOS SUPERIOR</p>
              </div>
              {{-- <div>
                <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-account-plus"></i>Add new member</button>
              </div> --}}
                <div>
                <button class="btn btn-primary text-white mb-0 me-0" type="button">ENVIAR</button>
                <button class="btn btn-warning text-white mb-0 me-0" type="button">asdas</button>
              </div>
            </div>

            <div class="table-responsive mt-1">
              <table class="table table-sm table-hover">
              @foreach ($formulario as $keyForm => $valueForm)
                <thead>
                  @if ($keyForm == 'A')
                  <tr class="bg-personalizado text-white">
                    <th colspan="2"><strong> INGRESOS DEL GRUPO FAMILIAR: El ALUMNO DEBERÁ PRESENTAR LOS SIGUIENTES DOCUMENTOS SEGÚN EL TIPO DE INGRESO DEL GRUPO FAMILIAR (A, B, C, D Ó E)</strong></th>
                  </tr>
                  @endif
                  <tr class="bg-info text-white">
                    <th colspan="2"><strong>{!! $valueForm['title'] !!}</strong></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($valueForm['values'] as $keyItem => $valueItem)
                    <tr class="handle">
                      <td class="text-center">
                        <input class="form-check-input" type="checkbox"  name="check-{{ $keyForm . '-' . $keyItem }}" id="check-{{ $keyForm . '-' . $keyItem }}">
                      </td>
                      <td class="text-wrap" onclick="check('check-{{ $keyForm . '-' . $keyItem }}')">
                        {!! Str::ucfirst(Str::lower($valueItem[0]))  !!}
                        <span class="ms-1 badge bg-success"><small>Entregado 12/01/22</small></span>
                        <span class="ms-1 badge bg-warning"><small>Pendiente</small></span>
                        {{-- <span class="ms-2 badge bg-primary">Esperando confirmación</span> --}}
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              @endforeach
            </table>




              {{-- //   "'  NO SE ACEPTAAANINFORMES SOOALES O FlCHAS SOOOECONOMICASCON INGRESOS ENMONTO $0 0 DOCUMENTOSSINTIMBRE INSTJTUOONALDERESPALDO
// OEOLARO QUELOS DOC\JMENTOSENTREGADOSSON VERfDICOS, ASf COMO ESTAR EN CONOCIMIENTO QUE EN El CASO DEOMITJR ANTECEDENTESDE Ml SITUACION SOCIOECON0MICA, LA INSTJTUOONPODRA SOLIOTAR DOCUMENTOS ADICIONALES." --}}

            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>


<script>

function check(c) {
    document.getElementById(c).checked = !document.getElementById(c).checked;
}

function uncheck() {
    document.getElementById("myCheck").checked = false;
}

</script>
@endsection
