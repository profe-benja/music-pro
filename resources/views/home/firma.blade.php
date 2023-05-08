<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Educk | Acreditación Socioeconómica 2023')</title>
    {{-- <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css"> --}}
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="shortcut icon" href="{{ asset('acreditacion.png') }}" />

    <style>
        #draw-canvas {
            border: 2px dotted #CCCCCC;
            border-radius: 5px;
            cursor: crosshair;
        }

        #draw-dataUrl {
            width: 100%;
        }

        h3 {
            margin: 10px 15px;
        }

        header {
            background: #273B47;
            height: 100%;
            width: 100%;
            padding: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        section {
            flex: 1;
        }

        h1 {
            margin: 10px 15px;
        }

        header {
            color: white;
            font-weight: 500;
            padding-left: 15px;
        }


        .button {
            background: #3071a9;
            box-shadow: inset 0 -3px 0 rgba(0, 0, 0, .3);
            font-size: 14px;
            padding: 5px 10px;
            border-radius: 5px;
            margin: 0 15px;
            text-decoration: none;
            color: white;
        }

        .button:active {
            transform: scale(0.9);
        }

        .contenedor {
            width: 100% margin: 5px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .instrucciones {
            width: 90%;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            margin-bottom: 10px;
        }

        label {
            margin: 0 15px;
        }

        footer {
            background: #273B47;
            color: white;
            height: 100%;
            width: 100%;
            margin-top: 10px;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }


        input[type=range] {
            -webkit-appearance: none;
            margin: 18px 0;

        }

        input[type=range]:focus {
            outline: none;
        }

        input[type=range]::-webkit-slider-runnable-track {
            width: 100%;
            height: 8.4px;
            cursor: pointer;
            animate: 0.2s;
            box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
            background: #3071a9;
            border-radius: 1.3px;
            border: 0.2px solid #010101;
        }

        input[type=range]::-webkit-slider-thumb {
            box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
            border: 1px solid #000000;
            height: 36px;
            width: 16px;
            border-radius: 3px;
            background: #ffffff;
            cursor: pointer;
            -webkit-appearance: none;
            margin-top: -14px;
        }

        input[type=range]:focus::-webkit-slider-runnable-track {
            background: #367ebd;
        }

        input[type=range]::-moz-range-track {
            width: 100%;
            height: 8.4px;
            cursor: pointer;
            animate: 0.2s;
            box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
            background: #3071a9;
            border-radius: 1.3px;
            border: 0.2px solid #010101;
        }

        input[type=range]::-moz-range-thumb {
            box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
            border: 1px solid #000000;
            height: 36px;
            width: 16px;
            border-radius: 3px;
            background: #ffffff;
            cursor: pointer;
        }

        input[type=range]::-ms-track {
            width: 100%;
            height: 8.4px;
            cursor: pointer;
            animate: 0.2s;
            background: transparent;
            border-color: transparent;
            border-width: 16px 0;
            color: transparent;
        }

        input[type=range]::-ms-fill-lower {
            background: #2a6495;
            border: 0.2px solid #010101;
            border-radius: 2.6px;
            box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
        }

        input[type=range]::-ms-fill-upper {
            background: #3071a9;
            border: 0.2px solid #010101;
            border-radius: 2.6px;
            box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
        }

        input[type=range]::-ms-thumb {
            box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
            border: 1px solid #000000;
            height: 36px;
            width: 16px;
            border-radius: 3px;
            background: #ffffff;
            cursor: pointer;
        }

        input[type=range]:focus::-ms-fill-lower {
            background: #3071a9;
        }

        input[type=range]:focus::-ms-fill-upper {
            background: #367ebd;
        }
    </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="card text-center">
        <div class="card-body">
          <h4 class="card-title">Firma digital {{ $a->nombre }}</h4>
            <form action="{{ route('alumno.firma.store', $jwt) }}" method="POST">
                @csrf
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <canvas id="draw-canvas" width="400" height="300">
                                No tienes un buen navegador.
                            </canvas>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="button" class="btn btn-success" id="draw-submitBtn"
                                value="Validar firma"></input>
                            <input type="button" class="btn btn-danger" id="draw-clearBtn"
                                value="Borrar"></input>

                            {{-- <label>Color</label> --}}
                            <input type="hidden" id="color">
                            <label>Tamaño Puntero</label>
                            <input type="range" id="puntero" min="1" default="1" max="5" width="10%">
                        </div>

                    </div>

                    <br />
                    <div class="row">
                        <div class="col-md-12">
                            <textarea id="draw-dataUrl" hidden name="firma" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <br />
                    <div class="contenedor">
                        <div class="col-md-12">
                            <img id="draw-image" src="" alt="Tu Imagen aparecera Aqui!" />
                        </div>
                    </div>
                </div>



                <div class="mb-2 text-center">
                    <button type="submit" class="btn btn-block btn-primary auth-form-btn">
                        <strong>ENVIAR FIRMA</strong>
                    </button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  <script src="vendors/js/vendor.bundle.base.js"></script>

    <script>
        /*
    		El siguiente codigo en JS Contiene mucho codigo
    		de las siguietes 3 fuentes:
    		https://stipaltamar.github.io/dibujoCanvas/
    		https://developer.mozilla.org/samples/domref/touchevents.html - https://developer.mozilla.org/es/docs/DOM/Touch_events
    		http://bencentra.com/canvas/signature/signature.html - https://bencentra.com/code/2014/12/05/html5-canvas-touch-events.html
    */

        (function() { // Comenzamos una funcion auto-ejecutable

            // Obtenenemos un intervalo regular(Tiempo) en la pamtalla
            window.requestAnimFrame = (function(callback) {
                return window.requestAnimationFrame ||
                    window.webkitRequestAnimationFrame ||
                    window.mozRequestAnimationFrame ||
                    window.oRequestAnimationFrame ||
                    window.msRequestAnimaitonFrame ||
                    function(callback) {
                        window.setTimeout(callback, 1000 / 60);
                        // Retrasa la ejecucion de la funcion para mejorar la experiencia
                    };
            })();

            // Traemos el canvas mediante el id del elemento html
            var canvas = document.getElementById("draw-canvas");
            var ctx = canvas.getContext("2d");


            // Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
            var drawText = document.getElementById("draw-dataUrl");
            var drawImage = document.getElementById("draw-image");
            var clearBtn = document.getElementById("draw-clearBtn");
            var submitBtn = document.getElementById("draw-submitBtn");
            clearBtn.addEventListener("click", function(e) {
                // Definimos que pasa cuando el boton draw-clearBtn es pulsado
                clearCanvas();
                drawImage.setAttribute("src", "");
            }, false);
            // Definimos que pasa cuando el boton draw-submitBtn es pulsado
            submitBtn.addEventListener("click", function(e) {
                var dataUrl = canvas.toDataURL();
                drawText.innerHTML = dataUrl;
                drawImage.setAttribute("src", dataUrl);
            }, false);

            // Activamos MouseEvent para nuestra pagina
            var drawing = false;
            var mousePos = {
                x: 0,
                y: 0
            };
            var lastPos = mousePos;
            canvas.addEventListener("mousedown", function(e) {
                /*
                  Mas alla de solo llamar a una funcion, usamos function (e){...}
                  para mas versatilidad cuando ocurre un evento
                */
                var tint = document.getElementById("color");
                var punta = document.getElementById("puntero");
                console.log(e);
                drawing = true;
                lastPos = getMousePos(canvas, e);
            }, false);
            canvas.addEventListener("mouseup", function(e) {
                drawing = false;
            }, false);
            canvas.addEventListener("mousemove", function(e) {
                mousePos = getMousePos(canvas, e);
            }, false);

            // Activamos touchEvent para nuestra pagina
            canvas.addEventListener("touchstart", function(e) {
                mousePos = getTouchPos(canvas, e);
                console.log(mousePos);
                e.preventDefault(); // Prevent scrolling when touching the canvas
                var touch = e.touches[0];
                var mouseEvent = new MouseEvent("mousedown", {
                    clientX: touch.clientX,
                    clientY: touch.clientY
                });
                canvas.dispatchEvent(mouseEvent);
            }, false);
            canvas.addEventListener("touchend", function(e) {
                e.preventDefault(); // Prevent scrolling when touching the canvas
                var mouseEvent = new MouseEvent("mouseup", {});
                canvas.dispatchEvent(mouseEvent);
            }, false);
            canvas.addEventListener("touchleave", function(e) {
                // Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
                e.preventDefault(); // Prevent scrolling when touching the canvas
                var mouseEvent = new MouseEvent("mouseup", {});
                canvas.dispatchEvent(mouseEvent);
            }, false);
            canvas.addEventListener("touchmove", function(e) {
                e.preventDefault(); // Prevent scrolling when touching the canvas
                var touch = e.touches[0];
                var mouseEvent = new MouseEvent("mousemove", {
                    clientX: touch.clientX,
                    clientY: touch.clientY
                });
                canvas.dispatchEvent(mouseEvent);
            }, false);

            // Get the position of the mouse relative to the canvas
            function getMousePos(canvasDom, mouseEvent) {
                var rect = canvasDom.getBoundingClientRect();
                /*
                  Devuelve el tamaño de un elemento y su posición relativa respecto
                  a la ventana de visualización (viewport).
                */
                return {
                    x: mouseEvent.clientX - rect.left,
                    y: mouseEvent.clientY - rect.top
                };
            }

            // Get the position of a touch relative to the canvas
            function getTouchPos(canvasDom, touchEvent) {
                var rect = canvasDom.getBoundingClientRect();
                console.log(touchEvent);
                /*
                  Devuelve el tamaño de un elemento y su posición relativa respecto
                  a la ventana de visualización (viewport).
                */
                return {
                    x: touchEvent.touches[0].clientX - rect.left, // Popiedad de todo evento Touch
                    y: touchEvent.touches[0].clientY - rect.top
                };
            }

            // Draw to the canvas
            function renderCanvas() {
                if (drawing) {
                    var tint = document.getElementById("color");
                    var punta = document.getElementById("puntero");
                    ctx.strokeStyle = tint.value;
                    ctx.beginPath();
                    ctx.moveTo(lastPos.x, lastPos.y);
                    ctx.lineTo(mousePos.x, mousePos.y);
                    console.log(punta.value);
                    ctx.lineWidth = punta.value;
                    ctx.stroke();
                    ctx.closePath();
                    lastPos = mousePos;
                }
            }

            function clearCanvas() {
                canvas.width = canvas.width;
            }

            // Allow for animation
            (function drawLoop() {
                requestAnimFrame(drawLoop);
                renderCanvas();
            })();

        })();
    </script>
</body>

</html>
