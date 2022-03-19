<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromCollection;

class ClientsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
//        dd(Client::with('city:id,name as cityName')->select(['cod', 'name'])->first()->toArray());
        return Client::join('cities','cities.id','=','clients.city_id')
            ->select('clients.cod', 'clients.name as clientName', 'cities.name as CityName')
            ->get();
    }
}
