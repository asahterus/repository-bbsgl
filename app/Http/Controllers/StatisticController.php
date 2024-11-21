<?php

namespace App\Http\Controllers;

use App\Models\Eprint;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $documents_count = Eprint::count();

        return view('pages.statistics', compact('documents_count'));
        // return response()->json($documents_count);
    }
}
