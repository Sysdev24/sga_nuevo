<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Documentos Generados</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

</head>
<body>
    <div class="container">
        <font size="2.0mm"> <table border="2" style="width: 100%">
           <caption>Reporte de Documentos Generados</caption>
                <tr align="center">
                    <td width='30'><b>N° Documento</b></td>
                    <td width='30'><b>Fecha</b></td>
                    <td width='40'><b>Tipo de Documento</b></td>
                    <td width='70'><b>Cargado por: </b></td>
                    <td width='60'><b>Destinatario</b></td>
                    <td><b>Asunto</b></td>
                    <td><b>Observaciones</b></td>
                    <td width='70'><b>Estatus</b></td>
                </thead>
                <tbody>
                    @foreach($correspondencias ?? '' as $k => $v)
                    <tr align="center">

                        <tr align="center">
                            <td>{{ mb_strtoupper($v->nro_documento) }}</td>
                            <td>{{ date('d-m-Y', strtotime($v->fecha_documento)) ?? '' }}</td>
                            <td>{{ ($v->tipo_documento) ?? '' }}</td>
                            <td>{{ mb_strtoupper($v->cargado_por, 'utf-8')}}<br> <b>Gerencia: </b> {{ ($v->dirge_carga)}} <br> <b>Division:</b> {{ ($v->area_carga) ?? ''}} </td>
                            <td>{{ mb_strtoupper($v->receptor, 'utf-8')}}<br> <b>Gerencia: </b>  {{($v->dirge_receptor)}} <br> <b>Division:</b> {{($v->area_receptor) ?? ''}}</td>
                             <td>{{ mb_strtoupper($v->asunto) }}</td>
                            <td>{{ mb_strtoupper($v->observaciones) }}</td>
                            <td><h4>{{ mb_strtoupper($v->estatus) ?? '' }}</h4></td>

                    </tr>
                @endforeach
                </tbody>
            </table>
</div>
</body>
</html>

