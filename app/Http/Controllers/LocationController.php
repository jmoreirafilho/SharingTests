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
        foreach(LocationCity::where('name', 'like', '%'.$search.'%')->get() AS $id=>$city){
            $location[] = ['city_id' => $city->id,'city'=>$city->name, 'state'=>$city->state->name];
        }
        // return $location;
        return response()->json($location);
    }
}
