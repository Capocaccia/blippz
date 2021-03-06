<?php

namespace App\Http\Controllers;

use App\Models\Blip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class BlipController extends Controller
{
    public function save(Request $request) {
        $blip = new Blip();
        $end_time = $request->end_time;
        unset($request['end_time']);
        $request['end_time'] = Carbon::parse($end_time, 'America/Chicago')
                                ->toDateTimeString();
        $blip->fill($request->all());
        $blip->save();
        return response()->json(['result' => 'success']);
    }

    public function getAll(Request $request) {
        $blips = Blip::active()->where('user_id', $request->user_id)->with('firstContact', 'secondContact', 'thirdContact')->get();
        return response()->json(['result' => 'success', 'data' => $blips]);
    }

    public function delete(Request $request)
    {
        $blipToDelete = Blip::where('id', $request->id)->firstOrFail();
        $blipToDelete->trashed = 1;
        $blipToDelete->save();
        return response()->json(['result' => 'success']);
    }

    public function markSafe(Request $request) {
        $blip = Blip::where('id', $request->id)->firstOrFail();

        if($blip) {
            $blip->marked_safe = 1;
            $blip->save();
            return response()->json(['result' => 'success']);
        }
    }
}
