<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\RestController;
use App\Models\College;

class CollegeController extends RestController
{
    /**
     * The model class name used by the controller.
     *
     * @var string
     */
    public $model = "App\Models\College";

    /**
     * The resource name used in routes
     *
     * @var string
     */
    public $resource = "college";

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $returned = [];
        $colleges = College::all()->take(6);
        foreach($colleges AS $id=>$college){
            $returned[] = [
            'id'=>$college->id,
            'name'=>$college->name,
            'initials'=>$college->initials,
            'city'=>$college->city->name,
            'state'=>$college->city->state->name
            ];
        }
        return view('college.index')->with('colleges', json_encode($returned));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('college.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $college = new College();
        $college->name = $request->name;
        $college->initials = $request->initial;
        $college->location_city_id = $request->location_city_id;
        $college->save();

        return redirect()->route('college.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('college.edit')->with('college', College::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Search in colleges.
     *
     * @param  string  $search
     * @return Response
     */
    public function search($search)
    {
        $search = College::where('name', 'like', '%'.$search.'%')->take(20)->get();
        return response()->json($search);
    }
}
