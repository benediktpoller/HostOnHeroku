<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Monitor;

use Illuminate\Http\Request;

class MonitorController extends Controller
{
    private $paginate = 10;

    public function all()
    {
        $monitors = Monitor::orderBy('label', 'asc')->paginate($this->paginate);
        return response()->json($monitors);
    }

    public function add(Request $request)
    {
        // validate
        $request->validate(Monitor::$createRules);

        $monitor = new Monitor($request->all());
        $monitor->save();

        return response()->json($monitor, 201);
    }

    public function update(Request $request, $uuid)
    {
        // validate
        $request->validate(Monitor::$updateRules);
        
        $monitor = Monitor::findOrFail($uuid);
        $monitor->fill($request->all());
        $monitor->save();

        return response()->json($monitor, 200);
    }

    public function get($uuid)
    {
        $monitor = Monitor::findOrFail($uuid);
        return response()->json($monitor, 200);
    }

    public function delete($uuid)
    {
        $monitor = Monitor::findOrFail($uuid);
        $monitor->delete();
        return response()->json(null, 204);
    }
}