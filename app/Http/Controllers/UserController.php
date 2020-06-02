<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        $user = User::with('accounts')->first();
        return response()->json($user);
    }

    public function update(Request $request, $uuid)
    {
        // validate
        $request->validate(User::$updateRules);

        $monitor = User::findOrFail($uuid);
        $monitor->fill($request->all());
        $monitor->save();

        return response()->json($monitor, 200);
    }
}
