<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(){
        $search = request('search');

        if($search) {

            $courses = Course::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        } else {
            $courses = Course::all();
        }        
    
        return view('welcome',['courses' => $courses, 'search' => $search]); 
    }
}
