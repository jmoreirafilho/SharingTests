<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {
        $courses = Course::orderBy('name')->get();
        $return = [];
        foreach ($courses as $key => $course) {
            if($course->college->id == $id){
                $return[] = [
                    "id" => $course->id,
                    "name" => $course->name
                ];
            }
        }
        return view('course.index')->with(['courses' => json_encode($return), 'id'=>$id]);
    }

    /**
     * Search in courses.
     *
     * @param  string  $search
     * @return Response
     */
    public function search($id, $search)
    {
        $courses = Course::where('name', 'like', '%'.$search.'%')->where('college_id', $id)->take(6)->get();
        return response()->json($courses);
    }
}
