<?php

namespace App\Http\Controllers;

use App\Device;
use App\SlackUser;

use Illuminate\Http\Request;

class PTUserDeviceController extends Controller
{
    /**
     * API Endpoint for adding devices to existing users.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request, SlackUser $user)
    {
        $name = $request->input('name');
        $mac = $request->input('mac');
        $hash = hash('sha256', env('PT_SALT'))

        $device = Device::firstOrCreate([
            'name' => $name, 'mac_address' => $mac, 'hash' => $hash
            ]);
        $user->devices()->save($device)

        return response()->json([
            'success' => true,
            'device' => $device
        ]);
    }
}