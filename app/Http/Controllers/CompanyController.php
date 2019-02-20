<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function get_all_companies()
    {
        $data = DB::table('company')->orderBy('id','desc')->get();
        return view('companies.index', ['data' => $data]);
    }
     public function see_projects($user_id){
        
        $data = DB::SELECT('SELECT DISTINCT project_id, COUNT(*) as count FROM see_projects_with_plan WHERE user_id = ? GROUP BY project_id ORDER BY project_id asc;',[$user_id]);
        
        return view('companies.see_projects',['data'=>$data, 'user_id'=>$user_id]);
    }

    public function com_detail($id)
    {
        $data = DB::table('company')->where('id', $id)->first();

        $com = Company::where('id', $id)->first();

        $user_id = User::where('id', $com->user_id)->first()->id;


        $circum = DB::table('user_block')->where('user_id', $user_id);
        if($circum->count() > 0){
            $cc=DB::table('user_block')->where('user_id', $user_id)->first()->circum;
        }else{
            $cc =0 ;
        }

        return view('companies.detail', ['data' => $data, 'circum' => $cc]);
    }
    public function block($id)
    {
        $com = Company::where('id', $id)->first();

        $user_id = User::where('id', $com->user_id)->first()->id;

        $block = DB::table('user_block')->where('user_id', $user_id)->first();

        if(isset($block))
        {
            DB::table('user_block')->where('user_id',$user_id)->update(['user_id' => $user_id, 'admin_id' => Auth::guard('admin')->user()->id, 'circum' => 'block']);
        }
        else
        {
            DB::table('user_block')->insert(['user_id' => $user_id, 'admin_id' => Auth::guard('admin')->user()->id, 'circum' => 'block']);
        }

//        dd($circum);

        return redirect()->back()->with(['block' => 'Blocked!']);
    }

    public function unblock($id)
    {
        $com = Company::where('id', $id)->first();

        $user_id = User::where('id', $com->user_id)->first()->id;

        $block = DB::table('user_block')->where('user_id', $user_id)->first();

        if(isset($block))
        {
            DB::table('user_block')->where('user_id',$user_id)->update(['user_id' => $user_id, 'admin_id' => Auth::guard('admin')->user()->id, 'circum' => 'unblock']);
        }
        else
        {
            DB::table('user_block')->insert(['user_id' => $user_id, 'admin_id' => Auth::guard('admin')->user()->id, 'circum' => 'unblock']);
        }

        return redirect()->back()->with('unblock', 'Unblocked!');
    }


    public function add_plan($id)
    {
        $data = DB::table('company')->where('id', $id)->first();
        $remain_free_point = DB::table('user_get_free_plan')->where([['user_id', '=', $data->user_id], ['end_date', '>', Carbon::now()]]);
        if ($remain_free_point->count() > 0) {
            $noti = 1;
            $remain_free_plan_point = $remain_free_point->first();
        } else {
            $noti = 0;

            $remain_free_plan_point = 0;

        }

        return view('companies.plan.addplan', ['data' => $data, 'remain_free_plan_point' => $remain_free_plan_point, 'noti' => $noti]);
    }

    public function add_plan_save(Request $request)
    {
        $get_point = DB::table('construct_plan')->where('id', $request->point)->first();
        $new_point = $get_point->point + $request->addation_points;
        if (DB::table('company_with_plan')->where('com_id', $request->id)->count() > 0) {
            $old_point = DB::table('company_with_plan')->where('com_id', $request->id)->first()->remaining_point;
            $new_add_point = $old_point + $get_point->point + $request->addation_points;

            DB::table('company_with_plan')->where('com_id', $request->id)->update(['plan_id' => $request->point, 'remaining_point' => $new_add_point, 'created_at' => Carbon::now()]);
            return redirect('companies');

        } else {
            DB::table('company_with_plan')->insert(['com_id' => $request->id, 'plan_id' => $request->point, 'remaining_point' => $new_point, 'created_at' => Carbon::now()]);
            return redirect('companies');
        }
    }
}
