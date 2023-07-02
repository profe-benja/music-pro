
@extends('layouts.sucursal.app')
@push('stylesheet')

@endpush
@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Integraciones</h1>
  <div class="row">
    <div class="col-md-6">
      <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered
              table-hover
              align-middle">
                <thead>
                  <caption>Table Name</caption>
                  <tr>
                    <th>Column 1</th>
                    <th>Column 2</th>
                    <th>Column 3</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $productos = json_decode($productos, true);
                    @endphp
                    @foreach ($productos as $key => $value)
                      <tr>
                        <td scope="row">@json($value)</td>
                        {{-- <td>{{ $p['nombre'] }}</td> --}}
                        {{-- <td>{{ $p['precio'] }}</td> --}}
                        <td>
                          {{-- <img src="{{ $p['imagen'] }}" alt="" srcset=""> --}}
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                  <tfoot>

                  </tfoot>
              </table>
            </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('javascript')

@endpush
