<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SubjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Subject;

class SubjectController extends Controller
{

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
