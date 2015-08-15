<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Traits\RestTrait;

class CourseController extends Controller
{
    use RestTrait;

    /**
     * The model class name used by the controller.
     *
     * @var string
     */
    public $model = "App\Models\Course";

    /**
     * The resource name used in routes
     *
     * @var string
     */
    public $resource = "course";

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
}
