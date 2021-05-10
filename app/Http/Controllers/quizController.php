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

class quizController extends Controller
{
    public function create_quiz(Request $request)
    {
        $quiz=new azmoon;
        $quiz->start_time=$request->start_time;
        $quiz->end_time=$request->end_time;
        $quiz->name=$request->name;
        $quiz->date=$request->date;
        $quiz->admin_id=Auth::user()->id;
        $quiz->save();
        return redirect()->route('quiz_sets');
    }
    public function quiz_sets()
    {
        if (in_array('admin',Auth::user()->permision())) {
            $return_quiz=azmoon::get();
        } 
        else {
            $return_quiz=Auth::user()->azmoon()->get();
        }        
        return view('quiz.quiz_sets', ['quizs'=>$return_quiz]);
    }
    public function question($id)
    {
        $question=question::where('azmoon_id',$id)->get();
        $category=[];
        foreach ($question as $q) {
            if (!in_array(categoryAzmoon::find($q->category_azmoon_id)->name,$category)){
                array_push($category,categoryAzmoon::find($q->category_azmoon_id)->name);
            }
        }
        $questions=[];
        foreach ($category as $index) {
            $questions[$index]=[];
        }
        foreach ($question as $q) {
            array_push($questions[categoryAzmoon::find($q->category_azmoon_id)->name],$q);
        }
        return view('quiz.questions', ['id'=>$id ,'questions'=>$questions,'catagory'=>$category]);
    }
    public function question_set_view($id)
    {
        return view('quiz.add_question', ['id'=>$id]);
    }
    public function question_set($id,Request $request)
    {
        $q=new question;
        $q->question=$request->question;
        $q->azmoon_id=$id;
        $cat=new categoryAzmoon;
        $cat->name=$request->category;
        $cat->azmoon_id=$id;
        $cat->save();
        $q->category_azmoon_id=$cat->id;
        $q->save();
        return redirect()->route('question_view', ['id'=>$id] );
    }
    public function add_option_view($id,$id_question)
    {
        return view('quiz.add_option', ['id'=>$id,'id_question'=>$id_question]);
    }
    public function add_option(Request $request,$id,$id_question)
    {
        $opt=new option;
        $opt->option=$request->option;
        $opt->question_id=$id_question;
        $opt->save();
        if ($request->check=='on'){
            $question=question::find($id_question);
            $question->answer=$opt->id;
            $question->save();
        }
        return redirect()->route('question_view', ['id'=>$id] );
    }
    public function del_option($id,$id_option)
    {
        option::find($id_option)->delete();
        return redirect()->route('question_view', ['id'=>$id] );
    }
    public function del_question($id,$id_question)
    {
        $opts=question::find($id_question)->option()->get();
        foreach ($opts as $opt) {
            $opt->delete();
        }
        question::find($id_question)->delete();
        return redirect()->route('question_view', ['id'=>$id] );   
    }
    public function del_exam($id)
    {
        $examq=azmoon::find($id)->question()->get();
        foreach ($examq as $question) {
            question::find($question->id)->option()->delete();
        }
        azmoon::find($id)->question()->delete();
        azmoon::find($id)->categoryAzmoon()->delete();
        azmoon::find($id)->delete();
        return redirect()->route('quiz_sets');
    }

    public function edit_question_view($id,$id_question)
    {
        $question=question::find($id_question);
        $category=question::find($id_question)->categoryAzmoon()->get();
        return view('quiz.edit_question',['question'=>$question,'id'=>$id,'id_question'=>$id_question,'category'=>$category[0]->name]);
    }
    public function edit_question($id,$id_question,Request $request)
    {
        $question=question::find($id_question);
        $question->question = $request->question;
        $question->save();
        $category=question::find($id_question)->categoryAzmoon()->get();
        $category[0]->name=$request->category;
        $category[0]->save();
        foreach ( question::find($id_question)->option()->get() as $option) {
            $t=$option->id;
            $option->option=$request->$t;
            $option->save();
        }
        return redirect()->route('question_view', ['id'=>$id] ); 
    }
    public function edit_exam_view($id)
    {
        return view('quiz.edit_quiz', ['id'=>$id,'quiz'=>azmoon::find($id)]);
    }
    public function edit_exam($id,Request $request)
    {
        $azmoon=azmoon::find($id);
        $azmoon->start_time=$request->start_time;
        $azmoon->end_time=$request->end_time;
        $azmoon->date=$request->date;
        $azmoon->save();
        return redirect()->route('quiz_sets');
    }
    public function exam_class($id)
    {
        $azmoon=azmoon::find($id);
        $azmoon_class=$azmoon->azmoonClass()->get();
        $class=[];
        foreach ($azmoon_class as $azmoonClass) {
            foreach ($azmoonClass->classp()->get() as $key) {
                array_push($class,$key);
            }
        }
        return view('quiz.exam_class',['id'=>$id,'class'=>$class]);
    }
    public function add_exam_class_view($id)
    {
        return view('quiz.add_exam_class', ['id'=>$id]);
    }
    public function add_exam_class($id,Request $request)
    {
        $ac=new azmoonClass;
        $ac->azmoon_id=$id;
        $ac->class_id=$request->class_id;
        $ac->save();
        return redirect()->route('exam_class', $id);
    }
    public function exam_class_users($id,$class_id)
    {
        $users=classp::find($class_id)->classUsers()->get();
        $user=[];
        foreach ($users as $t) {
            array_push($user,User::find($t->user_id));
        }
        return view('quiz.exam_class_user', ['users'=>$user,'id'=>$id]);
    }
    public function exam_class_del($id,$class_id)
    {
        $ac=azmoonClass::where('class_id',$class_id)->where('azmoon_id',$id)->get();
        $ac[0]->delete();
        return redirect()->route('exam_class', $id);
    }
}
