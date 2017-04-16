<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Information;

class InformationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $user_id=Auth::id();
        $user=User::find($user_id);
        if($user->information)
        {
            return view('information/show')->withInformation($user->information);
        }
        else{

                return view('information/list');
        }
    }
    public function save(Request $request){
        $information=new Information;
        $information->user_id=Auth::id();
        $information->name=$request->input('name');
        $information->phone=$request->input('phone');
        $information->sex=$request->input('sex');
        $information->age=$request->input('age');
        $information->ID_card_number=$request->input('ID_card_number');
        $information->save();
        return redirect('account');
    }
    public function edit(){
        $user_id=Auth::id();
        $user=User::find($user_id);
        $information=$user->information;
        return view('information/edit')->withInformation($information);
    }
    public function update(Request $request){
        $user_id=Auth::id();
        $user=User::find($user_id);
        $information=$user->information;
        $information->user_id=Auth::id();
        $information->name=$request->input('name');
        $information->phone=$request->input('phone');
        $information->sex=$request->input('sex');
        $information->age=$request->input('age');
        $information->ID_card_number=$request->input('ID_card_number');
        $information->save();
        return view('information/show')->withInformation($information);
    }
}
