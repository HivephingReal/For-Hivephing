<?php


namespace App\Http\Controllers;

use App\FirebaseModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kreait\Firebase\Configuration;
use Kreait\Firebase\Firebase;

class FirebasemessageController extends FirebasehelperController
{    //
    public function __construct()
    {
//        $this->middleware('auth',['except'=>'sendnoti']);
    }

    public function store_token(Request $request){
        $user_id=Auth::user()->id;
        $token=$request->token;
        $old_token=FirebaseModel::where('user_id',Auth::user()->id);
        if($old_token->count() > 0){
            if($old_token->first()->token == $token){
            }else{
                $old_token->update(['user_id'=>$user_id,'token'=>$token,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
            }
        }else{
            FirebaseModel::create(['user_id'=>$user_id,'token'=>$token,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
        }
        return response()->json(['data'=>'return from server']);

    }
    public function sendnoti(){
        $ff=FirebasehelperController::sendnotimsg($body='body test',$title='Title test',$token=["e8ynnXytKfs:APA91bEm4FlKQH_QGFJHUwGHVz6n-LL30fkCEZ_ZuOx_QsCVrEck_4A4ZAw1rn7t-X59FkT1Pe5AUK4TXAJncE0ub3oAuLHZOSWanOzTMrKDhErnUSCde6treZMPdMI7955_V35F6Vio"]);
        return $ff;

    }
    public function store(Request $request){
        $user_id=FirebaseModel::where('id',1)->first();
        if($user_id->token ===$request->user_token){
            return gettype($user_id->token);
        }
        else{
            return gettype($user_id->token) .gettype($request->user_token).'<br>'.$user_id->token.'<br>'.$request->user_token;
        }

//        FirebasehelperController::store_firebase_data($ptitle='efe',$user_id='101',$date=Carbon::now(),$project_id='33',$project_description='effefefefe',$status='unread');

    }

}
