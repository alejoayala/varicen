<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Varicen | Reportes</title>
    <link rel="stylesheet" href="css/style2.css">
  </head>
  <body>
    <header>
      <h1>Historial Médico</h1><br/>
      <div id="datos">
        <table class="cabecera">
          @foreach($data as $datito)
          <tr>
            <th>Nombres </th>
            <td> {{ $datito->patient->patient }}</td>
          </tr>
          <tr>
            <th>Edad </th>
            <td> {{ $datito->patient->birthdate }}</td>
          </tr>
          <tr>
            <th>Procedencia </th>
            <td> {{ $datito->patient->address }}</td>
          </tr>
          <tr>
            <th>Direccion </th>
            <td> {{ $datito->patient->address }}</td>
          </tr>
          @endforeach
        </table>
      </div>
      <div id="logo">
          <img src="images/logo-medium.jpg">
      </div>
    </header>
    <main>
        <h2>Detalle de las Atenciones</h2>
        <table class="atenciones">
          <thead>
            <tr>
              <th>fecha</th>
              <th>Sys</th>
              <th>Examen</th>
              <th>Tratamiento</th>
              <th>Turno</th>
            </tr>
          </thead>
          <tbody>
              @foreach($data as $datosate)
                @foreach($datosate->attentions as $attention)
                <tr>
                  <td>{{ $attention->date_attention}}</td>
                  <td>{{ $attention->sys}}</td>
                  <td>{{ $attention->exam}}</td>
                  <td>{{ $attention->treatment}}</td>
                  <td>{{ $attention->turn}}</td>
                </tr>
                @endforeach
              @endforeach
          </tbody>
          <tfoot>

          </tfoot>
        </table>
    </main>
    <footer>

    </footer>
  </body>
</html>
