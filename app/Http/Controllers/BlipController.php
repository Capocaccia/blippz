<?php

namespace App\Http\Controllers;

use App\Models\Blip;
use Illuminate\Http\Request;

class BlipController extends Controller
{
    public function save_blip(Request $request) {
        $blip = new Blip();
        $blip->fill($request->all());
        $blip->save();
        return response()->json(['result' => 'success']);
    }
}
