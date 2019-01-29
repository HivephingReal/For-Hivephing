<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    //

    public function get_noti($id){
         $noti=DB::table('notification')->where([['for_whom_user_id','=',$id],['read_or_un','=','unread']]);
         return response()->json(['count'=>$noti->count()]);

    }
    public function clear_noti($id){
//        $noti=DB::table('notification')->where('for_whom_user_id',$id)->update(['read_or_un'=>'read']);
        return response()->json(['count'=>0]);

    }
}
