<?php

namespace App\Exports;

use App\Models\Auditoria;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AuditoriaUsuariosExport implements FromCollection,WithHeadings
{

    use Exportable;



    public function headings(): array
    {
        return [
        'Tipo de Usuario',
        'Id del Usuario',
        'Tipo de Evento',
        'Tipo Auditable',
        'Valor Viejo',
        'Valor Nuevo',
        'URL',
        'Dirección ip',
        'Fecha y Hora de la Creación',
        'Fecha y Hora de la Actualización',
        ];
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Auditoria::select(

                                "user_type",
                                "user_id",
                                "event",
                                "auditable_type",
                                "old_values",
                                "new_values",
                                "url",
                                "ip_address",
                                "created_at",
                                "updated_at"

                                )

                        ->orderBy('user_type', 'ASC')
                        ->where('auditable_type', 'App\Models\CargaDocumento')
                        ->get();
    }

}
