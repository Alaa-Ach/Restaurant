<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function index(){

    return view('home');
    }


    public function Admin(){

    return view('Admin');
    }

    public function checkAuth(){
        $userType=Auth::user()->usertype;
        if($userType=='1'){
           return view('AdminDashboard.AdminPanel');
        }
        else{
        //   return view('UserDashboard.UserPanel');
            return redirect("/");
        }

        }

    public function redirect(){

        $userType=Auth::user()->usertype;
        if($userType=='1'){
           return redirect("/Admin");
        }
        else{
            return redirect("/");
        }


      //  return view('Admin');

    }

}
