<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Record;
use App\User;
use App\Card;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    //
   /*public function __construct()
    {
        $this->middleware('auth');
    }*/
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $user_id=Auth::id();
        $user=User::find($user_id);
        $card=$user->card;
        if($card)
        {
            $account=$card->account;

            return view('account/list')->withAccount($account);
        }
        else {
            return view('account/list')->withErrors('请绑定银行卡');
        }

    }
    public function transfer(){
        return view('account/transfer');
    }
    public function transfer_save(Request $request){
        $user_id=Auth::user()->id;
        $card_id=User::find($user_id)->card->card_id;
        $record=new Record;
        $record->card_id=$card_id;
        $record->in_or_out="出账";
        $record->quantity=$request->input('account');

        $record_other=new Record;
        $record_other->card_id=$request->input('card_id');
        $record_other->in_or_out="进账";
        $record_other->quantity=$request->input('account');

        $pwdin=$request->input('pwd');
        $pwdtrue=User::find($user_id)->card->pwd;
        $account=$request->input('account');
        $card_num_other=$request->input('card_id');
        $card_other=DB::table('cards')->where('card_id',$card_num_other)->first();

        $accounttrue=User::find($user_id)->card->account;
        if($pwdin==$pwdtrue&&$account<=$accounttrue&&$card_other)
        {
            $card_id_other=$card_other->id;
            $card=User::find($user_id)->card;
            $money=$card->account;
            $card->account=$money-$account;
            $card->save();

            $card_other=Card::find($card_id_other);
            $money_other=$card_other->account;
            $card_other->account=$money_other+$account;
            $card_other->save();
            $record->save();
            $record_other->save();

            return Redirect::to('/account');
        }
        else{
            return Redirect::back()->withInput()->withErrors('输入信息有误！');
        }


    }
    public function in(){
        return view('account/in');
    }
    public function in_save(Request $request){
       $user_id=Auth::id();
        $card=User::find($user_id)->card;
        $old_account=$card->account;
        $add=$request->input('account');
        $card->account=$old_account+$add;
        if($card->pwd==$request->input('pwd'))
        {
            $card->save();

            $record=new Record;
            $record->card_id=$card->card_id;
            $record->in_or_out="存款";
            $record->quantity=$add;
            $record->save();

            return view('account/list')->withAccount($card->account);
        }
        else{
            return view('account/in')->withErrors('密码错误');
        }


    }
    public function out(){
        return view('account/out');
    }
    public function out_save(Request $request){
        $user_id=Auth::id();
        $card=User::find($user_id)->card;
        $old_account=$card->account;
        $sub=$request->input('account');

        if(($card->pwd==$request->input('pwd'))&&($sub<$old_account))
        {
            $card->account=$old_account-$sub;
            $card->save();

            $record=new Record;
            $record->card_id=$card->card_id;
            $record->in_or_out="取款";
            $record->quantity=$sub;
            $record->save();
            return view('account/list')->withAccount($card->account);
        }
        else{
                return view('account/out')->withErrors('密码错误或者余额不足');
        }

    }
}
