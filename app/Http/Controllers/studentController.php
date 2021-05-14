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
use App\Models\answer;
use App\Models\answerQuestion;

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
    public function exams_submit($id,Request $request)
    {
        $answer=new answer;
        $answer->user_id=Auth::user()->id;
        $answer->azmoon_id=$id;
        $answer->save();
        $questions=azmoon::find($id)->question()->get();
        $questions_id=[];
        foreach ($questions as $question) {
            array_push($questions_id,$question->id);
        }
        foreach ($questions_id as $question_id) {
            $answer_question=new answerQuestion;
            $answer_question->answer_id=$answer->id;
            $answer_question->question_id=$question_id;
            $answer_question->option_id=$request->$question_id;
            $answer_question->save();
        }
        return redirect()->route('which_exams');
    }
    public function exam_result($id)
    {
        $answer=answer::where('azmoon_id',$id)->where('user_id',Auth::user()->id)->get();
        $answers=$answer[0]->answerQuestion()->get();
        $list_of_answer=[];
        foreach ($answers as $key) {
            $t=question::find($key->question_id);
            $question=$t->question;
            if ($key->option_id==0) {
                $my_option='nothing';
            } else {
                $my_option=option::find($key->option_id)->option;
            }        
            $correct_option=option::find($t->answer)->option;
            $new_answer=[$question,$my_option,$correct_option];
            array_push($list_of_answer,$new_answer);
        }
        return view('student.result_exam', ['id'=>$id,'answers'=>$list_of_answer]);
    }
}
