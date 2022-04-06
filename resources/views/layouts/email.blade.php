<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><strong> Reporte diario de registros de usuario </strong></h1>

    <p>Hoy, {{now()->format('d-m-Y')}} se han registrado un total de {{$cantidadUsuarios}} usuarios en la web.</p>

</body>
</html>