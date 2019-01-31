<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'Auth\LoginController@showLoginForm');


Auth::routes();

Route::get('/home', 'HomeController@index');
//for api
Route::post('/for_api/copy_logo', 'AccessoriesforapiController@copy_photo_from_api');
//end for api

Route::get('/welcome', function () {
    return view('welcome.welcome');
});

Route::get('/adminhome', 'AdminAuth\AdminHomeController@index');
Route::post('Admin_login', 'AdminAuth\LoginController@login');
Route::get('Admin_login', 'AdminAuth\LoginController@showLoginForm');

Route::get('Admin_register', 'AdminAuth\RegisterController@showRegistrationForm');
Route::post('Admin_register', 'AdminAuth\RegisterController@register');
Route::post('register_one', 'registerTwoController@register_one');
Route::get('register', 'registerTwoController@register_one_blade');
//this is for enterprise
Route::get('entra_dashboard', 'EntroController@index');
Route::get('company_register_form', 'EntroController@company_register_form');
Route::get('company_register_form_two', 'EntroController@company_register_form');
Route::get('company_register_form_three', 'EntroController@company_register_form');
Route::post('company_register_form_two', 'EntroController@company_register_form_two');
Route::post('company_register_form_three', 'EntroController@company_register_form_three');
Route::post('company_register', 'EntroController@company_register');


Route::get('business_news', 'EntroController@businessnew');
Route::get('othernews', 'EntroController@othernews');
Route::get('company_detail/{id}', 'EntroController@company_detail');
Route::get('other_company_detail/{id}', 'EntroController@other_company_detail');
Route::get('company_edit_form/{id}', 'EntroController@company_edit_form');
Route::post('company_edit', 'EntroController@company_edit');
Route::post('business_plan_upload', 'BusinessController@business_plan_upload');
Route::get('business_plan_edit/{id}', 'BusinessController@business_plan_edit_form');
Route::get('business_plan_delete/{id}', 'BusinessController@business_plan_delete');
Route::post('business_plan_edit', 'BusinessController@business_plan_edit');
//route for op.
Route::get('pending_service', 'ServiceController@pending_service_show');
Route::get('confirmed_service', 'ServiceController@confirmed_service');
Route::get('service/detail/{id}', 'ServiceController@pending_service_detail');
Route::post('service/detail/{id}/edit', 'ServiceController@update');
Route::get('see_which_company_see_thist/{id}/{pid}', 'ServiceController@com_see_project');


//end route for op
Route::get('service/detail/confirm/{id}', 'ConfirmserviceController@confirm_service');
Route::group(['prefix' => 'entra'], function () {

//get all noti for companies
    Route::get('get_noti/{id}', 'NotificationController@get_noti');
    Route::get('clear_noti/{id}', 'NotificationController@clear_noti');

    //construct projects
    // add_form_for_other_paint
    Route::get('construct_projects', 'ConstructprojectsController@get_projects');
    Route::post('upload_quotation', 'ConstructprojectsController@upload_quotation');
    Route::get('send_quotation', 'ConstructprojectsController@sendquotation');
    Route::get('request_quotation', 'ConstructprojectsController@request_quotation');
    Route::get('construct_project_detail/{id}', 'ConstructprojectsController@detail');


    Route::get('construct_project_detail_one/{id}', 'ConstructprojectsController@construct_project_detail_one');//project id


//portfolio

    Route::get('portfolio/add', 'PortfolioController@add');
    Route::post('portfolio/add', 'PortfolioController@add_data');
    Route::get('portfolio/list', 'PortfolioController@portfolio');
    Route::get('portfolio/delete/{id}', 'PortfolioController@delete');
    Route::get('portfolio/edit/{id}', 'PortfolioController@edit_form');
    Route::post('portfolio/edit/{id}', 'PortfolioController@edit');


//end portfolio
    //Ki Ki
    Route::get('upload_project', 'UploadprojectController@upload_project');
    Route::post('upload_project', 'UploadprojectController@upload_project2');
    Route::get('view_project', 'UploadprojectController@view_project');

////////////////////////////////////////////////////////////////////////////////////

    Route::get('construct_send_mail/{pid}', 'ConstructprojectsController@send_message_form');
    Route::get('construct_mail_view/{mid}', 'ConstructprojectsController@construct_message_view');
    Route::post('construct_send_mail', 'ConstructprojectsController@send_message');
    Route::get('price', 'PriceforitemsController@addform');
    Route::get('add_form_for_paint', 'PriceforitemsController@add_form_for_paint');
    Route::get('add_form_for_other_paint', 'PriceforitemsController@add_form_for_other_paint');
    Route::get('add_form_for_new_build_paint', 'PriceforitemsController@add_form_for_new_build_paint');
    Route::post('add_for_paint', 'PriceforitemsController@add_for_paint');
    Route::get('edit_form_for_paint/{id}', 'PriceforitemsController@edit_form_for_paint');
    Route::post('edit_for_paint/{id}', 'PriceforitemsController@edit_for_paint');
    Route::post('price', 'PriceforitemsController@add');
    //end cp
    Route::get('business_plan_detail/{id}', 'BusinessController@business_plan_detail');
    Route::get('business_plan', 'EntroController@bussiness_plan_form');
    Route::get('bussiness_plan_view', 'BusinessController@business_plan_view');
    Route::get('send_msg', 'EntroController@send_msg');
    Route::get('send_msg_delete/{id}', 'EntroController@send_msg_delete');
    Route::get('send_msg_view/{id}', 'EntroController@send_msg_view');
    Route::get('received_msgs', 'EntroController@received_msg');
    Route::get('received_msg_delete/{id}', 'EntroController@received_msg_delete');
    Route::get('received_msg_view/{id}', 'EntroController@received_msg_view');
    Route::get('entra_activities', 'EntraActivityController@activity');
    Route::get('other_activities/{id}', 'EntraActivityController@other_activity');
    Route::post('create_activity', 'EntraActivityController@create_activity');
    Route::get('edit_activity_form/{id}', 'EntraActivityController@edit_activity_form');
    Route::post('edit_activity', 'EntraActivityController@edit_activity');
    Route::get('delete_activity/{id}', 'EntraActivityController@activity_delete');
    Route::get('create_activity', 'EntraActivityController@create_activity_form');
    Route::get('get_mail_ajax/{id}', 'EntrotwoController@get_mail_ajax');
    Route::get('get_bmail_ajax/{id}', 'EntrotwoController@get_bmail_ajax');
    Route::get('project', 'EntrotwoController@project_dashboard');
    Route::get('create_project', 'EntrotwoController@create_project_form');
    Route::post('create_project', 'EntrotwoController@create_project');
    Route::get('edit_project/{id}', 'EntrotwoController@edit_project_form');
    Route::post('edit_project/{id}', 'EntrotwoController@edit_project');
    Route::get('project_view', 'EntrotwoController@project_view');
    Route::get('send_message_project_form/{id}/{projectid}', 'EntrotwoController@send_message_project_form');
    Route::post('send_message_project', 'EntrotwoController@send_message_project');
    Route::get('project_detail/{id}', 'EntrotwoController@project_detail');
    Route::get('delete_project/{id}', 'EntrotwoController@delete_project');
    Route::get('other_project_view', 'EntrotwoController@other_project_view');
    Route::get('other_project_detail/{id}', 'EntrotwoController@other_project_detail');
    Route::post('adv_search', 'EntroController@adv_search');
    Route::get('adv_search', function () {
        return redirect()->back();
    });

    //entro profile
    Route::get('profile_detail/{id}', 'ProfileController@index');
    Route::post('profile_detail/{id}', 'ProfileController@update');
    Route::post('changepassword/{id}', 'ChangepasswordController@change');
    //end entro profile

    //start plan
    Route::get('show_plans', 'PlanfrontController@show_plans');
    Route::get('buy_plan/{p}', 'PlanfrontController@buy_plan_form');
    Route::post('buy_plan', 'PlanfrontController@buy_plan');
    Route::get('buy_plan', function () {
        return redirect('entra/show_plans');
    });
    Route::get('reply_mail_for_bplan/{bplan_id}', 'BplanmailController@reply_mail_from_entra_form');
    Route::post('reply_mail_for_bplan/{bplan_id}', 'BplanmailController@reply_mail_from_entra');
    Route::post('send_mail_for_bplan/{bplan_id}', 'BplanmailController@send_mail_from_inves');
    Route::get('mails/{date?}', 'EntramailController@see_all_mails');
    Route::get('send_mails/{date?}', 'EntramailController@send_mails');
    Route::get('received_mails/{date?}', 'EntramailController@received_mails');
    Route::get('view_mail/{id}', 'EntramailController@view_mails');

    //end plan

    //send mail for project

    Route::get('send_mail_for_project/{project_id}', 'ProjectmailController@send_mail_form');
    Route::post('send_mail_for_project/{project_id}', 'ProjectmailController@send_mail');
    Route::get('view_mail_for_project/{mail_id}', 'ProjectmailController@view_mail');
    Route::get('reply_mail_for_project/{mail_id}', 'ProjectmailController@reply_mail');
    Route::get('pmail/all_mails/{date?}', 'ProjectmailController@all_mails');
    Route::get('pmail/psendmails/{date?}', 'ProjectmailController@send_mails_list');
    Route::get('pmail/precvmails/{date?}', 'ProjectmailController@project_received_mails');


    //end mail for project
});
//end enterprise


//this is for investor
//Route::group(['prefix' => 'inves'], function () {
//    Route::get('dashboard', 'InvesController@index');
//    Route::get('search', 'InvesController@search_form_main');
//    Route::post('search', 'InvesController@search');
//    Route::post('adv_search', 'InvesController@adv_search');
//    Route::get('adv_search', function () {
//        return redirect()->back();
//    });
//
//    Route::get('business_plan_detail/{id}', 'InvesController@business_plan_detail');
//    Route::get('business_proposals', 'InvesController@business_proposals');
//    Route::get('othernews', 'InvesController@othernews');
//    Route::get('send_msg', 'InvesController@send_msg');
//    Route::get('send_msg_delete/{id}', 'InvesController@send_msg_delete');
//    Route::get('send_msg_view/{id}', 'InvesController@send_msg_view');
//    Route::get('received_msgs', 'InvesController@received_msg');
//    Route::get('received_msg_delete/{id}', 'InvesController@received_msg_delete');
//    Route::get('received_msg_view/{id}', 'InvesController@received_msg_view');
//    Route::get('inves_activities', 'InvesAcitivityController@activity');
//    Route::post('create_activity', 'InvesAcitivityController@create_activity');
//    Route::get('create_activity', 'InvesAcitivityController@create_activity_form');
//    Route::get('edit_activity_form/{id}', 'InvesAcitivityController@edit_activity_form');
//    Route::post('edit_activity', 'InvesAcitivityController@edit_activity');
//    Route::get('delete_activity/{id}', 'InvesAcitivityController@activity_delete');
//    Route::get('see_company/{id}', 'InvesController@see_company');
//    Route::get('see_company_activities/{id}', 'InvesController@see_company_activities');
//    Route::get('reply_message/{id}', 'InvesController@reply_message_form');
//    Route::post('reply_message', 'InvesController@reply_msg');
//    Route::get('events', 'InvesController@events');
//    Route::get('other_activities/{id}', 'InvesAcitivityController@other_activity');
//    Route::get('inves_profile/profile_detail/{id}', 'ProfileController@inves_index');
//    Route::post('inves_profile/profile_detail/{id}', 'ProfileController@inves_update');
//    Route::post('inves_profile/changepassword/{id}', 'ChangepasswordController@change');
//
//
//    Route::get('invess/business_news', 'InvesController@businessnew');
//
//    Route::get('inves/plans', 'InvesController@get_plan');
//    Route::get('inves_require', 'InvesController@invest_require_form');
//    Route::post('inves_require', 'InvesController@invest_require');
//    Route::get('inves_require_detail', 'InvesController@inves_req_detail');
//    Route::get('inves_req_edit', 'InvesController@inves_req_edit_form');
//    Route::post('inves_req_edit', 'InvesController@inves_req_edit');
//    Route::get('getlike/{id}', 'InvesController@getlike');
//    Route::get('delike/{id}', 'InvesController@delike');
//    Route::post('sendmail', 'InvesController@sendMail');


//end investor

//
//    //send mail for bplan
//    Route::get('send_mail_for_bplan/{bplan_id}', 'BplanmailController@send_mail_from_inves_form');
//    Route::post('send_mail_for_bplan/{bplan_id}', 'BplanmailController@send_mail_from_inves');
//    Route::get('see_all_mails/{date?}','InvestMailsController@see_all_mails');
//    Route::get('send_mails/{date?}','InvestMailsController@send_mails');
//    Route::get('received_mails/{date?}','InvestMailsController@received_mails');
//    Route::get('view_mail/{id}','InvestMailsController@view_mails');
//
//
//
//    //end mail
//
//});


// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// start show_case
Route::group(['prefix' => 'show_case'], function () {
########################################################
    Route::get('/', 'ShowcaseController@index');###
#######################################################
    Route::get('add', 'ShowcaseController@add');

    Route::post('add', 'ShowcaseController@save');

    Route::get('delete/{id}', 'ShowcaseController@delete');

    Route::get('edit/{id}', 'ShowcaseController@edit');

    Route::post('edit/{id}', 'ShowcaseController@update');

});
Route::get('entra/other_company_detail/{user_id}/show_case/products', 'ShowcaseController@others');
Route::get('inves/other_company_detail/{user_id}/show_case/products', 'ShowcaseController@others');


// end show_case


//ajax get

Route::get('get_cities_ajax/{id}', 'AjaxGetController@get_cities_ajax');
Route::get('get_country_ajax/{id}', 'AjaxGetController@get_country_ajax');


//end ajax get
//centralized functions
Route::get('see_tenders', 'TendersFrontController@see_tenders');
Route::get('asso_see_tenders', 'TendersFrontController@asso_see_tenders');
Route::get('read_tender/{id}', 'TendersFrontController@see_tenders_detail');

//end cf
//start association
Route::get('asso/asso_register', 'AssoController@asso_register_form');
Route::post('asso/asso_register', 'AssoController@asso_register');
Route::get('asso/asso_detail', 'AssoController@asso_detail');
Route::get('asso/asso_detail_edit', 'AssoController@asso_detail_edit_form');
Route::post('asso/asso_detail_edit', 'AssoController@asso_detail_edit');
Route::get('asso/requests', 'AssoController@request_message');
Route::get('asso/request_view/{id}', 'AssoController@request_view');
Route::get('asso/confirm_request/{id}', 'AssoController@confirm_request');
Route::get('asso/members', 'AssoController@members');
Route::get('asso/member_detail/{id}', 'AssoController@member_detail');
Route::get('asso/see_company_activities/{id}', 'AssoController@see_company_activities');
Route::get('asso/dashboard', 'AssoController@index');
Route::get('asso/activities', 'AssoController@activity');
Route::get('asso/create_activity', 'AssoController@create_activity_form');
Route::post('asso/create_activity', 'AssoController@create_activity');
Route::get('asso/asso_activities', 'AssoController@activity');
Route::post('asso/create_activity', 'AssoController@create_activity');
Route::get('asso/edit_activity_form/{id}', 'AssoController@edit_activity_form');
Route::post('asso/edit_activity', 'AssoController@edit_activity');
Route::get('asso/business_news', 'AssoController@businessnew');
Route::get('asso/othernews', 'AssoController@othernews');
Route::get('asso/events', 'AssoController@events');
Route::get('asso/user_profile', 'AssoUserController@user_profile');
//end association
//fee
Route::get('balance_not_enough', function () {
    return view('balance.note');
});
Route::get('expire', function () {
    return view('balance.expire');
});
//endfee


// Category

Route::get('maincategory', 'MaincatController@index');
Route::get('add_maincat', 'MaincatController@add');
Route::post('add_maincat', 'MaincatController@save');
Route::get('maincategory/delete/{id}', 'MaincatController@delete');
Route::get('maincategory/edit/{id}', 'MaincatController@edit');
Route::post('maincategory/update/{id}', 'MaincatController@update');

// end category


// Design

Route::get('design', 'DesignController@index');
Route::get('design/add_design', 'DesignController@add');
Route::post('design/add_design', 'DesignController@save');
Route::get('design/delete/{id}', 'DesignController@delete');
Route::get('design/edit/{id}', 'DesignController@edit');
Route::post('design/edit/{id}', 'DesignController@update');

// end design

// Start Construct

//Route::get('construct', 'ConstructController@index');
//Route::get('');
Route::group(['prefix' => 'construct'], function () {
    Route::get('/', 'ConstructController@index');
    Route::get('/add_construct', 'ConstructController@add');
    Route::post('add_construct', 'ConstructController@save');
    Route::get('/delete/{id}', 'ConstructController@delete');
    Route::get('edit/{id}', 'ConstructController@edit');
    Route::post('edit/{id}', 'ConstructController@update');
});
// end construct
//for admin
##KI KI### admin
//dashboard
Route::get('/dashboard', 'ProjectController@index');
//all projects
Route::get('show_all_projects', 'ProjectController@show_all_projects');
Route::get('projects/months/{id}', 'ProjectController@projects_by_month');
Route::get('projects/detail/{id}', 'ProjectController@projects_detail');
Route::get('projects/project/detail/{id}', 'ProjectController@projects_by_month');
Route::get('projects/months/show_detail/{id}', 'ProjectController@projects_detail');
Route::get('show_detail/{id}', 'ProjectController@projects_detail');
Route::get('/projects/project/detail/show_detail/{id}', 'ProjectController@projects_detail');
//confirmed projects
Route::get('projects/confirmed', 'ProjectController@confirmed_projects');
Route::get('confirmed_projects/months/{id}', 'ProjectController@confirmed_projects_by_month');
Route::get('confirmed_projects/months/confirmed_projects/months/project/detail/{id}', 'ProjectController@projects_confirmed_detail');
//pending projects
Route::get('projects/pending', 'ProjectController@pending_projects');
Route::get('projects/pending_detail/{id}', 'ProjectController@projects_pending_detail');
Route::get('pending_projects/months/{id}', 'ProjectController@pending_projects_by_month');
Route::get('pending_projects/months/pending_detail/{id}', 'ProjectController@projects_pending_detail');
Route::get('/projects/projects/project/detail/{id}', 'ProjectController@projects_confirmed_detail');
//requested projects to users by companies 
Route::get('/ee', function () {
    $ok = DB::connection('mysql_service')
        ->table('request')
        ->where([['post_uploader_id', '=', '59']])
        ->get();
    $i = 0;
    echo "<h1>Post_uploader_id : 59 </h1><br>The requested companies' ids are <br> ";
    foreach ($ok as $k) {
        $i++;
        $company = DB::table('company')
            ->where([['user_id', '=', $k->requester_id]])
            ->first();;
        echo $i . ". Company ID : " . $k->requester_id . "<br> Company Name : " . $company->name;
        echo "<br>requested time : " . \Carbon\Carbon::createFromTimeStamp(strtotime($k->created_at))->diffForHumans() . "<hr>";
    }
});
Route::get('/adminDashboard', 'IndexController@index');
Route::get('/register_fee', 'RegisterfeeController@index');
Route::get('/register_fee/edit/{id}', 'RegisterfeeController@edit_form');
Route::post('/register_fee/edit/{id}', 'RegisterfeeController@edit');
Route::get('/register_fee/view/{id}', 'RegisterfeeController@detail');
Route::get('/add_register_fee', 'RegisterfeeController@add_fee_form');
Route::post('/add_register_fee', 'RegisterfeeController@add_fee');
Route::get('/plans', 'PlansController@index');
Route::get('/plan/view/{id}', 'PlansController@view');
Route::get('/plan/edit/{id}', 'PlansController@edit_plan_form');
Route::get('/plans_detail/view/{id}', 'PlansController@detail');
Route::get('/add_plan', 'PlansController@add_plan_form');
Route::post('/add_plan', 'PlansController@add_plan');
Route::post('/plan/edit/{id}', 'PlansController@edit');
Route::get('/news', 'NewsController@index');
Route::get('/tenders', 'TenderController@index');
Route::get('tenders/upload', 'TenderController@upload');
Route::get('tenders/view/{id}', 'TenderController@view');
Route::get('tenders/delete/{id}', 'TenderController@delete');
Route::get('tenders/edit/{id}', 'TenderController@edit');
Route::post('tenders/edit/{id}', 'TenderController@update');
Route::post('tenders/upload', 'TenderController@save');
Route::get('events', 'EventsController@index');
Route::get('events/upload', 'EventsController@upload');
Route::post('events/upload', 'EventsController@save');
Route::get('events/edit/{id}', 'EventsController@edit');
Route::post('events/edit', 'EventsController@update');
Route::get('events/view/{id}', 'EventsController@view');
Route::get('events/delete/{id}', 'EventsController@delete');
Route::get('news/view/{id}', 'NewsController@view');
Route::get('news/upload', 'NewsController@upload');
Route::post('news/upload', 'NewsController@save');
Route::get('news/edit/{id}', 'NewsController@edit');
Route::post('news/edit/{id}', 'NewsController@update');
Route::get('news/delete/{id}', 'NewsController@delete');
Route::get('newsCategory', 'NewsCategoryController@index');
Route::get('newsCategory/upload', function () {
    return view('NewsCategory.upload');
});
Route::post('newsCategory/upload', 'NewsCategoryController@upload');
Route::get('newsCategory/edit/{id}', 'NewsCategoryController@edit');
Route::post('newsCategory/edit/{id}', 'NewsCategoryController@save');
Route::get('newsCategory/delete/{id}', 'NewsCategoryController@delete');
Route::get('cities', 'CityController@index');
Route::get('cities/upload', 'CityController@upload');
Route::post('cities/upload', 'CityController@save');
Route::get('cities/edit/{id}', 'CityController@edit');
Route::post('cities/edit/{id}', 'CityController@update');
Route::get('cities/delete/{id}', 'CityController@delete');
Route::get('countries', 'CountryController@index');
Route::get('countries/upload', function () {
    return view('Country.upload');
});
Route::post('countries/upload', 'CountryController@upload');
Route::get('countries/edit/{id}', 'CountryController@edit');
Route::post('countries/edit/{id}', 'CountryController@update');
Route::get('countries/delete/{id}', 'CountryController@delete');
Route::get('businesshub', 'BusinessHubController@index');
Route::get('businesshub/upload', 'BusinessHubController@news');
Route::post('businesshub/upload', 'BusinessHubController@upload');
Route::get('businesshub/edit/{id}', 'BusinessHubController@edit');
Route::post('businesshub/edit/{id}', 'BusinessHubController@update');
Route::get('businesshub/delete/{id}', 'BusinessHubController@delete');
Route::get('businessgroup', 'BusinessGroupController@index');
Route::get('businessgroup/upload', function () {
    return view('BusinessGroup.upload');
});
Route::post('businessgroup/upload', 'BusinessGroupController@upload');
Route::get('businessgroup/edit/{id}', 'BusinessGroupController@edit');
Route::post('businessgroup/edit/{id}', 'BusinessGroupController@update');
Route::get('businessgroup/delete/{id}', 'BusinessGroupController@delete');
Route::get('businessgroup/view/{id}', 'BusinessGroupController@view');
//end admin
Route::get('error', function () {
    return view('errors.error');
});
Route::get('test', function () {
    return view('user.entra.dashboard_mail');
});
// operation
Route::group(['prefix' => 'operation'], function () {
    Route::get('/', 'OperationController@index');
    Route::get('/view/{id}', 'OperationController@view');
    Route::get('/add', 'OperationController@add');
    Route::post('/add', 'OperationController@save');
    Route::get('/delete/{id}', 'OperationController@delete');
    Route::get('/edit/{id}', 'OperationController@edit');
    Route::post('/edit/{id}', 'OperationController@update');
    //for work
    Route::get('/first_work_form', 'OperationController@first_work_form');
    Route::post('/first_work', 'OperationController@first_work');
    Route::get('/first_work_list', 'OperationController@first_work_list');
    //end work
});
// end operation
// free plan
Route::get('/free_plan', 'FreePlanController@index');
Route::get('free_plan/add', 'FreePlanController@add');
Route::post('free_plan/add', 'FreePlanController@save');
Route::get('free_plan/edit/{id}', 'FreePlanController@edit');
Route::post('free_plan/edit/{id}', 'FreePlanController@update');
// end free plan
//construct plan
Route::get('construct_plan', 'ConstructplanadminController@construct_plan_all');
Route::get('edit_cplan/{id}', 'ConstructplanadminController@edit_cplan');
Route::post('edit_cplan/{id}', 'ConstructplanadminController@edit_cplan_save');
//end construct plan
// Rating
Route::post('rating', 'RatingController@rate');
Route::get('company_detail/{id}/rating', 'EntroController@rating');
// end rating
Route::get('gen_psw', function () {
    return bcrypt('234567');
});
// end rating
Route::get('mail', 'ConfirmserviceController@test_mail');
Route::get('about_us', function () {
    return view('user.entra.about_us');
});
//for plan
Route::get('companies', 'CompanyController@get_all_companies');
Route::get('companies/detail/{id}', 'CompanyController@com_detail');
Route::get('companies/add_plan/{id}', 'CompanyController@add_plan');
Route::post('companies/add_plan', 'CompanyController@add_plan_save');
Route::get('companies/see_projects/{user_id}', 'CompanyController@see_projects');

//end plan
//construct projects
Route::get('get_project', 'ConstructController@get_project_form');
Route::post('get_project', 'ConstructController@get_project');
//end construct projects
//block function
Route::get('companies/block/{id}', 'CompanyController@block');
Route::get('companies/unblock/{id}', 'CompanyController@unblock');
Route::get('block', 'Auth\BlockUserController@blockPage');
//end block function
//without_auth
Route::get('see_project_without_auth', function () {
    return view('without_auth.projects');
});
Route::get('usage', function () {
    return view('usage.projects');
});
Route::get('detail_without_auth/{id}', 'ConstructprojectsController@detail_without_auth');
Route::get('entra/invite_com', 'ConstructprojectsController@invite_com');
Route::get('entra/detail_invite_project/{id}', 'ConstructprojectsController@detail_invite_project');
Route::get('entra/detail_project_without_request/{id}', 'ConstructprojectsController@detail_project_without_request');

//end without_auth


//close
Route::post('close_project', 'CloseprojectController@close_project');
Route::post('open_project', 'CloseprojectController@open_project');
//end close project


//portfolio


Route::post('store_fcm', 'FirebasemessageController@store');
Route::get('change_psw/{email}', function ($email) {
    $new_password = bcrypt('123456');
    if (\Illuminate\Support\Facades\DB::table('users')->where('email', $email)->update(['password' => $new_password])) {
        return 'nice ommo';
    } else {
        return 'check your email';
    }

});


Route::post('store_token', 'FirebasemessageController@store_token');


Route::get('send_noti', 'FirebasemessageController@sendnoti');

//Recommend system
Route::get('recommend1', 'RecommendController@recommend_form1');
Route::post('recommend2', 'RecommendController@recommend_form2');
Route::post('recommend2_1', 'RecommendController@recommend_form2_1');
Route::post('recommend3', 'RecommendController@recommend_form3');
Route::post('recommend4', 'RecommendController@recommend_form4');
Route::post('recommend5', 'RecommendController@recommend_form5');
Route::post('recommend6', 'RecommendController@recommend_form6');
Route::post('recommend7', 'RecommendController@recommend_form7');
Route::post('recommend8', 'RecommendController@recommend_form8');
Route::post('recommend9', 'RecommendController@recommend_form9');
Route::post('recommend10', 'RecommendController@recommend_form10');
Route::post('recommend11', 'RecommendController@recommend_form11');
Route::post('recommend12', 'RecommendController@recommend_form12');
Route::post('recommend13', 'RecommendController@recommend_form13');
Route::post('recommend14', 'RecommendController@recommend_form14');


