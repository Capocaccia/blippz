<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function save_contact(Request $request) {
        $contact = new Contact();
        $contact->fill($request->all());
        $contact->save();
        return response()->json(['result' => 'success']);
    }
}
