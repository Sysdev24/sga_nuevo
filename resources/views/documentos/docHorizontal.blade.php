<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

</head>
<body>
    <div class="container">
        <font size="2.0mm"> <table border="2" style="width: 100%">
           <caption>Reporte de Documentos Generados</caption>
                <tr align="center">
                <td><b>N° Documento</b></td>
                <td><b>Tipo de Documento</b></td>
                <td><b>Fecha</b></td>
                <td width='100'><b>Cargado por: </b></td>
                <td width='100'><b>Destinatario</b></td>
                <td><b>Asunto</b></td>
                <td><b>Observaciones</b></td>
            </thead>
            <tbody>
                @foreach($correspondencias ?? '' as $k => $v)
                <tr align="center">

                    <tr align="center">
                        <td>{{ mb_strtoupper($v->nro_documento) }}</td>
                        <td>{{ ($v->tipoDocumento->descripcion) ?? '' }}</td>
                        <td>{{ $v->fecha_documento }}</td>
                        <td><b>Usuario:</b> {{ mb_strtoupper($v->receptor->name, 'utf-8')}}<br> <b>Gerencia: </b> {{ ($v->gerenciasEmisor->descripcion)}} <br> <b>Division:</b> {{ ($v->areaEmisor->descripcion) ?? ''}} </td>
                        <td><b>Usuario:</b> {{ mb_strtoupper($v->emisor->name, 'utf-8')}}<br> <b>Gerencia: </b>  {{($v->gerenciasReceptor->descripcion)}} <br> <b>Division:</b> {{($v->areaReceptor->descripcion) ?? ''}}</td>
                        <td>{{ mb_strtoupper($v->asunto) }}</td>
                        <td>{{ mb_strtoupper($v->observaciones) }}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
</div>
</body>
</html>

