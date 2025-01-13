<?php

namespace App\Http\Controllers;

use App\Models\Search;

use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index(){

        $Search = Search::select('key')->whereBetween('created_at', [Carbon::yesterday(),Carbon::today()])->paginate(10);

        return view('backend.index', compact('Search'));
    }
}
