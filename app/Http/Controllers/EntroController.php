<?php

namespace App\Http\Controllers;

use App\Acitivity;
use App\AssoModel;
use App\Company;
use App\Events;
use App\BplanMail;
use App\Projectmail;
use App\Invest;
use App\Message;
use App\Plans;
use App\Rating;
use App\Tender;
use App\News;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EntroController extends Controller
{
        //
        public function __construct()
        {
            $this->middleware('auth', ['except' => 'copy_photo_from_api']);
            
            //temp block middleware ,can put this middleware in future

            // $this->middleware('block');

            //end temp block middleware

            // $this->middleware('type', ['except' => ['other_company_detail','copy_photo_from_api']]);
            $this->middleware('NeedToRegister', ['except' => ['company_register_form', 'copy_photo_from_api', 'company_register_form_two', 'company_register_form_three']]);
            // $this->middleware('Plans',['except'=>['company_detail','index','company_register_form','company_register_form_two','copy_photo_from_api','company_register_form_three','company_register','company_edit_form','company_edit']]);
        }

    public function index()
    {

        /** @var this is for need to register your company if not u cannot see other tags */
        /** @var end need to register */
        $bmessage = BplanMail::where([['to_user', '=', Auth::user()->id], ['status', '=', 'unread'], ['soft_del', '=', 'no']])->orWhere([['from_user', '=', Auth::user()->id], ['status', '=', 'unread'], ['soft_del', '=', 'no']])->orderBy('created_at', 'desc')->get();
        $blast = BplanMail::where([['to_user', '=', Auth::user()->id], ['status', '=', 'unread'], ['soft_del', '=', 'no']])->orWhere([['from_user', '=', Auth::user()->id], ['status', '=', 'unread'], ['soft_del', '=', 'no']])->orderBy('created_at', 'desc')->first();

        $pmessage = Projectmail::where([['to_user', '=', Auth::user()->id], ['status', '=', 'unread'], ['soft_del', '=', 'no']])->orWhere([['from_user', '=', Auth::user()->id], ['status', '=', 'unread'], ['soft_del', '=', 'no']])->get();
        $plast = Projectmail::where([['to_user', '=', Auth::user()->id], ['status', '=', 'unread'], ['soft_del', '=', 'no']])->orWhere([['from_user', '=', Auth::user()->id], ['status', '=', 'unread'], ['soft_del', '=', 'no']])->orderBy('created_at', 'desc')->first();


        $get_data = Company::where('user_id', Auth::user()->id)->first();
        if (!empty($get_data)) {
            $bid = $get_data->business_hub;
        } else {
            $bid = '';
        }

        $get_business_group = DB::table('business_hub')->where('id', $bid)->first();
        $imp_events = DB::table('tender')
            ->where('business_hub_id', $get_business_group->business_group_id)
            ->orderBy('created_at', 'desc')->limit(20)->get();
        $events = DB::table('tender')
            ->whereMonth('created_at', '!=', '')
            ->orderBy('created_at', 'desc')
            ->limit(20)->get();
        return view('user.entra.dashboard',
            ['tenders' => $events, 'userid' => Auth::user()->id,
                'pmessage' => $pmessage, 'last' => $plast,
                'bmessage' => $bmessage, 'blast' => $blast]);
    }


    public function company_register_form()
    {
        $company_count = Company::where('user_id', Auth::user()->id)->count();
        if ($company_count == 0) {
            return view('user.entra.company_register');
        }
        $company_data = Company::where('user_id', Auth::user()->id)->first();
        if ($company_data->status == 1) {

            return view('user.entra.company_register_two');
        } elseif ($company_data->status == 2) {
            return view('user.entra.company_register_three');

        } else {
            if ($company_data->status == 3) {
                return redirect('company_detail/' . Auth::user()->id);

            } else {
                return view('user.entra.company_register');
            }
        }
    }

    public function company_register_form_two(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|min:2|max:120',
                'email' => 'required|email|unique:company,email',
                'business_hub' => 'required|min:1|max:20',
                'country_id' => 'required|numeric|min:1',
                'city_id' => 'required|min:1',
                'phone' => 'required|numeric|digits_between:5,40',
                'address' => 'required|min:15|max:600'
            ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $input['website'] = '';
        $input['facebook'] = '';
        $input['investment'] = '';
        $input['logo'] = '';
        $input['registration_status'] = '';
        $input['year_esta'] = '';
        $input['description'] = '';
        $input['ceo_name'] = '';
        $input['ceo_email'] = '';
        $input['status'] = 1;

        if (Company::create($input)) {
            return view('user.entra.company_register_two');
        } else {
            return 'connection error';
        }
    }

    public function company_register_form_three(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'website' => 'max:127',
                'facebook' => 'max:127',
                'investment' => 'required|numeric|min:1|max:2',
                'registration_status' => 'required|numeric|min:1|max:2',
                'description' => 'required|min:12|max:3330',
               'logo' => 'mimes:jpeg,bmp,png,jpg,gif'
            ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        if (!empty($request->file('logo'))) {
            $request->file('logo')->move(base_path() . '/public/users/entro/photo', Carbon::now()->timestamp . $request->file('logo')->getClientOriginalName());

            $logoname = Carbon::now()->timestamp . $request->file('logo')->getClientOriginalName();
            $input = $request->except('_token');
            $input['logo'] = $logoname;

            Company::where('user_id', Auth::user()->id)
                ->update(
                    [
                        'status' => 2,
                        'year_esta' => $request->year_esta,
                        'logo' => $logoname,
                        'website' => $request->website,
                        'facebook' => $request->facebook,
                        'investment' => $request->investment,
                        'registration_status' => $request->registration_status,
                        'year_esta' => $request->year_esta,
                        'description' => $request->description
                    ]);
        } else {
            $input = $request->except('_token');

            Company::where('user_id', Auth::user()->id)
                ->update(
                    [
                        'status' => 2,
                        'year_esta' => $request->year_esta,
                        'website' => $request->website,
                        'facebook' => $request->facebook,
                        'investment' => $request->investment,
                        'registration_status' => $request->registration_status,
                        'year_esta' => $request->year_esta,
                        'description' => $request->description
                    ]);
        }

        Message::create(
            [
                'from_user' => 34,
                'to_user' => Auth::user()->id,
                'title' => 'Welcome From Hivephing',
                'subject' => 'Welcome From Hivephing',
                'from_type' => 'c',
                'to_type' => 'c',
                'status' => 'unread',
                'project_id' => '',
                'type' => '', 'soft_del' => 'no'
            ]);

        return view('user.entra.company_register_three');

    }

    public function company_register(Request $request)
    {
        $company_count = Company::where('user_id', Auth::user()->id)->count();

        $validator = Validator::make($request->all(), ['ceo_name' => 'min:5|max:130', 'ceo_email' => 'email|unique:company,ceo_email']);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            Session::flash('success', 'registered');
            Company::where('user_id', Auth::user()->id)->update(['ceo_name' => $request->ceo_name, 'status' => 3, 'ceo_email' => $request->ceo_email]);
            return redirect('company_detail/' . Auth::user()->id);

        }
    }

    public function company_edit_form($id)
    {
        $old_data = Company::where('id', $id);
        if ($old_data->count() > 0) {
            return view('user.entra.company_detail_edit', ['data' => $old_data->get()]);
        }

    }

    public function company_edit(Request $request)
    {
        $old_data = Company::where('id', $request->id)->first();
        $validator = Validator::make($request->all(), ['name' => 'required|min:2|max:120', 'business_hub' => 'required|min:1|max:20', 'country_id' => 'required|numeric|min:1',
            'city_id' => 'required|numeric', 'logo' => 'mimes:jpeg,bmp,png,jpg,gif', 'address' => 'required|max:1000',
            'email' => 'required|email|unique:company,email,' . $request->id, 'phone' => 'required|numeric|digits_between:5,14',
            'website' => 'max:27', /*ki removed fb validation*/
            'investment' => 'required|numeric|min:1|max:2',
            'registration_status' => 'required|numeric|min:1|max:2',
            'description' => 'required|min:12|max:3330',
            'ceo_name' => 'min:5|max:130',
            'ceo_email' => 'email|unique:company,ceo_email,' . $request->id]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            if (!empty($request->file('logo'))) {


//                if (unlink($_SERVER['DOCUMENT_ROOT'] . '/companies/public/users/entro/photo/' . $old_data->logo)) {
//
//                } else {
//                    return 'Cannot Delete';
//                }
                $request->file('logo')->move(base_path() . '/public/users/entro/photo', Carbon::now()->timestamp . $request->file('logo')->getClientOriginalName());
                $data_photo = Carbon::now()->timestamp . $request->file('logo')->getClientOriginalName();
            } else {
                $data_photo = $old_data->logo;
            }
            $input = $request->except('_token');
            $input['logo'] = $data_photo;
            $input['user_id'] = Auth::user()->id;
            $input['status'] = 3;
            if (Company::where('id', $request->id)->update($input)) {
                Session::flash('success', 'Edited');
                return redirect('company_detail/' . Auth::user()->id);
            } else {
                echo 'Error Please Try Again';
            }
        }
    }

    public function bussiness_plan_form()
    {
        $user = Auth::user();
        if (Carbon::parse($user->created_at)->addDays(15) > Carbon::now()) {
            return view('user.entra.business_plan');

        }
        if ($user->can('create', Plans::class)) {

        } else {
            return view('balance.plan_create_limit');
        }
        return view('user.entra.business_plan');
    }

    public function bussiness_plan(Request $request)
    {
        return $request->all();
    }

    public function businessnew()
    {


        $news = News::where('NewsCategory_id', 1)->orderBy('created_at', 'desc')->paginate(10);
        return view('user.entra.businessnew', ['news' => $news]);
    }

    public function events()
    {

        $get_data = Company::where('user_id', Auth::user()->id)->first();
        if (!empty($get_data)) {
            $bid = $get_data->business_hub;
        } else {
            $bid = '';
        }

        $get_business_group = DB::table('business_hub')->where('id', $bid)->first();
        $imp_events = Events::where('business_hub_id', $get_business_group->business_group_id)->orderBy('created_at', 'desc')->get();
        $events = Events::whereMonth('created_at', '!=', '')->orderBy('created_at', 'desc')->paginate(6);
        return view('user.entra.events', ['events' => $events, 'imp_events' => $imp_events, 'bid' => $bid]);
    }

    public function othernews()
    {
        $news = News::where('NewsCategory_id', 2)->orderBy('created_at', 'desc')->paginate(10);
        return view('user.entra.other_news', ['news' => $news]);
    }

    public function company_detail($id)
    {
        if ($id != Auth::user()->id) {
            return 'error';
        }

        $data = Company::where('user_id', Auth::user()->id)->first();

        $rate = Rating::where('com_id', '=', $data->id)->get()->count();

        if ($data->count() > 0) {
            return view('user.entra.company_detail', ['d' => $data, 'rate' => $rate]);
        }/*cm_detail2       company_detail*/
    }

    public function rating($id)
    {
//        if($id != Auth::user()->id)
//        {
//            return 'error';
//        }

        $data = Rating::where('com_id', $id)->get();

        return view('user.entra.show_rating', ['data' => $data]);
    }

    public function other_company_detail($id)
    {
        $data = Company::where('user_id', $id)->first();

        $rate = Rating::where('com_id', $id)->get()->count();

        if ($data->count() > 0) {
            return view('user.entra.other_com_detail', ['data' => $data, 'rate' => $rate]);
        }
    }

    public function video()
    {
        $target_dir = "users/entro/photo/";
        $target_file = $target_dir . basename($_FILES["video_url"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


        $uploadOk = 1;
        echo $uploadOk;

        move_uploaded_file($_FILES["video_url"]["tmp_name"], $target_file);

    }

    public function send_msg(Request $request)
    {
        $data = DB::table('mail')->where([['from_user', '=', Auth::user()->id], ['from_type', '=', 'c'], ['soft_del', '=', 'no']])->orderBy('created_at', 'desc')->get();
        return view('user.entra.sending_mail', ['data' => $data]);

    }

    public function received_msg(Request $request)
    {
        $data = DB::table('mail')->where([['to_user', '=', Auth::user()->id], ['to_type', '=', 'c'], ['soft_del', '=', 'no']])->orderBy('created_at', 'desc')->get();
        return view('user.entra.received_msg', ['data' => $data]);

    }

    public function send_msg_delete($id)
    {
        $data = Message::where('id', $id)->first();

        if (Auth::user()->id == $data->from_user) {
            if (Message::where('id', $id)->update(['soft_del' => 'yes'])) {
                Session::flash('msg_delete', 'Your msg was successfully deleted');
                return redirect()->back();


            }

        } else {
            return 'error';
        }


    }

    public function see_inves_who_like()
    {
        $inves_user_id = Input::get('inves');
        $inves_data = Invest::where('user_id', $inves_user_id)->first();
        return view('user.entra.see_inves_who_like', ['data' => $inves_data]);

    }

    public function see_inves($id)
    {

        $inves_data = Invest::where('id', $id)->first();
        return view('user.entra.see_inves_who_like', ['data' => $inves_data]);

    }

    public function inves_activity($id)
    {
        $data = Acitivity::where('user_id', $id)->get();
        $inves_data = Invest::where('user_id', $id)->first();
        return view('user.entra.inves_activities', ['data' => $data, 'inves_data' => $inves_data]);

    }

    public function reply_message_form($id)
    {
        $check_user = Company::where('user_id', $id)->count();
        if ($check_user == 0) {
            $check_user = Invest::where('user_id', $id)->count();
            if ($check_user > 0) {
                $user_type = 'i';
                $user_data = Invest::where('user_id', $id)->first();
            } else {
                return 'error';
            }

        } else {
            $user_data = Company::where('user_id', $id)->first();

            $user_type = 'c';
        }


        return view('user.entra.reply_msg', ['com' => $user_data, 'type' => $user_type]);

    }

    public function reply_message(Request $request)
    {
        $id = $request->to_user;
        $check_user = Company::where('user_id', $id)->count();
        if ($check_user == 0) {
            $check_user = Invest::where('user_id', $id)->count();
            if ($check_user > 0) {
                $user_type = 'i';
                $user_data = Invest::where('user_id', $id)->first();
            } else {
                return 'error';
            }

        } else {
            $user_data = Company::where('user_id', $id)->first();

            $user_type = 'c';
        }
        if ($request->from_user != Auth::user()->id) {
            return 'not-allow';

        }
        $input = $request->except('_token');
        $input['from_type'] = 'c';
        $input['to_type'] = $user_type;
        $input['status'] = 'unread';
        $input['soft_del'] = 'no';

        if (Message::create($input)) {
            Session::flash('email', 'replied');

            return redirect('entra/send_msg');

        }

    }

    public function received_msg_delete($id)
    {
        $data = Message::where('id', $id)->first();

        if (Auth::user()->id == $data->to_user) {
            if (Message::where('id', $id)->update(['soft_del' => 'yes'])) {
                Session::flash('msg_delete', 'Your msg was successfully deleted');
                return redirect()->back();


            }

        } else {
            return 'error';
        }


    }

    public function reply_msg(Request $request)
    {
        $id = $request->to_user;
        $check_user = Company::where('user_id', $id)->count();
        if ($check_user == 0) {
            $check_user = Invest::where('user_id', $id)->count();
            if ($check_user > 0) {
                $user_type = 'i';
                $user_data = Invest::where('user_id', $id)->first();
            } else {
                return 'error';
            }

        } else {
            $user_data = Company::where('user_id', $id)->first();

            $user_type = 'c';
        }
        if ($request->from_user != Auth::user()->id) {
            return 'not-allow';

        }
        $input = $request->except('_token');
        $input['from_type'] = 'i';
        $input['to_type'] = $user_type;
        $input['soft_del'] = 'no';

        if (Message::create($input)) {
            Session::flash('email', 'send');

            return redirect()->back();

        }
    }

    public function send_msg_view($id)
    {
        $data = Message::where('id', $id)->first();

        if (Auth::user()->id == $data->from_user) {
            return view('user.entra.msg_view', ['data' => $data]);


        } else {
            return 'error';
        }


    }

    public function received_msg_view($id)
    {
        $data = Message::where('id', $id)->first();
        Message::where('id', $id)->update(['status' => 'read']);

        if (Auth::user()->id == $data->to_user) {
            return view('user.entra.received_msg_view', ['data' => $data]);


        } else {
            return 'error';
        }


    }

    public function search_form()
    {
        return view('user.entra.searching');
    }

    public function searching(Request $request)
    {
        $term = $request->term;

        $data = Company::where('name', 'LIKE', '%' . $term . '%')->take(10)->get();

        $results = array();

        foreach ($data as $v) {
            $results[] = ['id' => $v->id, 'value' => $v->name];
        }

        return response()->json($results);

//        return view('user.entra.searching')->with('data', json_encode($data));

    }

    public function search(Request $request)
    {
        if ($request->type == 'com') {
            $company = Company::where('name', $request->name);
            if ($company->count() > 0) {
                return view('user.entra.other_com_detail', ['data' => $company->first()]);
            } else {
                $asso = AssoModel::where('name', $request->name);
                if ($asso->count() > 0) {
                    return view('user.entra.asso_detail', ['data' => $asso->first()]);
                } else {
                    Session::flash('empty', 'empty');
                    return view('user.entra.search');

                }
            }
        } else {
            $inves = Invest::where('name', $request->name);
            if ($inves->count() > 0) {
                return view('user.entra.see_inves_who_like', ['data' => $inves->first()]);
            } else {
                Session::flash('empty', 'empty');

                return view('user.entra.search');

            }

        }
    }

    public function adv_search(Request $request)
    {
        $com = Company::where([['user_id', '!=', Auth::user()->id,], ['business_hub', '=', $request->business_hub_id], ['country_id', '=', $request->country_id], ['city_id', '=', $request->city_id]])->get();
        $asso = AssoModel::where([['user_id', '!=', Auth::user()->id,], ['business_hub', '=', $request->business_hub_id], ['country', '=', $request->country_id], ['city', '=', $request->city_id]])->get();
        $inves = Invest::where([['user_id', '!=', Auth::user()->id,], ['business_hub_id', '=', $request->business_hub_id], ['country_id', '=', $request->country_id], ['city_id', '=', $request->city_id]])->get();
        return view('user.entra.search_result', ['com' => $com, 'asso' => $asso, 'inves' => $inves]);

    }


    public function upload_project()
    {
        return view('upload_project');
    }


}
