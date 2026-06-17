<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class StatisticController extends Controller
{
    //

    public function GetResults(Request $request){
        
        $records = collect();
        $summary = collect();
        $from    = null;
        $to      = null;
 
        if ($request->hasAny(['from', 'to'])) {
 
            $validated = $request->validate([
                'from' => ['required', 'date'],
                'to'   => ['required', 'date', 'after_or_equal:from'],
            ]);
 
            $from = Carbon::parse($validated['from']);
            $to   = Carbon::parse($validated['to']);
 
            // All individual attendance records
            $records = Attendance::whereBetween('attendance_date', [
                    $from->toDateString(),
                    $to->toDateString(),
                ])
                ->orderBy('attendance_date')
                ->get();
 
            // Derive per-date totals from $records (no extra query needed)
            $summary = $records
                ->groupBy('attendance_date')
                ->map(fn($group) => $group->count());
        }
 
        return view('stats.result', compact('records', 'summary', 'from', 'to'));
    
    }
}
