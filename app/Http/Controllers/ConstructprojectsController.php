<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ConstructprojectsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['detail_without_auth']]);
        $this->middleware('block', ['except' => ['detail_without_auth']]);

        $this->middleware('NeedToRegister', ['except' => ['detail_without_auth']]);
    }

    public function sendquotation()
    {
        return view('user.entra.send_quotation');
    }

    public function get_projects()
    {
        $con_com_data = DB::table('company')->where('user_id', Auth::user()->id)->first();

        switch ($con_com_data->business_hub) {
            case 1 :
                $fr = ['fr4', 'rb4'];
                break;
            case 2:
                $fr = ['fr3', 'rb3'];
                break;
            case 3:
                $fr = ['fr5', 'fr5'];
                break;
            case 4:
                $fr = ['fr1', 'rb2'];
                break;

            case 5:
                $fr = ['fr7', 'fr7'];
                break;

            case 6:
                $fr = ['fr8', 'rb5'];
                break;

            case 7:
                $fr = ['fn1', 'fn2', 'fn3', 'fn4'];
                break;

            case 8:
                $fr = ['fr6', 'fn2', 'fn3', 'fn4'];
                break;
            case 9:
                $fr = ['rb1', 'b1', 'b2', 'b3'];
                break;
            case 10:
                $fr = ['fr8', 'rb5'];
                break;

        }

//        $data = DB::connection('mysql_service')->table('for_repair')->where([['city', '=', $con_com_data->city_id], ['close', 0], ['confirm', '=', 'confirmed']])->whereIn('fr_type',$fr);
        // under function is temp function
        $data = DB::connection('mysql_service')->table('for_repair')->where([['city', '=', $con_com_data->city_id], ['confirm', '=', 'confirmed']])->whereIn('fr_type', $fr)->orderBy('updated_at', 'desc');

//        $limit_q=DB::table('user_saw_this_plan')->where('project_id',$data->id)->count();
//        $user_saw_this=DB::table('user_saw_this_plan')->where([['project_id','=',$data->id],['user_id',Auth::user()->id]])->count();
//        $user_saw_this=DB::table('user_saw_this_plan')->where([['project_id','=',$data->id],['user_id',Auth::user()->id]])->count();


        $darray = [];

        foreach ($data->get() as $d) {
            $limit_q = DB::table('user_saw_this_plan')->where('project_id', $d->id)->count();
//
//            if($limit_q <= $d->quotation)
//            {
//                $user_saw_this = DB::table('user_saw_this_plan')->where([['project_id','=',$d->id],['user_id',Auth::user()->id]])->count();
//
//                if($user_saw_this > 0)
//                {
//                    $darray[]=$d;
//
//                }
//                else
//                {
//                    continue;
//                }
//            }
//            else
//            {
            $darray[] = $d;
//            }

        }
        $dc = collect($darray)->paginate(6);

        return view('user.entra.construct_projects', ['data' => $dc]);

//        dd($point);
    }

    public function detail_without_auth($id)
    {
        Session::put('no_auth', 'yes');
        return redirect('entra/construct_project_detail/' . $id);
    }

    public function upload_quotation(Request $request)
    {
        if (!empty($request->file('quotation_file'))) {
            $request->file('quotation_file')->move(base_path() . '/public/users/entro/qfile/', Carbon::now()->timestamp . $request->file('quotation_file')->getClientOriginalName());
            $qfname = Carbon::now()->timestamp . $request->file('quotation_file')->getClientOriginalName();

        } else {
            $qfname = '';
        }
        DB::connection('mysql_service')->table('upload_form_for_quo')->insert(['project_id' => $request->pid, 'com_id' => $request->cid, 'file' => $qfname, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        Session::flash('send', 'send');
        return redirect()->back();
    }


    //for detail with request

    public function construct_project_detail_one($id)
    {
        //this is real detail function
        $data = DB::connection('mysql_service')->table('for_repair')->where('id', $id)->first();
        $check = DB::connection('mysql_service')->table('request')->where([['post_id', '=', $data->id], ['post_uploader_id', '=', $data->user_id], ['requester_id', '=', Auth::user()->id]])->count();
        if ($check == 0) {
            DB::connection('mysql_service')->table('request')->insert(['post_id' => $id, 'post_uploader_id' => $data->user_id, 'status' => 'rq', 'requester_id' => Auth::user()->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        } else {
            $to_check = DB::connection('mysql_service')->table('request')->where([['post_id', '=', $data->id], ['post_uploader_id', '=', $data->user_id], ['requester_id', '=', Auth::user()->id]])->first();
            if ($to_check->status == 'con') {
                $com_data = DB::table('company')->where('user_id', '=', Auth::user()->id)->first();
                $message_data = DB::connection('mysql_service')->table('message')->where([['post_id', '=', $id], ['com_id', '=', $com_data->id]])->orderBy('created_at', 'desc')->get();
                return view('user.entra.construct_project_detail', ['data' => $data, 'message_data' => $message_data]);

            }

        }

        $com_data = DB::table('company')->where('user_id', '=', Auth::user()->id)->first();
        $message_data = DB::connection('mysql_service')->table('message')->where([['post_id', '=', $id], ['com_id', '=', $com_data->id]])->orderBy('created_at', 'desc')->get();
        return view('user.entra.construct_project_detail_one', ['data' => $data, 'message_data' => $message_data]);
    }

    //end detail with request

    public function detail($id)
    {
        $d = DB::connection('mysql_service')->table('for_repair')->where('id', $id)->first();

        $limit_q = DB::table('user_saw_this_plan')->where('project_id', $id)->count();

        if ($limit_q >= $d->quotation) {
            Session::flash('ex', 'Expired');

            return redirect('entra/construct_projects');
        }
        //to check user already see this project
        $castp = DB::table('see_projects_with_plan')->where([['user_id', '=', Auth::user()->id], ['project_id', '=', $id]])->count();
        if ($castp == 0) {
            //for free plan
            $limit = DB::table('user_get_free_plan')->where('user_id', '=', Auth::user()->id);
            //take user's free plan
            $get_define_point = DB::connection('mysql_service')->table('for_repair')->where('id', $id)->first();
            //get projects define point
            $com = DB::table('company')->where('user_id', Auth::user()->id)->first()->id;
            //get user's company id
            $com_plan = DB::table('company_with_plan')->where('com_id', $com);
            //get company's plan


            if ($limit->count() > 0) //if user's have free plan
            {
                $free_plan_data = DB::table('free_plan')->where('id', $limit->first()->free_plan_id)->first();
                //get free plan data

                if ($limit->first()->end_date < Carbon::now()) //if user's free plan is not expired
                {
                    //for free plan
                    //check his remaining point and bonus point is greater than project define point
                    if (($limit->first()->remaining_point + $limit->first()->increase_point) >= $get_define_point->project_define_point) {
                        // if his remaining point is enough for project define point
                        if (($limit->first()->remaining_point - $get_define_point->project_define_point) >= 0) {
                            //get point from his remaining point
                            $new_rem_point = ($limit->first()->remaining_point - $get_define_point->project_define_point);
                            //put bonus point for him
                            $new_bonus_point = $limit->first()->increase_point + $free_plan_data->increase;
                        } else {
                            //if his remaining point is equal to 0
                            if ($limit->first()->remaining_point == 0) {
                                //get point from his bonus point
                                $new_bonus_point = ($limit->first()->increase_point - $get_define_point->project_define_point);
                                $new_rem_point = 0;
                                $new_bonus_point = $new_bonus_point;
                            } else {
                                //if his remaining point is less than project define point
                                if ($limit->first()->remaining_point < $get_define_point->project_define_point) {
                                    $half_reduce_point = $get_define_point->project_define_point - $limit->first()->remaining_point;
                                    $aku_point = $limit->first()->increase_point - $half_reduce_point;
                                    $new_rem_point = 0;
                                    $new_bonus_point = $aku_point;
                                } else {
                                    $new_rem_point = $limit->first()->remaining_point - $get_define_point->project_define_point;
                                    $new_bonus_point = $limit->first()->increase_point;

                                }

                            }

                        }

                        $new_see_point = $limit->first()->see_point + 1;
                        DB::table('user_get_free_plan')->where('user_id', '=', Auth::user()->id)->update(['remaining_point' => $new_rem_point, 'see_point' => $new_see_point, 'increase_point' => $new_bonus_point]);
                    } elseif ($com_plan->count() > 0) //warning need to check again
                    {
                        if ($com_plan->count() > 1) {
                            $com_rm_m = 0;

                            foreach ($com_plan->get() as $p) {
                                $com_rm_m += $p->remaining_point;
                            }
                            //                     dd($com_rm_m);
                        } else {
                            $com_rm = $com_plan->first()->remaining_point;
                            //                    dd($com_rm);

                        }


                        if (isset($com_rm) && ($com_rm >= $get_define_point->project_define_point)) {
                            $sub = $com_rm - $get_define_point->project_define_point;
//                     dd($sub_m);

                            DB::table('company_with_plan')->where('com_id', $com)->update(['remaining_point' => $sub]);
                            DB::table('see_projects_with_plan')->insert(['user_id' => Auth::user()->id, 'plan' => 'plan', 'project_id' => $id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
                            DB::table('user_saw_this_plan')->insert(['user_id' => Auth::user()->id, 'project_id' => $id, 'created_at' => Carbon::now()]);
                        } elseif ($com_rm_m >= $get_define_point->project_define_point) {
                            $sub_m = round(($com_rm_m - $get_define_point->project_define_point) / 2);
//                    dd($sub_m);
                            DB::table('company_with_plan')->where('com_id', $com)->update(['remaining_point' => $sub_m]);
                            DB::table('see_projects_with_plan')->insert(['user_id' => Auth::user()->id, 'plan' => 'plan', 'project_id' => $id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
                            DB::table('user_saw_this_plan')->insert(['user_id' => Auth::user()->id, 'project_id' => $id, 'created_at' => Carbon::now()]);
                        } else {
                            Session::flash('expire', 'yes');
                            return redirect('entra/construct_projects');
                        }
                    } else {
                        Session::flash('not_permit', 'no');
                        return redirect('entra/construct_projects');
                    }
                } else {
                    //for buying plan

                    Session::flash('expire', 'yes');
                    return redirect('entra/construct_projects');
                }

                DB::table('see_projects_with_plan')->insert(['user_id' => Auth::user()->id, 'plan' => 'free', 'project_id' => $id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
                DB::table('user_saw_this_plan')->insert(['user_id' => Auth::user()->id, 'project_id' => $id, 'created_at' => Carbon::now()]);

            } elseif ($com_plan->count() > 0) {
                if ($com_plan->count() > 1) {
                    $com_rm_m = 0;

                    foreach ($com_plan->get() as $p) {
                        $com_rm_m += $p->remaining_point;
                    }
//                    dd($com_rm_m);
                } else {
                    $com_rm = $com_plan->first()->remaining_point;
//                    dd($com_rm);

                }


                if (isset($com_rm) && $com_rm >= $get_define_point->project_define_point) {
                    $sub = $com_rm - $get_define_point->project_define_point;
//                     dd($sub_m);

                    DB::table('company_with_plan')->where('com_id', $com)->update(['remaining_point' => $sub]);
                    DB::table('see_projects_with_plan')->insert(['user_id' => Auth::user()->id, 'plan' => 'plan', 'project_id' => $id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
                    DB::table('user_saw_this_plan')->insert(['user_id' => Auth::user()->id, 'project_id' => $id, 'created_at' => Carbon::now()]);
                } elseif ($com_rm_m >= $get_define_point->project_define_point) {
                    $sub_m = round(($com_rm_m - $get_define_point->project_define_point) / 2);
//                    dd($sub_m);
                    DB::table('company_with_plan')->where('com_id', $com)->update(['remaining_point' => $sub_m]);
                    DB::table('see_projects_with_plan')->insert(['user_id' => Auth::user()->id, 'plan' => 'plan', 'project_id' => $id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
                    DB::table('user_saw_this_plan')->insert(['user_id' => Auth::user()->id, 'project_id' => $id, 'created_at' => Carbon::now()]);
                } else {
                    Session::flash('expire', 'yes');
                    return redirect('entra/construct_projects');
                }
            } else {
                Session::flash('expire', 'yes');
                return redirect('entra/construct_projects');
            }


            //end for free plan

        }


        $data = DB::connection('mysql_service')->table('for_repair')->where('id', $id)->first();
        $com_data = DB::table('company')->where('user_id', '=', Auth::user()->id)->first();
        $message_data = DB::connection('mysql_service')->table('message')->where([['post_id', '=', $id], ['com_id', '=', $com_data->id]])->orderBy('created_at', 'desc')->get();
        return view('user.entra.construct_project_detail', ['data' => $data, 'message_data' => $message_data]);
    }

    public function send_message_form($post_id)
    {
        $post_data = DB::connection('mysql_service')->table('for_repair')->where('id', $post_id)->first();
        $user_data = DB::connection('mysql_service')->table('users')->where('id', $post_data->user_id)->first();
        return view('user.entra.mails.construct_mail.send_msg', ['post_data' => $post_data, 'user_data' => $user_data]);

    }

    public function send_message(Request $request)
    {
        $success = DB::connection('mysql_service')->table('message')->insert(['post_id' => $request->post_id, 'from_user' => 'com', 'user_id' => $user_id, 'com_id' => $request->com_id, 'message' => $request->message, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        $com_data = DB::table('company')->where('user_id', '=', Auth::user()->id)->first();
        $pdata = DB::connection('mysql_service')->table('for_repair')->where('id', $request->post_id)->first();
        DB::connection('mysql_service')->table('relation_com_and_user')->insert(['com_id' => $request->com_id, 'post_id' => $request->post_id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        if ($success) {
            Session::flash('success', 'Successfully send');
            return redirect('entra/construct_project_detail/' . $request->post_id);
        }
    }

    public function construct_message_view($mid)
    {
        $mdata = DB::connection('mysql_service')->table('message')->where('id', $mid)->first();
        $post_data = DB::connection('mysql_service')->table('for_repair')->where('id', $mdata->post_id)->first();
        $user_data = DB::connection('mysql_service')->table('users')->where('id', $mdata->user_id)->first();
        return view('user.entra.mails.construct_mail.mail_view', ['data' => $mdata, 'post_data' => $post_data, 'user_data' => $user_data]);

    }

    ############ Get all request from companies ******* UPLOADER SIDE *****############
    public function get_all_request()
    {
        $d = DB::connection('mysql_service')
            ->table('request')
            ->where('post_uploader_id', 61)
            ->get();

        foreach ($d as $lil_d) {
            echo "id" . $lil_d->id . " "
                . "post_id" . $lil_d->post_id . " "
                . "post_uploader_id" . $lil_d->post_uploader_id . " "
                . "requester_id" . $lil_d->requester_id . " "
                . "<br>";
        }
    }

    ###### User accepts the request **** UPLOADER SIDE *** #######
    public function accept_request()
    {
        $d = DB::connection('mysql_service')
            ->table('request')
            ->where('post_uploader_id', '=', Auth::user()->id)
            ->where('requester_id', '=', $id)
            ->where('post_id', '=', $pid)
            ->update(['accept' => 1]);
    }

    ######################################
    public function invite_com()
    {
        $com_id = DB::table('company')->where('user_id', Auth::user()->id)->first();
        $get_invite = DB::table('invite')->where('company_id', $com_id->id)->paginate(6);
        return view('user.entra.invite_com', ['data' => $get_invite]);


    }

    public function detail_project_without_request($pid)
    {
        $projects_data = DB::connection('mysql_service')->table('for_repair')->where('id', $pid)->first();
        
        //ki fixed here
       $user_saw = DB::table('user_saw_this_plan')->insert(['user_id' => Auth::user()->id,'project_id' => $pid, 'created_at' => Carbon::now()]);
       //$user_saw2 = DB::table('see_projects_with_plan')->insert(['user_id' => Auth::user()->id,'project_id' => $pid, 'created_at' => Carbon::now()]);
        
        return view('user.entra.detail_project_without_request', ['data' => $projects_data]);


    }

    public function detail_invite_project($pid)
    {
        $id = $pid;

        $user_id = Auth::user()->id;
        $get_user_free_plan = DB::table('user_get_free_plan')->where('user_id', $user_id)->first();
        $get_project_data = DB::connection('mysql_service')->table('for_repair')->where('id', $user_id)->first();
        $com_data = DB::table('company')->where('user_id', $user_id)->first();
        $data = DB::connection('mysql_service')->table('for_repair')->where('id', $id)->first();
        //get user's free plan
        if ($data->project_define_point != 0) {
            if ($get_user_free_plan->end_date >= Carbon::now()) {
                //user's free plan is not expire
                $total_free_and_bonus = $get_user_free_plan->remaining_point + $get_user_free_plan->increase_point;
                //sum remain point and increase point
                if ($get_user_free_plan->remaining_point >= $get_project_data->project_define_point) {
                    //if rpoint is enough
                    $new_remaining_point = $get_user_free_plan->remaining_point - $get_project_data->project_define_point;
                    $new_increase_point = $get_user_free_plan->increase_point;

                } elseif ($total_free_and_bonus >= $get_project_data->project_define_point) {
                    //if not rpoint is not enough but total total point is enough
                    $new_remaining_point = 0;
                    $new_increase_point = $total_free_and_bonus - $get_project_data->project_define_point;
                } else {
                    DB::connection('mysql_service')->table('request')->where([['post_id', '=', $pid], ['requester_id', '=', $user_id]])->update(['status' => 'rq']);
                    return response()->json(['data' => $pid]);
                }
                //you will save to database for free plan
                $new_see_point = $get_user_free_plan->see_point + 1;

                DB::table('user_get_free_plan')->where('user_id', $user_id)->update(['remaining_point' => $new_remaining_point, 'increase_point' => $new_increase_point, 'see_point' => $new_see_point]);


            } else {
                //if user's free plan is expire

                $get_user_plan = DB::table('company_with_plan')->where('com_id', $com_data->id);
                //get user's plan data
                if ($get_user_plan->count() > 0) {
                    //check user have plan
                    if ($get_user_plan->first()->remaining_point >= $get_project_data->project_define_point) {
                        $new_plan_rem = $get_user_plan->first()->remaining_point - $get_project_data->project_define_point;
                        DB::table('company_with_plan')->where('com_id', $com_data->id)->update(['remaining_point' => $new_plan_rem]);


                    } else {
                        DB::connection('mysql_service')->table('request')->where([['post_id', '=', $pid], ['requester_id', '=', $user_id]])->update(['status' => 'rq']);
                        return response()->json(['data' => $pid]);
                    }
                } else {
                    //user didnt buy plan
                    DB::connection('mysql_service')->table('request')->where([['post_id', '=', $pid], ['requester_id', '=', $user_id]])->update(['status' => 'rq']);
                    Session::flash('error', 'You have no plan');
                    return redirect()->back();
                }


            }
            if (DB::table('request')->where([['post_id', '=', $pid], ['requester_id', '=', $user_id]])->update(['status' => 'con'])) {

            }
        }


        $com_id = DB::table('company')->where('user_id', Auth::user()->id)->first();

        $user_id = Auth::user()->id;
        $cname = DB::table('cities')->where('id', $data->city)->first();
        $sname = DB::table('states')->where('id', $data->state)->first();
        $data->cname = $cname->name;
        $data->sname = $sname->name;
        if ($data->quotation_type == 0) {
            $data->quotation_type = 1;
        } else {
            $data->quotation_type = 0;
        }
        $fmessage = DB::connection('mysql_service')->table('message')->where([['post_id', '=', $data->id], ['from_user', '=', 'user']]);
        if ($fmessage->count() == 0) {
            $fmsg[] = '';
        } else {
            foreach ($fmessage->get() as $fms) {
                $name = DB::table('company')->where('id', $fms->com_id)->first();
                $fms->com_name = $name->name;
                $fmsg[] = $fms;
            }
        }

        $tmessage = DB::connection('mysql_service')->table('message')->where([['post_id', '=', $data->id], ['from_user', '=', 'com']]);
        if ($tmessage->count() == 0) {
            $tmsg[] = '';
        } else {
            foreach ($tmessage->get() as $tms) {
                $name = DB::table('company')->where('id', $tms->com_id)->first();
                $tms->com_name = $name->name;
                $tmsg[] = $tms;
            }
        }
        $get_request_count = DB::connection('mysql_service')->table('request')->where([['post_id', '=', $id]]);
        $all_grc = [];
        foreach ($get_request_count->get() as $grc) {
            $grc->request_data = DB::table('company')->where('user_id', $grc->requester_id)->first();
            $grc->request_data->post_id = $grc->post_id;
            $grc->request_data->user_id = $grc->requester_id;
            $grc->request_data->com_status = $grc->status;
            $all_grc[] = $grc->request_data;
        }
        $all_rec = [];
        $get_rec = DB::table('company')->where([['business_hub', '=', '9'], ['status', '>', '2']])->get();
        foreach ($get_rec as $rec) {
            $check_ub = DB::table('user_block')->where([['user_id', '=', $rec->user_id], ['circum', '=', 'unblock']])->count();
            if ($check_ub > 0) {
                $all_rec[] = $rec;
            }
        }
        $message_data = DB::connection('mysql_service')->table('message')->where([['post_id', '=', $id], ['com_id', '=', $com_id->id]])->orderBy('created_at', 'desc')->get();
//      return response()->json(['data' => $data, 'fmessage' => $fmsg, 'tmessage' => $tmsg, 'rq_count' => $get_request_count->count(), 'requested_com' => $all_grc, 'all_rec' => $all_rec]);
        return view('user.entra.invite_project_detail', ['data' => $data, 'fmessage' => $fmsg, 'tmessage' => $tmsg]);
    }

    ####### **** REQUESTER SIDE ***COMPANY SIDE**** #######
    public function get_all_accepted_projects()
    {
        $d = DB::connection('mysql_service')
            ->table('request')
            ->where('requester_id', Auth::user()->id)
            ->where('accept', 1)
            ->get();
    }

    ########## To Cancel Request ****** #########
    public function cancel_request($id)
    {
        $requester_id = Auth::user()->id;
        $success = DB::connection('mysql_service')
            ->table('request')
            ->where('requester_id', '=', Auth::user()->id)
            ->where('post_id', '=', $id)
            ->delete();
        echo $success;
    }
    ######################################
}
