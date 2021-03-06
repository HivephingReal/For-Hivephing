@extends('layouts.inves_layouts.dashboard')

@section('content')

    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->

            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">

                    <li>
                        <span class="list-name">Company detail</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title page_title"> {{$data->name}}'s detail</small>
            </h1>

            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->

            <div class="row">
                <div class="col-md-12 ">
                    <!-- BEGIN Portlet PORTLET-->
                    <div class="portlet solid blue-hoki">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>{{$data->name}}
                            </div>
                            <div style="float:right;">
                                <a href="{{url('entra/other_activities/{id}'.$data->id)}}" class="btn green"> Activities
                                    <i class="fa fa-plus"></i> </a>

                            </div>

                        </div>
                        <div class="portlet-body">
                            <div class="scroller" style="height:200px">
                                <img src="{{asset('users/entro/photo/'.$data->logo)}}" width="152"
                                        style=" vertical-align: text-top;float:left;margin:9px;">

                                </img><p> {{$data->description}} </p>

                            </div>
                        </div>
                    </div>
                    <!-- END Portlet PORTLET-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <!-- BEGIN Portlet PORTLET-->
                    <div class="portlet box blue-hoki">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Ceo Detail
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"> </a>
                                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                <a href="" class="fullscreen"> </a> <a href="javascript:;" class="reload"> </a>
                            </div>
                        </div>

                        <div class="portlet-body">
                            <ul style="list-style:none;padding-left:2px;">
                                <li><i class="fa fa-user" style="float:left;"></i><h5
                                            style="color:#5f5963;font-weight:bold;"> &nbsp; {{$data->ceo_name}}</h5>
                                </li>

                                <li>
                                    <i class="fa fa-envelope" style="float:left;"></i>
                                    <h5 style="color:#5f5963;font-weight:bold;"> &nbsp; {{$data->ceo_email}}</h5>
                                </li>
                                <li><i class="fa fa-phone" style="float:left;"></i> <h5
                                            style="color:#5f5963;font-weight:bold;"> &nbsp; {{$data->ceo_phone}}</h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END Portlet PORTLET-->
                </div>
                <div class="col-md-9">
                    <!-- BEGIN Portlet PORTLET-->
                    <div class="portlet box blue-hoki">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Other Details of Company
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"> </a>
                                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                <a href="" class="fullscreen"> </a> <a href="javascript:;" class="reload"> </a>
                            </div>
                        </div>

                        <div class="portlet-body">
                            <div class="col-md-12 col-lg-6" style="margin-bottom:4px">
                                <h5 style="display:inline;font-weight:bolder;color: #5f5963;">Looking for
                                    investment </h5> :
                                @if ($data->investment == '0')
                                    <i class="fa fa-close" style="color:darkred;"></i>
                                @else
                                    <i class="fa fa-check" style="color:#32c5d2;"></i>
                                @endif
                            </div>
                            <div class="col-md-12 col-lg-6" style="margin-bottom:4px">
                                <h5 style="display:inline;font-weight:bolder;color: #5f5963;">Registration Status </h5>
                                :
                                @if ($data->registration_status == '0')
                                    <i class="fa fa-close" style="color:darkred;"></i>
                                @else
                                    <i class="fa fa-check" style="color:#32c5d2;"></i>
                                @endif

                            </div>
                            <div class="col-md-12 col-lg-6">
                                <h5 style="display:inline;font-weight:bolder;color: #5f5963;">City</h5>
                                :<span style="color:#5f5963;font-weight:bold;"> &nbsp; {{$data->city_id}}</span>

                            </div>
                            <div class="col-md-12 col-lg-6">
                                <h5 style="display:inline;font-weight:bolder;color: #5f5963;">Business type</h5>
                                :<span style="color:#5f5963;font-weight:bold;"> &nbsp;
                                    @php
                                        $city=DB::table('business_hub')->where('id',$data->business_hub)->first();
                                    @endphp
                                    {{$city->description}}
                                    </span>

                            </div>

                            <div class="col-md-12 col-lg-6" style="margin-bottom:4px">
                                <h5 style="display:inline;font-weight:bolder;color: #5f5963;">Country</h5>
                                : <span style="color:#5f5963;font-weight:bold;"> &nbsp; {{$data->country_id}}</span>
                            </div>

                            <div class="col-md-12 col-lg-6" style="margin-bottom:4px">
                                <h5 style="display:inline;font-weight:bolder;color: #5f5963;">Website Link </h5>
                                : <span style="color:#5f5963;font-weight:bold;"> &nbsp;<a href="{{$data->website}}">{{$data->website}}
                                        <span class="fa fa-arrow-right"></span></a> </span>
                            </div>
                            <div class="col-md-12 col-lg-6" style="margin-bottom:4px">
                                <h5 style="display:inline;font-weight:bolder;color: #5f5963;">Facebook Link </h5>
                                : <span style="color:#5f5963;font-weight:bold;"> &nbsp;<a href="{{$data->facebook}}">{{$data->facebook}}
                                        <span class="fa fa-arrow-right"></span></a> </span>
                            </div>
                            &nbsp; &nbsp; &nbsp;
                        </div>
                    </div>
                    <!-- END Portlet PORTLET-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN Portlet PORTLET-->
                    <div class="portlet box blue-hoki">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Contact Info
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"> </a>
                                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                <a href="" class="fullscreen"> </a> <a href="javascript:;" class="reload"> </a>
                            </div>
                        </div>

                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-6">

                                    <ul style="list-style:none;padding-left:2px;">
                                        <li><i class="fa fa-user" style="float:left;"></i>
                                            <h5 style="color:#5f5963;font-weight:bold;"> &nbsp; {{$data->name}}</h5>
                                        </li>

                                        <li>
                                            <i class="fa fa-envelope" style="float:left;"></i>
                                            <h5 style="color:#5f5963;font-weight:bold;"> {{$data->email}}</h5>
                                        </li>
                                        <li><i class="fa fa-phone" style="float:left;"></i> <h5
                                                    style="color:#5f5963;font-weight:bold;">
                                                &nbsp; {{$data->phone}}</h5>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-12 col-lg-6">
                                    <h4 class="title" style="font-weight:bolder;color:#5f5963;"> Full address</h4>
                                    <h5 style="color: #888;font-weight:bold;">
                                        {{$data->address}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Portlet PORTLET-->
                </div>

            </div>

            <div class="row" style="float:right;">
                <div class="col-xs-12">
                    <a href="{{url('inves/reply_message/'.$data->user_id)}}" class="btn btn-lg btn-success">Send
                        Mail</a>
                </div>
            </div>

        </div>
        <!-- END CONTENT -->
        <!-- BEGIN QUICK SIDEBAR -->
        <a href="javascript:;" class="page-quick-sidebar-toggler"> <i class="icon-login"></i> </a>

        <!-- END QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->

    <!-- END FOOTER -->
    </div>
    <!-- BEGIN QUICK NAV -->

@endsection