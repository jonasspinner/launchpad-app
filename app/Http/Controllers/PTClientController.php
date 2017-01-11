<?php

namespace App\Http\Controllers;

use App\TrackerClient;

use Illuminate\Http\Request;

class PTClientController extends Controller
{
    /**
     * API Endpoint for posting clients.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $secret_token = hash('sha256', str_random(64))

        $client = new TrackerClient
        $client->fill([
            'name' => $name, 'secret_token' => $secret_token
        ])->save();

        return response()->json([
            'success' => true,
            'device' => $client,
            'token' => $secret_token
        ]);
    }
}