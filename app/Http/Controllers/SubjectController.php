<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SubjectRequest;
use App\Http\Controllers\RestController;
use App\Models\Subject;

class SubjectController extends RestController
{
    /**
     * The model class name used by the controller.
     *
     * @var string
     */
    public $model = "App\Models\Subject";

    /**
     * The resource name used in routes
     *
     * @var string
     */
    public $resource = "subject";

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('subject.index')->with('subjects', Subject::all()->toJson());
    }

    /**
     * Display all uploaded subjects to filtering.
     *
     * @return Response
     */
    public function filter()
    {
        return view('subject.filter');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(SubjectRequest $request)
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
        return view('subject.show')->with('subject', Subject::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('subject.edit')->with('subject', Subject::find($id)->toJson());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(SubjectRequest $request, $id)
    {
        //
    }

    /**
     * Search in subjects.
     *
     * @param  string  $search
     * @return Response
     */
    public function search($search)
    {
        $result = [];
        $subjects = Subject::with('tag')->where('name', 'like', '%'.$search.'%')->where('filtered', true)->take(20)->get();
        foreach($subjects AS $id => $subject){
            $result[] = ["id"=>$subject->id, "name", $subject->name, "description"=>$subject->description, "tag"=>$subject->tag->name];
        }
        return response()->json($result);
    }
}
