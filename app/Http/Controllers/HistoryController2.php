<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Company;

class HistoryController extends Controller
{
	 public function __construct()
    {
        $this->middleware('admin');
    }

	public function index()
	{
		/*$company = DB::table('company')->orderBy('id','desc')->get();*/
		$now = Carbon::parse($_GET['date'])->format('m');
		$year = Carbon::parse($_GET['date'])->format('Y');
		$plan=DB::table('company_with_plan')->whereMonth('created_at', '=', $now)->whereYear('created_at', '=', $year)->get();  

		if($_GET['plan'] =='yes')
		{
			foreach ($plan as $p)
			{
				$company = DB::table('company')->where('id',$p->com_id);

  //to check and retrieve data

  // 	//echo $c->id."<br>";

  // 	var_dump($c);

  // 		//return view('history.index',['company' => $company]);

  // 	}

				if($company->count() > 0){

//check if user has com

					$comdata=$company->first();

//get com data haha

					echo $comdata->email.''.'<br>';

//show this user email

				}
				else{

					continue;

				}
//var_dump($company);

// foreach ($company as $c) {

// 	//echo $c->id."<br>";

// 	var_dump($c);

// 		//return view('history.index',['company' => $company]);

// 	}


				}
else{
$user = DB::table('users')->whereMonth('created_at', '=', $now)->whereYear('created_at', '=', $year)->get();
foreach ($user as $us)
{
$company = DB::table('company')->where('user_id',$us->id);
//to check and retrieve data
// 	//echo $c->id."<br>";
// 	var_dump($c);
// 	//return view('history.index',['company' => $company]);
// 	}
if($company->count() > 0)
{
    //check if user has com 
	$comdata=$company->first();//get com data haha
	echo $comdata->email.''.'<br>';//show this user email
}

else
{
	continue;
}
//var_dump($company);
// foreach ($company as $c) {
// 	//echo $c->id."<br>";
// 	var_dump($c);
// 		//return view('history.index',['company' => $company]);
// 	}
}
}

}
}
