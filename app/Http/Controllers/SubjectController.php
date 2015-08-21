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
    public function index($id)
    {
        $subjects = Subject::all();
        $return = [];
        foreach ($subjects as $key => $subject) {
            if($subject->course->id == $id){
                $return[] = [
                    "id" => $subject->id,
                    "name" => $subject->name
                ];
            }
        };
        return view('subject.index')->with(['subjects' => json_encode($return), 'id'=>$id]);
    }

    /**
     * Search in subjects.
     *
     * @param  string  $search
     * @return Response
     */
    public function search($id, $search)
    {
        $subjects = Subject::where('name', 'like', '%'.$search.'%')->where('course_id', $id)->take(6)->get();
        return response()->json($subjects);
    }
}
