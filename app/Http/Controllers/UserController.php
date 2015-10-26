<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;
use App\Http\Requests;
use App\Http\Controllers\RestController;
use App\Models\User;
use App\Models\Score;

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
        return view('user.index')->with('users', User::with('score')->get()->toJson());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view('user.show')->with('user', User::with('score')->find($id)->toJson());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('user.edit')->with('user', User::find($id)->toJson());
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
        return \Redirect::route('home.index');
    }

    /**
     * Profile
     *
     * @return Response
     */
    public function profile()
    {
        return view('user.profile')->with('user', User::find(\Auth::id())->toJson());
    }

    /**
     * Profile
     *
     * @return Response
     */
    public function updateProfile(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        if($request->new_password && $request->check_new_password && ($request->new_password == $request->check_new_password)){
            $user->password = \Hash::make($request->new_password);
        }
        $user->save();

        return \Redirect::route('user.profile');
    }

    /**
     * Return a json search result.
     *
     * @var $search
     * @return json
     */
    public function search($search)
    {
        $usersL = [];
        $users = User::whereRaw("name LIKE '%".$search."%' OR email LIKE '%".$search."%'")->take(10)->get();
        foreach($users AS $id=>$user){
            $usersL[] = ['id'=>$user->id, 'name'=>$user->name, 'email'=>$user->email, 'score'=>$user->score->value];
        }
        return response()->json($usersL);
    }

    /**
     * Return a json search result.
     *
     * @var $search
     * @return json
     */
    public function searchName($search)
    {
        $users = User::where('name', 'like', '%'.$search.'%')->take(10)->get();
        if(count($users)>0){
           return "true";
        }
        return "false";
    }
}
