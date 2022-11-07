<?php

namespace App\Imports;

use App\Models\Bien;
use Maatwebsite\Excel\Concerns\ToModel;

class BienesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Bien([
            'id' => $row[0],
            'articulo'=>$row[1],
            'descripcion'=>$row[2],
            'user_base_id'=>auth()->user()->getAuthIdentifier(),
        ]);
    }
}
