<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\RestController;
use App\Models\Material;

class MaterialController extends RestController
{
    /**
     * The model class name used by the controller.
     *
     * @var string
     */
    public $model = "App\Models\Material";

    /**
     * The resource name used in routes
     *
     * @var string
     */
    public $resource = "material";

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('material.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        return view('material.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return view
     */
    public function show($id)
    {
        return view('material.show')->with('material', Material::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $material = App\Models\Material::findOrFail($id);
        return view('material.edit')->with('material', $material);
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
     * Upload the specified archive.
     *
     * @param  Request $request
     * @return Response
     */
    public function upload($link_url)
    {
        //
    }

    /**
     * Display the view to donate.
     *
     * @return view
     */
    public function donate()
    {
        return view('material.donate');
    }

    /**
     * Display the list of materials.
     *
     * @return view
     */
    public function search()
    {
        return view('material.search');
    }
}
