<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Card;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
class CardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $user_id=Auth::id();
        //$user=User::find($user_id);
        $card=DB::table('cards')->where('user_id',$user_id)->first();
if($card)
{
    return view('card/show')->withCard($card);
}
        else{
            return view('card/list')->withErrors('请绑定银行卡');
        }

    }
    public function save(Request $request){
        $user_id=Auth::id();
        $user=User::find($user_id);
        $card=new Card;
        $card->user_id=$user_id;
        $card->card_id=$request->input('card_id');
        $card->pwd=$request->input('pwd');
        $card->account=1000;
        $card->save();
        return view('/card/show')->withCard($card);
    }

        public function delete($id)
        {
            $card= Card::find($id);
            $card->delete();

            return Redirect::to('/account');
        }
public function change_pwd(){
    return view('card/change_pwd');
}
    public function save_pwd(Request $request){
        $user_id=Auth::id();
       // $card=DB::table('cards')->where('user_id',$user_id)->first();
        $card=User::find($user_id)->card;
        $new_pwd=$request->input('new_pwd');
        $old_pwd=$request->input('old_pwd');
        $pwd_confirm=$request->input('pwd_confirm');
        $pwd=$card->pwd;
        if($pwd==$old_pwd&&$new_pwd==$pwd_confirm){
            $card->pwd=$new_pwd;
            $card->save();
            return redirect('/account');
        }
        else{
        return Redirect::back()->withInput()->withErrors('输入有误！');
        }
    }
}
