<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\RestController;
use App\Models\Material;

class MaterialController extends RestController
{
    /**
     * The model class name used by the controller.
     *
     * @var string
     */
    public $model = "App\Models\Material";

    /**
     * The resource name used in routes
     *
     * @var string
     */
    public $resource = "material";
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {
        $materials = Material::all();
        $return = [];
        foreach ($materials as $key => $material) {
            if($material->subject->id == $id && $material->filtered){
                $return[] = [
                    "id" => $material->id,
                    "description" => $material->description,
                    "link_url" => $material->link_url,
                    "tag" => $material->tag->name
                ];
            }
        }
        return view('material.index')->with(['material' => json_encode($return), 'id'=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('material.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
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
        return view('material.edit');
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function filter()
    {
        $returned = [];
        $materials = Material::where('filtered', false)->get();
        foreach ($materials as $key => $material) {
            $returned[] = [
                "id" => $material->id,
                "description" => $material->description,
                "created_at" => $material->created_at->format('d/m/Y'),
                "link_url" => $material->link_url,
                "tag_id" => $material->tag_id,
                "tag" => $material->tag->name,
                "subject" => $material->subject->name,
                "course" => $material->subject->course->name,
                "college_name" => $material->subject->course->college->name,
                "college_initials" => $material->subject->course->college->initials
            ];
        }
        return view('material.filter')->with('material', json_encode($returned));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $status
     * @param  int  $id
     * @return Response
     */
    public function updateFiltered($id, Request $request)
    {
        if($request->status == "approved"){
            $material = Material::find($id);
            $material->filtered = true;
            $material->save();
        } else{
            Material::destroy($id);
        }
    }

    /**
     * Search in materials.
     *
     * @param  string  $search
     * @return Response
     */
    public function search($id, $search)
    {
        $courses = Material::where('description', 'like', '%'.$search.'%')->where('subject_id', $id)->take(6)->get();
        $return = [];
        foreach($courses AS $key=>$course){
            if($course->filtered){
                $return[] = ['id'=>$course->id, 'description' => $course->description, 'link_url'=>$course->link_url, 'tag' => $course->tag->name];
            }
        };
        return response()->json($return);
    }

    /**
    * Search in material the courses
    * 
    * @param id
    * @return Response
    */
    public function getCourses($id)
    {
        $courses = Material::courses();
    }
}
