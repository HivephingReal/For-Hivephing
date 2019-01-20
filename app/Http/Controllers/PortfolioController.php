<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PortfolioController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['detail_without_auth']]);
        $this->middleware('block', ['except' => ['detail_without_auth']]);

        $this->middleware('NeedToRegister', ['except' => ['detail_without_auth']]);
    }
    public function add(Request $request){
        return view('user.entra.port.new_portfolio_add'); /*ki fixed here*/

    }
    public function add_data(Request $request){


        $validator = Validator::make($request->all(),
            [
                'project_name' => 'required|min:2|max:120',
                'description' => 'required|min:1|max:2220',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'photo' => 'required',
                'address' => 'min:5|max:1600' /*ki fixed here*/
            ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        } else {
            if (!empty($request->file('photo'))) {
                $request->file('photo')->move(base_path() . '/public/users/entro/photo/portfolio/', Carbon::now()->timestamp . $request->file('photo')->getClientOriginalName());
                $logoname = Carbon::now()->timestamp . $request->file('photo')->getClientOriginalName();
            }else{
                $logoname = '';
            }
            if (!empty($request->file('photo1'))) {
                $request->file('photo1')->move(base_path() . '/public/users/entro/photo/portfolio/', Carbon::now()->timestamp . $request->file('photo1')->getClientOriginalName());
                $logoname1 = Carbon::now()->timestamp . $request->file('photo1')->getClientOriginalName();
            }
            else{
                $logoname1 = '';
            }
            if (!empty($request->file('photo2'))) {
                $request->file('photo2')->move(base_path() . '/public/users/entro/photo/portfolio/', Carbon::now()->timestamp . $request->file('photo2')->getClientOriginalName());
                $logoname2 = Carbon::now()->timestamp . $request->file('photo2')->getClientOriginalName();
            }else{
                $logoname2 ='';
            }



            $input = $request->except('_token');
            $input['user_id'] = Auth::user()->id;
            $com_data=DB::table('company')->where('user_id',Auth::user()->id)->first();
            $input['com_id'] = $com_data->id;
            $input['photo'] = $logoname;
            $input['photo1'] = $logoname1;

            $input['photo2'] = $logoname2;

            Portfolio::create($input);
            Session::flash('portfolio', 'added');
            return redirect('entra/portfolio/list');
        }


    }
    public function portfolio(){
        $get_user_prots=DB::table('portfolio')->where('user_id',Auth::user()->id)->get();
        return view('user.entra.port.list',['data'=>$get_user_prots]);
    }
    public function delete($id){
        $check_id=Portfolio::where('id',$id)->first();
        if($check_id->user_id == Auth::user()->id){
            unlink($_SERVER['DOCUMENT_ROOT'] . '/companies/public/users/entro/photo/portfolio/' . $check_id->photo);

            Portfolio::where('id',$id)->delete();
            Session::flash('activity', 'deleted');
            return redirect('entra/portfolio/list');
        }
        else{
            return 'error';
        }
    }
    public function edit_form($id)
    {
        $data = Portfolio::where('id', $id)->first();

        return view('user.entra.port.edit_form', ['data' => $data]);
    }
    public function edit(Request $request)
    {
        $old_data = Portfolio::where('id', $request->id)->first();

        $validator = Validator::make($request->all(),
            [
                'project_name' => 'required|min:2|max:120',
                'description' => 'required|min:1|max:2220',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'address' => 'required|min:5|max:1600'
            ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        } else {
            if (!empty($request->file('photo'))) {
//                if (unlink($_SERVER['DOCUMENT_ROOT'] . '/Company/public/users/entro/photo/portfolio/' . $old_data->photo)) {
//
//                } else {
//                    return 'Cannot Delete';
//                }
                $request->file('photo')->move(base_path() .'/public/users/entro/photo/portfolio/', Carbon::now()->timestamp . $request->file('photo')->getClientOriginalName());
                $logoname = Carbon::now()->timestamp . $request->file('photo')->getClientOriginalName();
            } else {
                $logoname = $old_data->photo;
            }


            if (!empty($request->file('photo1'))) {
//                if (unlink($_SERVER['DOCUMENT_ROOT'] . '/Company/public/users/entro/photo/portfolio/' . $old_data->photo)) {
//
//                } else {
//                    return 'Cannot Delete';
//                }
                $request->file('photo1')->move(base_path() .'/public/users/entro/photo/portfolio/', Carbon::now()->timestamp . $request->file('photo1')->getClientOriginalName());
                $logoname1 = Carbon::now()->timestamp . $request->file('photo1')->getClientOriginalName();
            } else {
                $logoname1 = $old_data->photo1;
            }

            if (!empty($request->file('photo2'))) {
//                if (unlink($_SERVER['DOCUMENT_ROOT'] . '/Company/public/users/entro/photo/portfolio/' . $old_data->photo)) {
//
//                } else {
//                    return 'Cannot Delete';
//                }
                $request->file('photo2')->move(base_path() .'/public/users/entro/photo/portfolio/', Carbon::now()->timestamp . $request->file('photo2')->getClientOriginalName());
                $logoname2 = Carbon::now()->timestamp . $request->file('photo2')->getClientOriginalName();
            } else {
                $logoname2 = $old_data->photo2;
            }
            $input = $request->except('_token');

            $input['user_id'] = Auth::user()->id;
            $input['photo'] = $logoname;
            $input['photo1'] = $logoname1;

            $input['photo2'] = $logoname2;

            Portfolio::where('id', $request->id)->update($input);
            Session::flash('activity','edited');
            return redirect('entra/portfolio/list');
        }
    }

}
