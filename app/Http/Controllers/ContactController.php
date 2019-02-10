<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function save(Request $request) {
        $contact = new Contact();
        $contact->fill($request->all());
        $contact->save();
        return response()->json(['result' => 'success']);
    }

    public function getAll(Request $request) {
        $contacts = Contact::where('user_id', $request->user_id)->get();
        return response()->json(['result' => 'success', 'data' => $contacts]);
    }
}
