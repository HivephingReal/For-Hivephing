@extends('layouts.for_datatable')

@section('body')


    <div class="clearfix"></div>

    <div class="">

        <div class="col-xs-12" style="background:#345884;">
            <div class="col-xs-12 col-sm-2 col-md-2">
                <div class="top_header">
                    <img src="{{asset('images/logo/logo.png')}}" class="logo" style="width:152px;height:82px;"/>
                    <h3 class="" style="font-weight:bolder;color:white;font-size:33px;margin-top:-12px;">
                        HivePhing </h3>

                </div>
            </div>
            <div class="col-xs-12 col-sm-10 col-md-10">
                <div class="col-xs-12 col-sm-12 col-md-2">&nbsp;</div>
                <div class="col-xs-12 col-sm-12 col-md-8" style="color:white;text-align: center;">
                    <div class="top_m" style="">
                        <div class="col-xs-4  col-sm-4 col-md-4"><a href="{{url('about_us')}}"
                                                                    style="text-align: center;white-space: nowrap;color:white;font-weight:bolder;">About US </a></div>
                        <div class="col-xs-4  col-sm-4 col-md-4" ><a href="{{url('business_news')}}"
                                                                     style="text-align: center;white-space: nowrap;color:white;font-weight:bolder;">News</a>
                        </div>
                        <div class="col-xs-4">
                            <button onclick="change_font('z')" class="btn btn-small btn-info " style="float:right;">zawgyi</button>
                            <button onclick="change_font('u')" class="btn btn-small btn-warning green">Uni</button>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-2">&nbsp;</div>

            </div>
        </div>
        <div class="col-xs-12">
            <div class="topnavs" id="myTopnav">
                <div class="dropdowns" class="actives">

                    <button class="dropbtns">
                        <i class="fa fa-user"> {{Auth::user()->name}}</i>
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdowns-content">
                        <a href="{{url('entra/profile_detail/'.Auth::user()->id)}}"><i class="icon-user"></i> My Profile</a>
                        <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <i class="icon-key"></i> Log Out </a></a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>

                    </div>
                </div>
                <a href="{{url('entra_dashboard')}}" >Dashboard</a>
                @php
                    $company_count=DB::table('company')->where('user_id',Auth::user()->id)->count();

                    if($company_count > 0){
                    $company_data=DB::table('company')->where('user_id',Auth::user()->id)->first();
                    if($company_data->status == 3){
                    $link='company_detail/'.Auth::user()->id;
                    }
                    else
                    {
                    $link='company_register_form';
                    }
                    }
                    else{
                    $link='company_register_form';
                    }
                @endphp
                <a href="{{url($link)}}">Company</a>
                <a href="{{url('entra/invite_com')}}">Invitation</a>
                {{--<a href="{{url('entra/add_form_for_paint')}}">Prices</a>--}}
                <a href="{{url('entra/construct_projects')}}">Construct Projects</a>
                {{--<div class="dropdowns">--}}
                    {{--<button class="dropbtns">Mail Inbox--}}
                        {{--<i class="fa fa-caret-down"></i>--}}
                    {{--</button>--}}
                    {{--<div class="dropdowns-content">--}}
                        {{--<a href="{{url('entra/mails')}}">Business Plan's Mail</a>--}}
                        {{--<a href="{{url('entra/pmail/all_mails')}}">Project's Mail</a>--}}

                    {{--</div>--}}
                {{--</div>--}}

                <a href="{{url('entra/portfolio/list')}}">Portfolio</a>
                <a href="{{url('see_tenders')}}">Tenders</a>
                <a href="{{url('entra/show_plans')}}">Plans</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
            </div>
            <script>
                function myFunction() {
                    var x = document.getElementById("myTopnav");
                    if (x.className === "topnavs") {
                        x.className += " responsive";
                    } else {
                        x.className = "topnavs";
                    }
                }
                ;
            </script>
        </div>

        <div class="col-xs-12 bgs" style="background-image: url('@yield('bg')')">
            <div class="col-xs-12 col-sm-12 col-md-6" style="">
                <div class="background_lyrics">
                    <br>
                    @yield('title')
                </div>
                <div class="col-xs-12"
                     style="color:#3e3d3d;font-size:23px;margin-left:192px;margin-top:13px;visibility: hidden;">
                    Hivephing is easy to
                    use cloud based B2B (Business to Business)<br>used by business every hub to increase sales and
                    ultimately
                    grow
                </div>
            </div>
        </div>

        @yield('content')

        <div class="col-xs-12" style="position:relative;background-color:#e2e245;height:40%;width:100%;">
            <div style="margin-left:2%;margin-right:2%;margin-top:2%;">
                <div class="col-xs-6 col-sm-4" style="text-align: center;">
                    <div class="col-xs-6 col-sm-6">
                        <img src="{{asset('images/homepage/mail_ico.png')}}" class="footer_img"/>
                    </div>
                    <div class="col-xs-6 col-sm-6" style="text-align:left;margin-top:4%;">
                        <span style="font-weight:bolder;">Email</span>
                        info@masterymyanmar.com
                        info@hivephing.com
                    </div>
                </div>
                <div class="col-xs-6 col-sm-4" style="text-align: center;">
                    <div class="col-xs-6 col-sm-6">
                        <img src="{{asset('images/homepage/phone_ico.png')}}" class="footer_img"/>
                    </div>
                    <div class="col-xs-6 col-sm-6" style="text-align:left;margin-top:4%;">
                        <span style="font-weight:bolder;">Call Us</span><br>
                        09456114442<br>
                        09773777445
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4" style="text-align: center;">
                    <div class="col-xs-6 col-sm-6">
                        <img src="{{asset('images/homepage/location_ico.png')}}" class="footer_img"/>
                    </div>
                    <div class="col-xs-6 col-sm-6" style="text-align:left;margin-top:4%;">
                        <span style="font-weight:bolder;">Address</span><br>
                         No.628/636 Merchant Road,(10th Floor,Royal River View Condo)Between 29th and 30th street,Yangon
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-1 col-sm-3">
                    &nbsp;
                </div>
                <div class="col-xs-12 col-sm-6">
                    <img src="{{asset('images/homepage/facebook_ico.png')}}" style="float:left;margin-right:4%;"
                         class="footer_img"/>
                    <img src="{{asset('images/homepage/google_plus-ico.png')}}" style="float:left;margin-right:4%;"
                         class="footer_img"/>
                    <img src="{{asset('images/homepage/linkedin_ico.png')}}" style="float:left;margin-right:4%;"
                         class="footer_img"/>
                    <img src="{{asset('images/homepage/wk_ico.png')}}" style="float:left;margin-right:4%;"
                         class="footer_img"/>
                    <img src="{{asset('images/homepage/ytube_ico.png')}}" style="float:left;margin-right:4%;"
                         class="footer_img"/>
                    <img src="{{asset('images/homepage/digg_ico.png')}}" style="float:left;margin-right:4%;"
                         class="footer_img"/>
                    <img src="{{asset('images/homepage/z_ico.png')}}" style="float:left;margin-right:4%;"
                         class="footer_img"/>
                </div>
                <div class="col-xs-1 col-sm-3">
                    &nbsp;
                </div>

            </div>
            <div class="col-xs-12"
                 style="text-align: center;margin-bottom:22px;font-weight:bolder;font-size:15px;color:#345884;margin-top:12px;">
                2018 Mastery Co.Ltd All Rights Reserved.

            </div>
        </div>


    </div>

@endsection
