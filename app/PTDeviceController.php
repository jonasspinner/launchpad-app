<?php

namespace App\Http\Controllers;

use App\Device;

use Illuminate\Http\Request;

class PTDeviceController extends Controller
{
    /**
     * API Endpoint for posting devices.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $mac = $request->input('mac');
        $hash = hash('sha256', env('PT_SALT'))
        $device = Device::firstOrCreate(['mac_address' => $mac, 'hash' => $hash])
        return response()->json([
            'success' => true,
            'device' => $device
        ]);
    }
}