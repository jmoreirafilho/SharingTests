<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Score;

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
            return redirect()->intended('/profile');
        } else{
            return \Redirect::back();
        }
    }

    /**
     * Login
     *
     * @param  Request  $request
     * @return Response
     */
    public function forgotPass()
    {
        return view('home.forgot_password');
    }

    /**
     * Login
     *
     * @param  Request  $request
     * @return Response
     */
    public function recoveryPassword(Request $request)
    {
        $email = $request->email;
        $user = User::where('email',$email)->get();
        $result = count($user);
        if($result){
            \Mail::send('emails.index', ['key' => 'value'], function($message)
            {
                $message->to('airtonmfilho@hotmail.com', 'John Smith')->subject('Welcome!');
            });
        } else{
            header("Location: /forgot_password");
        }
        dd($user);
    }

    /**
     * Login
     *
     * @param  Request  $request
     * @return Response
     */
    public function mail()
    {
        return view('emails.index');
    }
}
