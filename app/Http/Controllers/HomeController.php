<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\User;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('home.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('home.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->fill($request->all());
        $user->status_level = 0;
        $user->password = \Hash::make($request->password);
        $user->save();

        $scores = new Score;
        $scores->user_id = $user->id;
        $scores->value = 0;
        $scores->save();

        \Auth::attempt(array('email' => $request->email, 'password' => $request->password));

        return redirect()->route('home.index');
    }

    /**
     * Redirect to donate page
     *
     * @param  Request  $request
     * @return Response
     */
    public function donate()
    {
        return view('home.donate');
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
            return redirect()->intended('/');
        } else{
            return \Redirect::back();
        }
    }
}
