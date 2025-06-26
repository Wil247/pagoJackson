<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contador de Días y Cobro</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f6f8;
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container {
      background-color: white;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      max-width: 500px;
      width: 90%;
      text-align: center;
    }

    h1 {
      color: #2c3e50;
      font-size: 28px;
      margin-bottom: 20px;
    }

    p {
      font-size: 22px;
      margin: 15px 0;
      color: #34495e;
    }

    button {
      background-color: #3498db;
      color: white;
      border: none;
      padding: 15px 25px;
      margin: 10px;
      font-size: 18px;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #2980b9;
    }

    .resultado {
      margin-top: 20px;
      font-size: 18px;
      color: green;
      font-weight: bold;
    }

    .error {
      color: red;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>Calculador de días trabajados</h1>
    <p><strong>Día actual:</strong> <span id="dia">Cargando...</span></p>
    <p><strong>Total a cobrar:</strong> <span id="total"></span> pesos</p>

    <button onclick="generarDia()">Generar día</button>
    <button onclick="solicitarBorrado()">Borrar</button>

    <div class="resultado" id="mensaje"></div>
  </div>

  <script>
    const VALOR_POR_DIA = 625;

    function cargarDia() {
      const dia = parseInt(localStorage.getItem('dia')) || 0;
      const total = dia * VALOR_POR_DIA;
      document.getElementById('dia').textContent = dia;
      document.getElementById('total').textContent = total;
    }

    function generarDia() {
      let dia = parseInt(localStorage.getItem('dia')) || 0;
      dia += 1;
      const total = dia * VALOR_POR_DIA;
      localStorage.setItem('dia', dia);
      document.getElementById('dia').textContent = dia;
      document.getElementById('total').textContent = total;
      mostrarMensaje('Día incrementado correctamente.', false);
    }

    function solicitarBorrado() {
      const codigo = prompt("Ingrese el código de seguridad para borrar los datos:");
      if (codigo === "2914") {
        borrarDia();
      } else {
        mostrarMensaje('Código incorrecto. No se pueden borrar los datos.', true);
      }
    }

    function borrarDia() {
      localStorage.setItem('dia', 0);
      document.getElementById('dia').textContent = 0;
      document.getElementById('total').textContent = 0;
      mostrarMensaje('Datos borrados correctamente.', false);
    }

    function mostrarMensaje(mensaje, esError) {
      const div = document.getElementById('mensaje');
      div.textContent = mensaje;
      div.className = esError ? 'resultado error' : 'resultado';
    }

    window.onload = cargarDia;
  </script>

</body>
</html>