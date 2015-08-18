<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\LocationCity;
use App\Models\LocationState;

class LocationController extends Controller
{
    /**
     * Display the list of materials.
     *
     * @return view
     */
    public function search($search)
    {
        $location = LocationCity::where('name', 'like', '%'.$search.'%')->take(20)->get();
        return response()->json($location);
    }
}
