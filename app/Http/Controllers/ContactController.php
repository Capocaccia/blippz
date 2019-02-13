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
        return response()->json(['result' => 'success', 'user' => $contact]);
    }

    public function getAll(Request $request) {
        $contacts = Contact::active()->where('user_id', $request->user_id)->get();
        return response()->json(['result' => 'success', 'data' => $contacts]);
    }

    public function delete(Request $request) {
        $contactToDelete = Contact::where('id', $request->id)->firstOrFail();
        $contactToDelete->trashed = 1;
        $contactToDelete->save();
        return response()->json(['result' => 'success']);
    }

}
