<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\permision;
use App\Models\classUsers;
use App\Models\classp;
use App\Models\User;
use App\Models\permisionUser;

class adminController extends Controller
{
    public function permision(Request $request)
    {
        $per=new permision;
        $per->role_persian = $request->permision_fa;
        $per->role_english = $request->permision_en;
        $per->save();
        return redirect()->route('permision_view');
    }
    public function changeUser(Request $request,$id)
    {
        $user=User::find($id);
        $user->name=$request->name;
        $user->code_melli=$request->code_melli;
        $user->phone_number=$request->phone_number;
        $user->email=$request->email;
        if ($request->permision != 'nothing') {
            $permision_user=new permisionUser;
            $permision_user->permision_id = permision::where('role_english',$request->permision)->first()->id ;
            $permision_user->user_id = $user->id;
            $permision_user->save();
        }
        $user->save();
        return redirect()->route('users');
    }
    public function changeUserpage($id)
    {
        return view('admin.changeUser',compact('id'));
    }
    public function deletePermisionUser($id,$per)
    {
        permisionUser::find($per)->delete();
        return redirect()->route('users');
    }
    public function deleteUser($id)
    {
        if ($id!=1) {
            User::find($id)->delete();
            permisionUser::where('user_id',$id)->delete();
            classp::where('admin_id',$id)->delete();
            classUsers::where('user_id',$id)->delete();
        }
        return redirect()->route('users');
    }
}