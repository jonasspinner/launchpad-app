<?php

namespace App\Http\Controllers;

use App\Device;
use App\DeviceActivity;
use App\ActivityBatch;
use App\TrackerClient;

use Carbon\Carbon;
use Illuminate\Http\Request;

class PTActivityController extends Controller
{
    public function index(Request $request)
    {
        $batches = ActivityBatch::leftJoin('activities', 'activities.batch_id', '=', 'batches.id')
            ->select('batches.*', 'count(*) as activities_count')
            ->groupBy('batches.id')
            ->orderBy('batches.start')
            ->take(10)
            ->get();

        return response()->json([
            'success' => true,
            'batches' => $batches
        ]);
    }

    /**
     * API Endpoint for recieving devices activities.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $recieved_activities = $request->input('activities');
        $start = $request->input('interval.start');
        $end = $request->input('interval.end');

        $secret_token = Input::get('token');

        $client = TrackerClient::where('secret_token', $secret_token)->first();

        if ($client) {
            $activities = array();
            foreach ($recieved_activities as $recieved_activity)
            {
              $device = Device::firstOrCreate(['hash' => $recieved_activity['hash']])
              $activity = new DeviceActivity;
              $device->activities()->save($activity)

              $activities[] = $activity
            }
            
            $batch = new ActivityBatch;
            $batch->start = new Carbon($start)
            $batch->end = new Carbon($end)
            $batch->activities()->saveMany($activities)
            $client->batches()->save($batch)

            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No client with this secret token.'
            ]);
        }
    }
}