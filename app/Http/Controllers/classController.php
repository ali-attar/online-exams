<?php

namespace App\Http\Controllers;

use App\Models\classp;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\classUsers;
use Auth;

class classController extends Controller
{
    public function class()
    {
        if (in_array('admin',Auth::user()->permision())) {
            $class=classp::get();
        }
        else {
            $class=classp::where('admin_id', Auth::user()->id)->get();
        }
        return view('manager.class',compact('class') );
    }
    public function create(Request $request)
    {
        $class=new classp;
        $class->name=$request->name;
        if (in_array('manager',Auth::user()->permision()) and !in_array('admin' ,Auth::user()->permision())){
            $class->admin_id=Auth::user()->id;
        }
        if (!in_array('manager',Auth::user()->permision()) and in_array('admin' ,Auth::user()->permision())){
            $class->admin_id=User::where('name',$request->admin)->first()->id;
        }
        $class->save();
        return redirect()->route('class');
    }
    public function users($id)
    {
        $users=classp::find($id)->classUsers()->get();
        $user=[];
        foreach ($users as $t) {
            array_push($user,User::find($t->user_id));
        }
        return view('manager.class_users', ['users'=>$user,'id'=>$id]);
    }
    public function users_add($id)
    {
        $name=classp::find($id)->name;
        return view('manager.class_add_user',['name'=>$name,'id'=>$id]);
    }
    public function users_adding(Request $request,$id)
    {
        $users=classp::find($id)->classUsers()->get();
        $user=[];
        foreach ($users as $t) {
            array_push($user,User::find($t->user_id));
        }
        $user_id=[];
        foreach ($user as $a) {
            array_push($user_id,$a->id);
        }
        if (!in_array(User::where('code_melli',$request->code_melli)->first()->id,$user_id)) {
            $a=new classUsers;
            $a->class_id=$id;
            $a->user_id=User::where('code_melli',$request->code_melli)->first()->id;
            $a->save();
        }
        return redirect()->route('class_users', $id);
    }
    public function delete_user($id,$user)
    {
        classUsers::where('user_id',$user)->delete();
        return redirect()->route('class_users', $id);
    }
    public function delete_class($id)
    {
        classUsers::where('class_id',$id)->delete();
        classp::find($id)->delete();
        return redirect()->route('class');
    }
}