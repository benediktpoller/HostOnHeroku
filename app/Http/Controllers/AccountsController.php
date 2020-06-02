<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class AccountsController extends Controller
{
    private $paginate = 10;

    public function index()
    {
        $accounts = Account::orderBy('id', 'asc')->paginate($this->paginate);
        return response()->json($accounts);
    }

    public function add(Request $request)
    {
        // validate
        $request->validate(Account::$createRules);

        $monitor = new Account($request->all());
        $monitor->save();

        return response()->json($monitor, 201);
    }

    public function update(Request $request, $uuid)
    {
        // validate
        $request->validate(Account::$updateRules);

        $monitor = Account::findOrFail($uuid);
        $monitor->fill($request->all());
        $monitor->save();

        return response()->json($monitor, 200);
    }

    public function get($uuid)
    {
        $monitor = Account::findOrFail($uuid);
        return response()->json($monitor, 200);
    }

    public function delete($uuid)
    {
        $monitor = Account::findOrFail($uuid);
        $monitor->delete();
        return response()->json(null, 204);
    }
}
