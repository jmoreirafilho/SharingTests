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
        $location = [];
        $locations = LocationCity::where('name', 'like', '%'.$search.'%')->take(5)->get();
        foreach($locations AS $id=>$locate){
            $location[] = ['id'=>$locate->id, 'city'=>$locate->name, 'state'=>$locate->state->uf];
        }
        return response()->json($location);
    }
}
