<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Plantilla de Correo</title>
  <style>
    /* Estilos para el cuerpo del correo */
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      margin: 0;
      padding: 0;
    }

    /* Estilos para el contenedor principal */
    .container {
      max-width: 600px;
      margin: 0 auto;
      background-color: #ffffff;
      padding: 20px;
      box-sizing: border-box;
    }

    /* Estilos para la imagen de cabecera */
    .header-image {
      width: 100%;
      max-height: 200px;
      object-fit: cover;
    }

    /* Estilos para el contenido */
    .content {
      margin-top: 40px;
    }

    /* Estilos para los párrafos */
    p {
      margin-top: 0;
    }


    html {
        background: rgb(140, 82, 255);
        background: linear-gradient(90deg, rgba(140, 82, 255, 1) 0%, rgba(92, 225, 230, 1) 100%);
    }
  </style>
</head>
<body>
  <div class="container">
    {{-- <img class="header-image" src="ruta-de-la-imagen.jpg" alt="Cabecera"> --}}
    <div class="content">
      {{-- <h1>Título del Correo</h1> --}}
      {{ $contenido ?? '' }}

      <p>
        {!! $contenido_html ?? '' !!}
      </p>
    </div>
  </div>
</body>
</html>
