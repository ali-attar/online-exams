<?php

namespace App\Http\Controllers;

use App\Models\classp;
use App\Models\User;
use Illuminate\Http\Request;
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
        $class->admin_id=User::where('name',$request->admin)->first()->id;
        $class->save();
        return redirect()->route('class');
    }
}
