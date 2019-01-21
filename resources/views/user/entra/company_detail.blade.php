
<!-- END HEAD -->
@extends('layouts.dashboard')

@section('content')

<!-- BEGIN : LOGIN PAGE 5-1 -->
@section('title')
    Your Dashboard
@endsection
@section('bg'){{asset('images/about_banner.jpg')}}@endsection
<div class="col-xs-12" style="background-color:#ddedf2; padding: 30px;">
    <div class="col-xs-12" style="background-color:white; padding-bottom: 30px;">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN THEME PANEL -->
        <div class="theme-panel hidden-xs hidden-sm">

        </div>
        <!-- END THEME PANEL -->
        <!-- BEGIN PAGE BAR -->

        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        @include('user.entra.alert.alert')
       <div class="col-xs-12" style="background-color: #8ca9d038;text-align: center;font-family: Century Gothic;font-size:30px;font-weight:bolder; margin-bottom: 30px;margin-top: 30px;">
            Your company's detail
        </div>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->


        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet solid green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>{{$d->name}}
                        </div>
                        <a href="{{ url('/company_detail/'.$d->id.'/rating') }}" class="btn green-seagreen pull-right" style="margin-top: 20px;">
                            Rating Point :
                            @if($rate == null)
                                0
                            @elseif($rate >= 1000)
                                {{ $rate/1000 }} k
                            @else
                                {{ $rate }}
                            @endif
                        </a>
                    </div>
                    <div class="portlet-body">
                        <div class="scroller" style="height:200px">
                            <img src="{{asset('users/entro/photo/'.$d->logo)}}" width="152"
                                 style=" vertical-align: text-top;float:left;margin:9px;" alt="Logo Image">
                            </img><p> {{$d->description}} </p>

                        </div>
                    </div>
                </div>
                <!-- END Portlet PORTLET-->
            </div>
        </div>
        <div class="row">
            @if($d->ceo_name != '' or $d->ceo_email != '')
                <div class="col-md-3">
                    <!-- BEGIN Portlet PORTLET-->
                    <div class="portlet box green">
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
                                            style="color:#5f5963;font-weight:bold;"> &nbsp; {{$d->ceo_name}}</h5>
                                </li>

                                <li>
                                    <i class="fa fa-envelope" style="float:left;"></i>
                                    <h5 style="color:#5f5963;font-weight:bold;"> &nbsp; {{$d->ceo_email}}</h5>
                                </li>
                                <li><i class="fa fa-phone" style="float:left;"></i> <h5
                                            style="color:#5f5963;font-weight:bold;"> &nbsp; {{$d->ceo_phone}}</h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END Portlet PORTLET-->
                </div>
            @endif
            <div class="col-md-9">
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet box green">
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
                            @if ($d->investment == '0')
                                <i class="fa fa-close" style="color:darkred;"></i>
                            @else
                                <i class="fa fa-check" style="color:#32c5d2;"></i>
                            @endif
                        </div>
                        <div class="col-md-12 col-lg-6" style="margin-bottom:4px">
                            <h5 style="display:inline;font-weight:bolder;color: #5f5963;">Registration
                                Status </h5> :
                            @if ($d->registration_status == '0')
                                <i class="fa fa-close" style="color:darkred;"></i>
                            @else
                                <i class="fa fa-check" style="color:#32c5d2;"></i>
                            @endif

                        </div>
                        <div class="col-md-12 col-lg-6">
                            <h5 style="display:inline;font-weight:bolder;color: #5f5963;">City</h5>
                            :<span style="color:#5f5963;font-weight:bold;"> &nbsp;
                                @php
                                    $city=DB::table('cities')->where('id',$d->city_id)->first();
                                @endphp
                                {{$city->name}}
                                    </span>

                        </div>
                        <div class="col-md-12 col-lg-6">
                            <h5 style="display:inline;font-weight:bolder;color: #5f5963;">Business type</h5>
                            :<span style="color:#5f5963;font-weight:bold;"> &nbsp;
                                @php
                                    $city=DB::table('business_hub')->where('id',$d->business_hub)->first();
                                @endphp
                                {{$city->description}}
                                    </span>

                        </div>

                        <div class="col-md-12 col-lg-6" style="margin-bottom:4px">
                            <h5 style="display:inline;font-weight:bolder;color: #5f5963;">Country</h5>
                            : <span style="color:#5f5963;font-weight:bold;">
                                        @php
                                            $country=DB::table('countries')->where('id',$d->country_id)->first();
                                        @endphp
                                {{$country->name}}
                                    </span>
                        </div>

                        @if($d->website != '')
                            <div class="col-md-12 col-lg-6" style="margin-bottom:4px">
                                <h5 style="display:inline;font-weight:bolder;color: #5f5963;">Website Link </h5>
                                @if(preg_match('/http/',$d->website))
                                    <?php $weblink=$d->website;?>
                                @else
                                    <?php $weblink="http://".$d->website;?>

                                @endif
                                : <span style="color:#5f5963;font-weight:bold;"> &nbsp;<a href="{{$weblink}}">{{$d->website}}
                                        <span class="fa fa-arrow-right"></span></a> </span>
                            </div>
                        @endif
                        @if($d->facebook != '')

                            <div class="col-md-12 col-lg-6" style="margin-bottom:4px">
                                <h5 style="display:inline;font-weight:bolder;color: #5f5963;">Facebook Link </h5>
                                @if(preg_match('/http/',$d->facebook))
                                    <?php $facebook=$d->facebook;?>
                                @else
                                    <?php $facebook="http://".$d->facebook;?>

                                @endif
                                : <span style="color:#5f5963;font-weight:bold;"> &nbsp;<a href="{{$facebook}}">{{$d->facebook}}
                                        <span class="fa fa-arrow-right"></span></a> </span>
                            </div>
                        @endif
                        &nbsp; &nbsp; &nbsp;
                    </div>
                </div>
                <!-- END Portlet PORTLET-->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet box green">
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
                        <div class="col-md-12 col-lg-6">

                            <ul style="list-style:none;padding-left:2px;">
                                <li>
                                    <i class="fa fa-user" style="float:left;"></i><h5
                                            style="color:#5f5963;font-weight:bold;"> &nbsp; {{$d->name}}</h5>
                                </li>

                                <li>
                                    <i class="fa fa-envelope" style="float:left;"></i>
                                    <h5 style="color:#5f5963;font-weight:bold;"> {{$d->email}}</h5>
                                </li>
                                <li><i class="fa fa-phone" style="float:left;"></i> <h5
                                            style="color:#5f5963;font-weight:bold;"> &nbsp; {{$d->phone}}</h5>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-12 col-lg-6">
                            <h4 class="title" style="font-weight:bolder;color:#5f5963;"> Full address</h4>
                            <h5 style="color: #888;font-weight:bold;">
                                {{$d->address}}</h5>
                        </div>

                        &nbsp; &nbsp; &nbsp;
                    </div>
                </div>
                <!-- END Portlet PORTLET-->
            </div>

        </div>

        @if(Auth::user()->type == 1 or Auth::user()->type == 2)
            @if(Auth::user()->id == $d->user_id)
                <div class="row">
                    <div class="col-xs-12">
                        <button type="button" onclick="goss({{$d->id}})" class="btn btn-lg btn-danger pull-right">Edit</button>
                    </div>
                </div>

                <!-- END CONTENT BODY -->
                <script>
                    function goss(id) {
                        window.location.assign('{{url('company_edit_form/'.$d->id)}}');
                    }
                </script>
            @endif
        @endif
    </div>

</div>
</div>

@endsection

