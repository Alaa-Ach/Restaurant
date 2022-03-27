<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Nette\Utils\Json;

class AdminController extends Controller
{
    //USERS
    public function usersIndex(){
        $users=User::all();
        return view("AdminDashboard.Users")->with('users',$users);
    }

    public function userDelete(Request $request){
        $user=User::find($request->id)->delete();



        return response()->json(['success'=>$request->id]);
    }


    public function platsIndex(){

        return view("AdminDashboard.Plats");
    }
}
