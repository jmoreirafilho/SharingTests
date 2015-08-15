<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Traits\RestTrait;

class MaterialController extends Controller
{
    use RestTrait;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
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
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
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
     * @return Response
     */
    public function donate()
    {
        //
    }

    /**
     * Display the list of materials.
     *
     * @return Response
     */
    public function search()
    {
        //
    }
}
