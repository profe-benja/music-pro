<html>

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=Generator content="Edugestion">
<title>Documentos de entrega</title>
<style>


 /* Font Definitions */
 @font-face
	{font-family:Wingdings;
	panose-1:5 0 0 0 0 0 0 0 0 0;}
@font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin:0cm;
	font-size:12.0pt;
	font-family:"Calibri",sans-serif;}
p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:36.0pt;
	font-size:12.0pt;
	font-family:"Calibri",sans-serif;}
p.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:36.0pt;
	font-size:12.0pt;
	font-family:"Calibri",sans-serif;}
p.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:36.0pt;
	font-size:12.0pt;
	font-family:"Calibri",sans-serif;}
p.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:36.0pt;
	font-size:12.0pt;
	font-family:"Calibri",sans-serif;}
.MsoChpDefault
	{font-size:12.0pt;
	font-family:"Calibri",sans-serif;}
@page WordSection1
	{size:612.0pt 792.0pt;
	margin:70.85pt 3.0cm 70.85pt 3.0cm;}
div.WordSection1
	{page:WordSection1;}
 /* List Definitions */
 ol
	{margin-bottom:0cm;}
ul
	{margin-bottom:0cm;}

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

</style>

</head>
<body lang=ES-CL style='word-wrap:break-word'>
<div class=WordSection1>
  <div align="center">
    <small><strong>FICHA DE SOLICITUD DE DOCUMENTOS PARA ASE</strong></small>
    <br>
    <small><strong>BENEFICIOS ESTATALES 2023 ALUMNOS INICIO Y CURSOS SUPERIORES</strong></small>
  </div>
  <p class=MsoNormal><span lang=ES style='font-size:11.0pt'>&nbsp;</span></p>

  <h4 lang=ES style='font-size:18.0pt'>
    <strong>Se ha asignado fecha de entrega de documentos para el día {{ $a->solicitudes->last()->getFechaEntrega()->getDateV3() ?? '' }}</strong>
  </h4>

  <table style="border-collapse: collapse; width: 100%; border: none; border-collapse: none;">
    <tbody>
      <tr class="">
        <td style="width: 50%" style="border: none; border-collapse: none; font-size:10pt;">SEDE: {{ $a->sede->nombre }}</td>
        {{-- <td style="width: 50%" style="border: none; border-collapse: none; font-size:10pt;">RUT ALUMNO: {{ $a->rut ?? '' }}</td> --}}
      </tr>
      <tr class="">
        <td style="width: 50%" style="border: none; border-collapse: none; font-size:10pt;">NOMBRE ALUMNO: {{ $a->nombre_completo() }}</td>
        {{-- <td style="width: 50%" style="border: none; border-collapse: none; font-size:10pt;"></td> --}}
      </tr>
      {{-- <tr class=""> --}}
        {{-- <td style="width: 50%" style="border: none; border-collapse: none; font-size:10pt;">TELÉFONO FJO: {{ $a->telefono_fijo }}</td> --}}
        {{-- <td style="width: 50%" style="border: none; border-collapse: none; font-size:10pt;">FECHA DE ENTREGA: {{ $a->solicitudes->last()->getFechaEntrega()->getDateV3() ?? '' }}</td> --}}
      {{-- </tr> --}}
      {{-- <tr class="">
        <td style="width: 50%" style="border: none; border-collapse: none; font-size:10pt;">TELÉFONO CELULAR: {{ $a->celular }}</td>
      </tr> --}}
      {{-- <tr class="">
        <td style="width: 50%" style="border: none; border-collapse: none; font-size:10pt;">CORREO ELECTRÓNICO: {{ $a->correo ?? '' }}</td>
      </tr> --}}
    </tbody>
  </table>

  <p class=MsoNormal><span lang=ES style='font-size:11.0pt'>&nbsp;</span></p>

  <table>
    @foreach ($formulario as $keyForm => $valueForm)
      <tbody>
        @if ($keyForm == 'A')
        <tr>
          <td colspan="2" style='font-size:10pt'><strong> INGRESOS DEL GRUPO FAMILIAR: El ALUMNO DEBERÁ PRESENTAR LOS SIGUIENTES DOCUMENTOS SEGÚN EL TIPO DE INGRESO DEL GRUPO FAMILIAR (A, B, C, D Ó E)</strong></td>
        </tr>
        @endif
        <tr>
          <td colspan="2" style='font-size:10pt'><strong>{!! $valueForm['title'] !!}</strong></td>
        </tr>

        @foreach ($valueForm['values'] as $keyItem => $valueItem)
          <tr class="handle">
            <td class="text-center">
              @if ($valueItem['solicitud'] ?? false)
                ✔
              {{-- <input class="form-check-input" type="checkbox" {{ ($valueItem['solicitud'] ?? false) ? 'checked' : '' }}/> --}}
              @endif

            </td>
            <td style='font-size:10.0pt'>
              {!! Str::ucfirst(Str::lower($valueItem[0]))  !!}
            </td>
          </tr>
        @endforeach
      </tbody>
    @endforeach
  </table>

  {{-- @if (!empty($a->info['base64']))
    <div align="center">
      <p class=MsoNormal><span lang=ES style='font-size:11.0pt'>&nbsp;</span></p>
      <p class=MsoNormal >
        <img src="{{ $a->info['base64'] ?? '' }}" width="300px"  alt="">

      </p>
      <p> Firma {{ $a->nombre_completo() . ' - ' . $a->rut }}</p>
    </div>
  @endif --}}
</div>
</body>
</html>
