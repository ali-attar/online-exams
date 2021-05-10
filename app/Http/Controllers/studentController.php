<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\azmoon;
use App\Models\azmoonClass;
use App\Models\permision;
use App\Models\classUsers;
use App\Models\classp;
use App\Models\User;
use App\Models\categoryAzmoon;
use App\Models\option;
use App\Models\question;
use App\Models\permisionUser;

class studentController extends Controller
{
    public function which_exams()
    {
        $user=Auth::user();
        $classUsers=$user->classUsers()->get();
        $classes=[];
        foreach ($classUsers as $classUser) {
            foreach ($classUser->classp()->get() as $key) {
                array_push($classes,$key);
            }
        }
        $quizs=[];
        foreach ($classes as $class) {
            foreach ($class->azmoonClass()->get() as $azmoonClass) {
                foreach ($azmoonClass->azmoon()->get() as $key) {
                    if (!in_array($key,$quizs)) {
                        array_push($quizs,$key);
                    }
                }
            }
        }
        return view('student.which_exams', ['quizs'=>$quizs]);
    }
    public function exams_view($id)
    {
        $questions=azmoon::find($id)->question()->get();
        $name=azmoon::find($id)->name;
        return view('student.exams', ['questions'=>$questions,'id'=>$id,'name'=>$name]);
    }
    public function exam_submit($id,Request $request)
    {
        
    }
}
