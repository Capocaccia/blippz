<?php

namespace App\Http\Controllers;

use App\Models\Blip;
use Illuminate\Http\Request;

class BlipController extends Controller
{
    public function save(Request $request) {
        $blip = new Blip();
        $blip->fill($request->all());
        $blip->save();
        return response()->json(['result' => 'success']);
    }

    public function getAll(Request $request) {
        $blips = Blip::active()->where('id', $request->user_id)->with('firstContact', 'secondContact', 'thirdContact')->get();
        return response()->json(['result' => 'success', 'data' => $blips]);
    }

    public function delete(Request $request)
    {
        $blipToDelete = Blip::where('id', $request->id)->firstOrFail();
        $blipToDelete->trashed = 1;
        $blipToDelete->save();
        return response()->json(['result' => 'success']);
    }
}
