<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $user=User::find(Auth::id());
$user_id=Auth::id();
        if($user->card)
        {
            $card_id=DB::table('cards')->where('user_id',$user_id)->value('card_id');
            //$records=$card->records()->get();
            $records=DB::table('records')->where('card_id',$card_id)->get();
            return view('/history/show')->withRecords($records);
        }
        else
        {
            return view('/history/error')->withErrors('请绑定银行卡');
        }
    }
}
