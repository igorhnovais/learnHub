<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;

class CourseController extends Controller
{
    public function index(){
        $search = request('search');

        if($search) {

            $courses = Course::where([
                ['title', 'ilike', '%'.$search.'%']
            ])->get();

        } else {
            $courses = Course::all();
        }        
    
        return view('welcome',['courses' => $courses, 'search' => $search]); 
    }

    public function create(){
        return view('courses.create');
    }

    public function store(Request $request){

        $course = new Course;

        $course->title = $request->title;
        $course->date = $request->date;
        $course->description = $request->description;

        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/courses'), $imageName);

            $course->image = $imageName;
        }

        $user = auth()->user();
        $course->user_id = $user->id;

        $course->save();

        return redirect('/')->with('msg', 'Curso criado com sucesso!');

    } 

    public function show($id){

        $course = Course::findOrFail($id);
        $user = auth()->user();
        $hasUserJoined = false;

        if($user){
            $userCourses = $user->coursesAsParticipant->toArray();

            foreach($userCourses as $userCourse) {
                if($userCourse['id'] == $id) {
                    $hasUserJoined = true;
                }
            }
        }

        $courseOwner = User::where('id', $course->user_id)->first()->toArray();

        return view('courses.show', ['course' => $course, 'courseOwner' => $courseOwner, 'hasUserJoined' => $hasUserJoined]);
    }

    public function joinEvent($id){
        $user = auth()->user();

        $user->coursesAsParticipant()->attach($id);

        $course = Course::findOrFail($id);

        return redirect('/')->with('msg', 'Sua presença está confirmada no evento ' . $course->title);
    }
}
