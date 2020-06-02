<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
    private $paginate = 10;

    public function all()
    {
        $contacts = Contact::orderBy('name', 'asc')->paginate($this->paginate);
        return response()->json($contacts);
    }

    public function add(Request $request)
    {
        // validate
        $request->validate(Contact::$createRules);

        $contact = new Contact($request->all());
        $contact->save();

        return response()->json($contact, 201);
    }

    public function update(Request $request, $uuid)
    {
        // validate
        $request->validate(Contact::$updateRules);

        $contact = Contact::findOrFail($uuid);
        $contact->fill($request->all());
        $contact->save();

        return response()->json($contact, 200);
    }

    public function get($uuid)
    {
        $contact = Contact::findOrFail($uuid);
        return response()->json($contact, 200);
    }

    public function delete($uuid)
    {
        $contact = Contact::findOrFail($uuid);
        $contact->delete();
        return response()->json(null, 204);
    }
}