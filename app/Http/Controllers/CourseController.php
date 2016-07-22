<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;
use App\Http\Requests;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return response()->json($courses);
    }
 
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
            $courses = Course::all();
            $my = "{'authorxs':'".json_encode($request->input('name'))."'}";          
            $course = new Course();
            $course->author = json_encode($request->input('author'));
            $course->name = json_encode($request->input('name'));
            $course->save();
            $courses = Course::all();
            return response()->json($courses);
        
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        return response()->json(['course' => $course]);
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {     
        $course = Course::find($id);
        if($course->update(json_encode($request->all()))){
            return response()->json(['message' => 'Course updated']);
        }  
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        if($course->delete()){
            return response()->json(['result' => 'success']);
        }
    }  
}
