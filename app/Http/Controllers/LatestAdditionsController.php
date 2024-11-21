<?php

namespace App\Http\Controllers;

use App\Models\Eprint;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LatestAdditionsController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->endOfDay();
        $sevenDaysAgo = Carbon::now()->subDays(7)->startOfDay();


        $eprints = Eprint::whereBetween('created_at', [$sevenDaysAgo, $today])
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function ($eprint) use ($today) {
                $createdAt = Carbon::parse($eprint->created_at);

                // Check if the created_at date is today, return "Today" if so
                if ($createdAt->isToday()) {
                    return 'Today';
                }

                // Otherwise, return the day name (e.g., Saturday)
                return $createdAt->format('l');
            });


        $days = [];
        for ($i = 0; $i < 7; $i++) {
            $days[] = Carbon::now()->subDays($i)->format('l');
        }


        return view('pages.latest', compact('eprints'));
    }
}
