<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\RestTrait;
use App\Http\Requests;
use App\Http\Controllers\RestController;
use App\Models\User;

class UserController extends RestController
{
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
        return view('user.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('user.edit')->with('users', User::all()->toJson());
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
     * Redirect to donate page
     *
     * @param  Request  $request
     * @return Response
     */
    public function donate()
    {
        return view('user.donate');
    }

    /**
     * Login
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request)
    {
        if (\Auth::attempt(array('email' => $request->email, 'password' => $request->password), true))
        {
            return route('user.index');
        } else{
            return \Redirect::back();
        }
    }
}
