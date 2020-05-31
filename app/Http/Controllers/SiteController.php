<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use \App\Site;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return $this->paginated();
    }

    public function paginated()
    {
        $sites = Site::orderBy('label', 'asc')->paginate(10);
        return response()->json($sites);
    }

    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'label' => 'required|string|max:100',
            'url' => 'required|url',
        ]);

        $site = new Site($request->all());
        $site->save();

        return response()->json($site, 201);
    }

    public function update(Request $request, int $id)
    {
        $validatedData = $request->validate([
            'label' => 'string|max:100',
            'url' => 'url',
        ]);

        $site = Site::findOrFail($id);
        $site->fill($request->all());
        $site->save();

        return response()->json($site, 200);
    }

    public function get(int $id)
    {
        $site = Site::findOrFail($id);

        return response()->json($site, 200);
    }

    public function delete($id)
    {
        $site = Site::findOrFail($id);
        $site->delete();

        return response()->json(null, 204);
    }
}