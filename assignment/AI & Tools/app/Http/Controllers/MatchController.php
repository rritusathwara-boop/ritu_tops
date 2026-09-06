<?php

namespace App\Http\Controllers;

use App\Models\MatchSchedule;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    // API endpoint to fetch all upcoming IPL matches from the database, return them in JSON format, and include basic status information for the client so the frontend can display match schedules, dates, teams, and venues.
    public function getUpcomingMatches()
    {
        $matches = MatchSchedule::where('match_date', '>=', now())
            ->orderBy('match_date', 'asc')
            ->get();

        if ($matches->isEmpty()) {
            return response()->json([
                'message' => 'No upcoming IPL matches found.',
                'data' => [],
            ], 404);
        }

        return response()->json([
            'message' => 'Upcoming IPL matches fetched successfully.',
            'data' => $matches,
        ], 200);
    }
}
