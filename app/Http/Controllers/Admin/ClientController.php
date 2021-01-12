<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        $model = $this->client->paginate();
        return view('client.index', compact('model'));
    }

    public function create()
    {
        return view('client.create');
    }

    public function edit($id)
    {
        $model = Client::find($id);
        if ($model) {
            return view('client.create', compact('model'));
        }
        return redirect(route('client.index'));
    }

    public function update(ClientRequest $request)
    {
        $data = $request->all();
        if (empty($data['active'])) {
            $data['active'] = "0";
        }
        if (empty($data['id'])) {
            Client::create($data);
        } else {
            $client = Client::find($data['id']);
            unset($data['id']);
            if ($client) {
                $client->fill($data);
                $client->save();
            }
        }
        return redirect(route('client.index'));
    }
}
