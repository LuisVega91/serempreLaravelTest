<?php

namespace App\Http\Controllers;

use App\Exports\ClientsExport;
use App\Imports\ClientsImport;
use App\Models\City;
use App\Models\Client;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class ClientController
 * @package App\Http\Controllers
 */
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $request = Request();
        $clients = (new Client)->paginate();
        if($request['filterByCityId'] ){
            $clients = (new Client)->where('city_id', '=', $request['filterByCityId'])->paginate();
        }
        $cities = (new City)->select('id', 'name')->get()->toArray();
        $citiesAsArray= [];
        foreach ($cities as $item) $citiesAsArray[$item['id']] = $item['name'];
        $cities = $citiesAsArray;
        return view('client.index', compact('clients', 'cities'))
            ->with('i', (request()->input('page', 1) - 1) * $clients->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $client = new Client();
        $cities = (new City)->select('id', 'name')->get()->toArray();
        $citiesAsArray = [];
        foreach ($cities as $item) $citiesAsArray[$item['id']] = $item['name'];
        $cities = $citiesAsArray;

        return view('client.create', compact('client', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate(Client::$rules);
        $client = (new Client)->create($request->all());
        return redirect()->route('clients.index')
            ->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Application|Factory|View
     */
    public function show(int $id)
    {
        $client = (new Client)->find($id);
        return view('client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $client = (new Client)->find($id);
        $cities = (new City)->select('id', 'name')->get()->toArray();
        $citiesAsArray = [];
        foreach ($cities as $item) $citiesAsArray[$item['id']] = $item['name'];
        $cities = $citiesAsArray;
        return view('client.edit', compact('client', 'cities'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  Client $client
     * @return RedirectResponse
     */
    public function update(Request $request, Client $client): RedirectResponse
    {
        request()->validate(Client::$rules);
        $client->update($request->all());
        return redirect()->route('clients.index')
            ->with('success', 'Client updated successfully');
    }

    /**
     * Delete the specified resource in storage.
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(int $id): RedirectResponse
    {
        $client = (new Client)->find($id)->delete();
        return redirect()->route('clients.index')
            ->with('success', 'Client deleted successfully');
    }

    /**
     * Export all specified resource in storage as excel file.
     * @return BinaryFileResponse
     * @throws Exception
     */
    public function exportExcel(): BinaryFileResponse
    {
        return Excel::download(new ClientsExport, 'client-list.xlsx');
    }

    /**
     * Import all items on excel file to specified resource in storage.
     * @param Request $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function importExcel(Request $request): RedirectResponse
    {
        $file = $request->file('file');
        Excel::import(new ClientsImport, $file);
        return back()->with('success', 'Successful client import');
    }
}
