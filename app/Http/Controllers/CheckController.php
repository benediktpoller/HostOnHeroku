<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class CheckController extends Controller
{
    public function index()
    {
        return $this->paginated();
    }

    public function paginated()
    {
        $sites = Check::orderBy('label', 'asc')->paginate(10);
        return response()->json($sites);
    }

    public function add()
    {
        $site = new Check();
        $site->label = 'label';
        $site->url = 'url';
        $site->save();

        return response()->json($site);
    }

    public function get($id)
    {
        $site = Check::find($id);
        return response()->json($site);
    }
}