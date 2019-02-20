<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Company;
use Illuminate\Support\Facades\Validator;

class HistoryController extends Controller
{
	 public function __construct()
    {
        $this->middleware('admin');
    }

	public function index()
	{
		$company = DB::table('company')->get(); 
		$company_with_plan = DB::table('company_with_plan')->get(); 
		return view('history.index', ['company' => $company, 'company_with_plan' => $company_with_plan]);
	}

	public function monthly_registered_companies_now($date)
	{
		$validator = Validator::make(
            [
                'date' => 'required|date'
            ]);

		if ($validator->fails()) {
            return redirect()->back();
        }
        else
        {
			$month = Carbon::parse($date)->format('m');
			$year = Carbon::parse($date)->format('Y');
			$monthName = date("F", mktime(0, 0, 0, $month, 10));
			$com_list = DB::table('company')->whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->get(); 

			return view('history.com_list', ['com_list' => $com_list, 'month' => $monthName, 'year' => $year]);
		}
	}
	public function monthly_registered_companies(Request $request)
	{
		$validator = Validator::make($request->all(),
            [
                'month' => 'required|numeric',
                'year' => 'required|numeric'
            ]);

		if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        else
        {
        	$month = $request->month;
			$year = $request->year;
			$monthName = date("F", mktime(0, 0, 0, $month, 10));
			$com_list = DB::table('company')->whereMonth('created_at', '=', '0'.$month)->whereYear('created_at', '=', $year)->get();

			return view('history.com_list', ['com_list' => $com_list, 'month' => $monthName, 'year' => $year]);
        }
		
	}

	public function monthly_registered_companies1()
	{
		$now = Carbon::parse($_GET['date'])->format('m');
		$year = Carbon::parse($_GET['date'])->format('Y');
		$plan=DB::table('company_with_plan')->whereMonth('created_at', '=', $now)->whereYear('created_at', '=', $year)->get();  

		if($_GET['plan'] =='yes')
		{
			foreach ($plan as $p)
			{
				$company = DB::table('company')->where('id',$p->com_id);

				if($company->count() > 0){
					$comdata=$company->first();
					echo $comdata->email.''.'<br>';
				}
				else{
					continue;
				}
			}
		}
		else{

			$user = DB::table('users')->whereMonth('created_at', '=', $now)->whereYear('created_at', '=', $year)->get();

			foreach ($user as $us)
			{
				$company = DB::table('company')->where('user_id',$us->id);

				if($company->count() > 0)
				{
					$comdata=$company->first();
					echo $comdata->email.''.'<br>';
				}

				else
				{
					continue;
				}
			}
		}
	}
}
