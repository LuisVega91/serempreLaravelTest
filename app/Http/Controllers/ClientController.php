<?php

namespace App\Http\Controllers;

use App\Exports\ClientsExport;
use App\Imports\ClientsImport;
use App\Models\City;
use App\Models\Client;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class ClientController
 * @package App\Http\Controllers
 */
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = Request();

        $clients = Client::paginate();
        if($request->filterByCityId ){
            $clients = Client::where('city_id', '=', $request->filterByCityId)->paginate();
        }



        $cities = City::select('id', 'name')->get()->toArray();
        foreach ($cities as $item) $citiesAsArray[$item['id']] = $item['name'];
        $cities = $citiesAsArray;

        return view('client.index', compact('clients', 'cities'))
            ->with('i', (request()->input('page', 1) - 1) * $clients->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new Client();
        $cities = City::select('id', 'name')->get()->toArray();
        foreach ($cities as $item) $citiesAsArray[$item['id']] = $item['name'];
        $cities = $citiesAsArray;

        return view('client.create', compact('client', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Client::$rules);

        $client = Client::create($request->all());

        return redirect()->route('clients.index')
            ->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        return view('client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        $cities = City::select('id', 'name')->get()->toArray();
        foreach ($cities as $item) $citiesAsArray[$item['id']] = $item['name'];
        $cities = $citiesAsArray;

        return view('client.edit', compact('client', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        request()->validate(Client::$rules);

        $client->update($request->all());

        return redirect()->route('clients.index')
            ->with('success', 'Client updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $client = Client::find($id)->delete();

        return redirect()->route('clients.index')
            ->with('success', 'Client deleted successfully');
    }

    public function exportExcel()
    {
        return Excel::download(new ClientsExport, 'client-list.xlsx');
    }

    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new ClientsImport, $file);
        return back()->with('success', 'Successful client import');
    }
}
