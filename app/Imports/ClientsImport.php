<?php

namespace App\Imports;

use App\Models\City;
use App\Models\Client;
use Maatwebsite\Excel\Concerns\ToModel;

class ClientsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Client([
            'cod'     => $row[0],
            'name'    => $row[1],
            'city_id' => City::where('name', 'LIKE', "%$row[2]%")->first()->id,
        ]);
    }
}
