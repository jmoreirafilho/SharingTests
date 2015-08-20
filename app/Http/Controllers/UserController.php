<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Score;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('user.index')->with('users', User::with('score')->get()->toJson());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        // dd(json_encode($request->all()));
        $user = new User;
        $user->fill($request->all());
        $user->password = \Hash::make($request->password);
        $user->status_level = 0;
        $user->save();

        $scores = new Score;
        $scores->user_id = $user->id;
        $scores->value = 0;
        $scores->save();

        \Auth::attempt(array('email' => $request->email, 'password' => $request->password));

        return redirect()->route('subject.home');
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
    public function update(UserRequest $request, $id)
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
        if (\Auth::attempt(array('email' => $request->email, 'password' => $request->password)))
        {
            return redirect()->intended('/home');
        } else{
            return \Redirect::back();
        }
    }

    /**
     * Logout
     *
     * @return Response
     */
    public function logout()
    {
        if(\Auth::check()){
            \Auth::logout();
        }
        return \Redirect::route('subject.home');
    }
}
