<?php
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Reporte</title>
</head>
<body>
    <h1>Reporte de libros</h1>
    <table class="table table-light">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->id }}</td>
                    <td>
                        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->foto }}" width="100">
                    </td>
                    <td>{{ $empleado->nombre }}</td>
                    <td>{{ $empleado->apellidoPaterno }}</td>
                    <td>{{ $empleado->apellidoMaterno }}</td>
                    <td>{{ $empleado->correo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
<?php
$html=ob_get_clean();
use Dompdf\Dompdf;
$pdf=new Dompdf();
$options=$pdf->getOptions();
$options->set(array('isRemoteEnabled'=>true));
$pdf->setOptions($options);
$pdf->loadHtml($html);
$pdf->setPaper('letter');
$pdf->render();
$pdf->stream('Certificado.pdf',array('Attachment'=>false));

?>