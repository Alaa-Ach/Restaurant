<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\chef;
use App\Models\food;
use App\Models\FormOrder;
use App\Models\Reserve;
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

    //MENU
    public function platsIndex(){

        $food=food::all();

        return view("AdminDashboard.Plats")->with('food',$food);
    }

    public function AddPlat(Request $request){
            // dd($request);
            // $test=$request->title;
            $food =new food;
            $food->title=$request->TitleADD;
            $food->description=$request->DescriptionADD;
            $food->price=$request->PriceADD;


            $imageFile=$request->pictureADD;
            $imageName=time().'.'.$imageFile->extension();

            $request->pictureADD->move(public_path('images/menu'),$imageName);
            $food->image=$imageName;
            $food->save();
        return response()->json(['success'=>"Good"]);
    }

    public function DeletePlat(Request $request){
        food::find($request->idPlat)->delete();

        return response()->json(['success'=>"Good"]);

    }


    public function UpdatePlat(Request $request){
        // dd($request);
        // $imageName=$request->replaceImg->getClientOriginalName();

        $food=food::find($request->idPlat);
        $food->title=$request->title;
        $food->description=$request->description;
        $food->price=$request->price;

        if($request->hasFile('replaceImg')){

            $imageFile=$request->replaceImg;
        $imageName=time().'.'.$imageFile->extension();

        $imageFile->move(public_path('images/menu'),$imageName);
        $food->image=$imageName;

        }else{
            $imageName="";
        }


        $food->save();

        return response()->json(['success'=>$imageName]);

    }


    //chefs
    public function chefsIndex(){
        $chef=chef::all();


        return view('AdminDashboard.Chefs')->with('chefs',$chef);
    }
    public function AddChef(Request $request){
        $chef=new chef();
        $chef->Name=$request->NameADD;
        $chef->Job=$request->JobADD;
        $chef->Fb=$request->FbADD;
        $chef->IG=$request->IGADD;

        $imageFile=$request->pictureADD;
        $imageName=time().'.'.$imageFile->extension();

        $request->pictureADD->move(public_path('images/chefs'),$imageName);

        $chef->Image=$imageName;

        $chef->save();

        return response()->json(['success'=>"Good"]);
    }
    public function DeleteChef(Request $request){
            $idChef=$request->idChef;
            chef::find($idChef)->delete();

            return response()->json(['success'=>"Good"]);

    }


    public function UpdateChef(Request $request){

        $chef=chef::find($request->idChef);
        $chef->Name=$request->Name;
        $chef->Job=$request->Job;
        $chef->Fb=$request->Fb;
        $chef->IG=$request->IG;

        if($request->hasFile('replaceImg')){

            $imageFile=$request->replaceImg;
        $imageName=time().'.'.$imageFile->extension();

        $imageFile->move(public_path('images/chefs'),$imageName);
        $chef->image=$imageName;

        }else{
            $imageName="";
        }


        $chef->save();

        return response()->json(['success'=>$imageName]);
    }



    //Reservation
    public function ReserveIndex(){

      $Reservations= Reserve::all();
        // dd($Reservations);
        return view('AdminDashboard.Reservation')->with('Reservations',$Reservations);
    }

    public function DeleteReserve(Request $request){
        $idReservation=$request->idReservation;
            Reserve::find($idReservation)->delete();
        return response()->json(['success'=>"aha"]);
    }


    //ViewOrders
    public function OrdersIndex(){

    //   $Users= User::all()->where('usertype','!=','1');
      $Orders= FormOrder::all();
        // dd($Reservations);
        return view('AdminDashboard.Orders')->with('Orders',$Orders);
    }




}
