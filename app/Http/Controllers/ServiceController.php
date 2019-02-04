<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class ServiceController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function pending_service_show()
    {
//          $get_all_pending=DB::table('relation_user_post_and_op')
//              ->where([['op_id', Auth()->guard('admin')->user()->id],['process','pending']])->get();

        if(Auth::guard('admin')->user()->role == 'admin')
        {
            $get_all_pending = DB::table('relation_user_post_and_op')->where('process', 'pending')->orderBy('created_at','desc')->get();
        }
        else
        {
            $get_all_pending = DB::table('relation_user_post_and_op')
                ->where(['process' => 'pending', 'op_id' => Auth::guard('admin')->user()->id])->orderBy('created_at','desc')->get();
        }

        return view('for_op.show_pend',['data'=>$get_all_pending]);
    }

    public function confirmed_service()
    {
        if(Auth::guard('admin')->user()->role == 'admin')
        {
            $get_all_pending = DB::table('relation_user_post_and_op')->where('process', 'confirmed')->orderBy('created_at','desc')->get();
        }
        else
        {
            $get_all_pending = DB::table('relation_user_post_and_op')
                ->where([['op_id', auth()->guard('admin')->user()->id], ['process', 'confirmed']])->orderBy('created_at','desc')->get();
        }

        return view('for_op.show_pend',['data'=>$get_all_pending]);
    }

    public function pending_service_detail($id)
    {
        if (Auth::guard('admin')->user()->role == 'admin')
        {
            $get_pending = DB::table('relation_user_post_and_op')->where('id', $id)->first();
             $req_com = DB::connection('mysql_service')
            ->table('request')
            ->where([['post_id', '=', $get_pending->post_id]])
            ->get(); 
        }
        else
        {
            $get_pending = DB::table('relation_user_post_and_op')
                ->where([['op_id', auth()->guard('admin')->user()->id], ['id', $id]])->first();
            
            $req_com = DB::connection('mysql_service')
                        ->table('request')
                        ->where([['post_id', '=', $get_pending->post_id]])
                        ->get(); 
        }

       return view('for_op.detail',['data'=>$get_pending, 'req_com'=> $req_com]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'description' => 'required|min:10|max:15000',
                'address' => 'required|min:5|max:2550',
                'project_define_point' => 'required|numeric',
            ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $old = DB::connection('mysql_service')->table('for_repair')->whereId($id)->first();
        if(!empty($request->file('quotation_file')))
        {
            $request->file('quotation_file')->move(base_path() . '/public/users/entro/qfile/forop', Carbon::now()->timestamp . $request->file('quotation_file')->getClientOriginalName());
            $qfname = Carbon::now()->timestamp . $request->file('quotation_file')->getClientOriginalName();

        }else{
            $qfname ='';
        }


        $data = [
            'description' => $request->description,
            'address' => $request->address,
            'old_description' => $old->description,
            'old_address' => $old->address,
            'project_define_point' => $request->project_define_point,
            'quotation'=>$request->quotation,
            'quotation_file'=>$qfname,
        ];

        DB::connection('mysql_service')->table('for_repair')->whereId($id)->update($data);

        return redirect()->back()->with('update', 'Update Successfully!');
    }
    public function com_see_project($id,$pid){
        $get_com=DB::table('user_saw_this_plan')->where('project_id',$id)->get();
        return view('for_op.see_which_company_see',['data'=>$get_com,'pid'=>$pid]);
    }
    public function delete_post($pid)
    {
        $delete = DB::connection('mysql_service')
                    ->table('for_repair')
                    ->where('id', $pid)
                    ->update(['delete' => 1]);

        return redirect('confirmed_service')->with('delete', 'Successfully deleted!');
    }
    public function view_deletedProjects()
    {
         $del_prj = DB::connection('mysql_service')
                        ->table('for_repair')
                        ->where([['delete', '=', 1]])
                        ->orderBy('created_at','desc')
                        ->get();
         return view('for_op.view_deletedProjects',['data'=>$del_prj]);
    }
    public function restore_post($pid)
    {
        $delete = DB::connection('mysql_service')
                    ->table('for_repair')
                    ->where('id', $pid)
                    ->update(['delete' => 0]);

        return redirect('view_deletedProjects')->with('restore', 'Successfully restored!');
    }
}
