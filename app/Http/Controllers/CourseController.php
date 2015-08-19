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
    public function index()
    {
        return view('course.index')->with('courses', Course::all()->toJson());
    }

    /**
     * Search in courses.
     *
     * @param  string  $search
     * @return Response
     */
    public function search($search)
    {
        $search = Course::where('name', 'like', '%'.$search.'%')->take(20)->get();
        return response()->json($search);
    }
}
