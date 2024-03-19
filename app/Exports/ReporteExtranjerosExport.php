<?php

namespace App\Exports;

use App\Models\CargaDocumento;
use App\Models\TramiteTipoOficina;
use App\Models\TramiteOficina;
use App\Models\TramiteActos;
use App\Models\FormaPago;
use App\Models\EstatusUsuario;
use App\Models\Ciudadano;
use App\Models\RangoFecha;
use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

class ReporteExtranjerosExport implements FromCollection,WithHeadings
{

    use Exportable;

    public function __construct($f1,$f2)
    {
        $this->fechaInicial = $f1;
        $this->fechaFinal = $f2;

    }

    public function headings(): array
    {
        return [
            'N° Documento',
            'Fecha',
            'Tipo de Documento',
            'Cargado por',
            'Destinatario',
            'Asunto',
            'Observaciones',
            'Estatus',
        ];
    }

      /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        $carga_documentos = RangoFecha::query()
                            ->orderBy('fecha_documento', 'ASC');

        return $carga_documentos;
    }
}
