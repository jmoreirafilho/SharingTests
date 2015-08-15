<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\RestTrait;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    use RestTrait;

    /**
     * The model class name used by the controller.
     *
     * @var string
     */
    public $model = "App\Models\User";

    /**
     * The resource name used in routes
     *
     * @var string
     */
    public $resource = "user";

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
