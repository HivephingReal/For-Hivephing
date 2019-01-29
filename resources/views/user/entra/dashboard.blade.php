@extends('layouts.dashboard')
@section('content')
    <div class="">
        <!-- BEGIN CONTENT BODY -->
    <div class="col-xs-12" style="background-color:#ddedf2; padding: 30px;">
    <div class="col-xs-12" style="background-color:white; padding-bottom: 30px;">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->

            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            @section('title')
                Your Dashboard
            @endsection
            @section('bg'){{asset('images/about_banner.jpg')}}@endsection
            @if(\Carbon\Carbon::parse(Auth::user()->created_at)->addDays(30) > \Carbon\Carbon::now())
                @if(DB::table('user_get_free_plan')->where('user_id',Auth::user()->id)->count() != 0)
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="dashboard-stat2" style="padding-bottom:12px;padding: 0px 22px 8px;">
                                <div class="display">
                                    <div class="number">
                                        <div>
                                            <h4 class="font-red-haze">
                                                <span pdata-counter="counterup" pdata-value="Your free-trial period">Your free-trial period</span>

                                                <small>Remaining Days
                                                    :{{\Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse(Auth::user()->created_at)->addDays(30))}}</small>
                                            </h4>

                                            <small>
                                                <?php
                                                $remain_point = DB::table('user_get_free_plan')->where('user_id', Auth::user()->id)->first();
                                                ?>
                                                <span style="color:#36c6d3;">Remaining Projects</span>
                                                :{{$remain_point->remaining_point}} projects

                                            </small>
                                            <br>

                                            <small>

                                                <span style="color:#36c6d3;">Start Date</span>
                                                :{{Auth::user()->created_at}}

                                            </small>
                                            &nbsp;&nbsp;&nbsp;
                                            <small>

                                                <span style="color:#36c6d3;">End Date</span>
                                                :{{\Carbon\Carbon::parse(Auth::user()->created_at)->addDays(30)}}

                                            </small>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
            <div class="col-xs-12" style="background-color: #8ca9d038;text-align: center;font-family: Century Gothic;font-size:30px;font-weight:bolder; margin-bottom: 30px;margin-top: 30px;">Your
                Dashboard
            </div>
            <div class="col-xs-12">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5" style="background-color: white;;
                        border: 2px solid #e4e0e0; margin-left: 40px; margin-right: 5px;">
                    <div class="portlet light ">
                        <div class="portlet-title tabbable-line">
                            <div class="caption">
                                <i class=" icon-social-twitter font-dark hide"></i>
                                <span class="caption-subject font-dark bold uppercase">Your message</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <!--   <a href="" pdata-toggle="tab"> See All </a>-->
                                </li>

                            </ul>
                        </div>
                        <div class="portlet-body" style="height:422px;overflow:auto;">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_actions_pending">
                                    <!-- BEGIN: Actions -->
                                    <div class="mt-actions pa">
                                        @foreach($pmessage as $pmsg)
                                            @if($pmsg->id == $last->id)

                                                <div class="mt-action animated fadeIn p" id="{{$pmsg->id}}">
                                                    <div class="mt-action-img">
                                                    </div>
                                                    <div class="mt-action-body">
                                                        <div class="mt-action-row">
                                                            <div class="mt-action-info ">
                                                                <div class="mt-action-icon ">
                                                                    <i class=" icon-bubbles"></i>
                                                                </div>
                                                                <div class="mt-action-details ">
                                                            <span class="mt-action-author">

                                                            </span>
                                                                    <p class="mt-action-desc">{{str_limit($pmsg->title,10)}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-action-datetime ">
                                                                <span class="mt-action-dot bg-red"></span>

                                                                <span class="mt-action-date">{{\Carbon\Carbon::parse($pmsg->created_at)->format('m/d/Y')}}</span>
                                                            </div>
                                                            <span class='badge badge-success'>P</span>
                                                            <div class="mt-action-buttons ">
                                                                <a href="{{url('entra/received_msg_view/'.$pmsg->id)}}"
                                                                   class="btn green btn-sm">
                                                                    Read </a>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            @else
                                                <div class="mt-action">
                                                    <div class="mt-action-img">

                                                    </div>
                                                    <div class="mt-action-body">
                                                        <div class="mt-action-row">
                                                            <div class="mt-action-info ">
                                                                <div class="mt-action-icon ">
                                                                    <i class=" icon-bubbles"></i>
                                                                </div>
                                                                <div class="mt-action-details ">
                                                            <span class="mt-action-author">

                                                            </span>
                                                                    <p class="mt-action-desc">{{strip_tags(str_limit($pmsg->title,10))}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-action-datetime ">
                                                                <span class="mt-action-dot bg-red"></span>

                                                                <span class="mt-action-date">{{\Carbon\Carbon::parse($pmsg->created_at)->format('m/d/Y')}}</span>
                                                            </div>
                                                            <span class='badge badge-success'>P</span>

                                                            <div class="mt-action-buttons ">
                                                                <a href="{{url('entra/view_mail_for_project/'.$pmsg->id)}}"
                                                                   class="btn green btn-sm">
                                                                    Read </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                        @foreach($bmessage as $bmsg)
                                            @if($bmsg->id == $blast->id)
                                                <div class="mt-action animated fadeIn b" id="{{$bmsg->id}}">
                                                    <div class="mt-action-img">
                                                    </div>
                                                    <div class="mt-action-body">
                                                        <div class="mt-action-row">
                                                            <div class="mt-action-info ">
                                                                <div class="mt-action-icon ">
                                                                    <i class=" icon-bubbles"></i>
                                                                </div>
                                                                <div class="mt-action-details ">
                                                            <span class="mt-action-author">

                                                            </span>
                                                                    <p class="mt-action-desc">{{$bmsg->title}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-action-datetime ">
                                                                <span class="mt-action-dot bg-red"></span>

                                                                <span class="mt-action-date">{{\Carbon\Carbon::parse($pmsg->created_at)->format('m/d/Y')}}</span>
                                                            </div>
                                                            <span class='badge badge-danger'>B</span>

                                                            <div class="mt-action-buttons ">
                                                                <a href="{{url('entra/view_mail//'.$bmsg->id)}}"
                                                                   class="btn green btn-sm">
                                                                    Read </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="mt-action">
                                                    <div class="mt-action-img">

                                                    </div>
                                                    <div class="mt-action-body">
                                                        <div class="mt-action-row">
                                                            <div class="mt-action-info">
                                                                <div class="mt-action-icon ">
                                                                    <i class=" icon-bubbles"></i>
                                                                </div>
                                                                <div class="mt-action-details ">
                                                            <span class="mt-action-author">

                                                            </span>
                                                                    <p class="mt-action-desc">{{$bmsg->title}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-action-datetime ">
                                                                <span class="mt-action-dot bg-red"></span>

                                                                <span class="mt-action-date">{{\Carbon\Carbon::parse($bmsg->created_at)->format('m/d/Y')}}</span>
                                                            </div>
                                                            <span class='badge badge-danger'>B</span>

                                                            <div class="mt-action-buttons ">
                                                                <a href="{{url('entra/view_mail//'.$bmsg->id)}}"
                                                                   class="btn green btn-sm">
                                                                    Read </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                        @endforeach
                                    </div>
                                    <!-- END: Actions -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-1">

                </div>
                <!--<div class="col-lg-1 col-xs-12 col-sm-12">&nbsp;-->
                <!--</div>-->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5" style="background-color: white;
                        border: 2px solid #e4e0e0;">
                    <div class="portlet light ">
                        <div class="portlet-title tabbable-line">
                            <div class="caption">
                                <i class=" icon-social-twitter font-dark hide"></i>
                                <span class="caption-subject font-dark bold uppercase">Tenders</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="{{url('see_tenders')}}" onClick='cc();' pdata-toggle="tab"> See All </a>
                                </li>

                            </ul>
                            <script>
                                function cc() {
                                    window.location.assign('{{url('see_tenders')}}');
                                }
                            </script>
                        </div>
                        <div class="portlet-body" style="height:422px;overflow:auto;">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_actions_pending">
                                    <!-- BEGIN: Actions -->
                                    <div class="mt-actions">
                                        @foreach($tenders as $t)
                                            <div class="mt-action">
                                                <div class="mt-action-img">
                                                </div>
                                                <div class="mt-action-body">
                                                    <div class="mt-action-row">
                                                        <div class="mt-action-info ">
                                                            <div class="mt-action-icon ">
                                                                <i class=" icon-bubbles"></i>
                                                            </div>
                                                            <div class="mt-action-details ">

                                                                <p class="mt-action-desc">{{$t->title}}</p>
                                                                <div class="mt-action-datetime " style="float:left;">

                                                                    <span class="mt-action-dot bg-red"></span>

                                                                    <span class="mt-action-date">{{\Carbon\Carbon::parse($t->created_at)->format('m/d/Y')}}</span>
                                                                </div>

                                                            </div>

                                                            <div class="mt-action-buttons ">
                                                                <a href="{{url('read_tender/'.$t->id)}}"
                                                                   class="btn btn-outline green btn-sm">
                                                                    Read </a>

                                                            </div>
                                                        </div>
                                                        <br>

                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>
                                    <!-- END: Actions -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xs-12">&nbsp;</div>

            <div class="col-xs-12">
                <div class="col-lg-2 col-xs-12 col-sm-12">&nbsp;</div>
                <div class="col-lg-8 col-xs-12 col-sm-12" style="background-color: white;
                        border: 2px solid #e4e0e0;">
                    <div class="portlet-title tabbable-line">
                        <div>
                            &nbsp;
                            <div class="caption">
                                <i class=" icon-social-twitter font-dark hide"></i>
                                <span class="caption-subject font-dark bold uppercase">News For You</span>
                            </div>
                            &nbsp;
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active">
                            </li>

                        </ul>
                    </div>
                    <ul class="bxslider">
                        <?php
                        $news = DB::table('news')->orderBy('created_at', 'desc')->limit(20)->get();
                        ?>
                        @foreach($news as $new)
                            <li>
                                <div class="mt-widget-2">
                                    <div class="mt-head"
                                         style="background-image: url({{asset('upload/'.$new->image)}});">
                                        <div class="mt-head-label">
                                            <a type="button" href="{{url('entra/read_new/'.$new->id)}}"
                                               class="btn btn-success">Read...</a>
                                        </div>
                                        <div class="mt-head-user">
                                            <div class="mt-head-user-img">
                                                @if($new->NewsCategory_id == 1)
                                                    <a class="socicon-btn socicon-btn-circle socicon-sm socicon-solid bg-green font-white ">
                                                        B </a>
                                                @else
                                                    <a class="socicon-btn socicon-btn-circle socicon-sm socicon-solid bg-red  font-white  ">
                                                        O </a>

                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mt-body" style="margin-top:22px;margin-bottom:23px">
                                        <h3 class="mt-body-title"> {{$new->title}} </h3>
                                        <p class="mt-body-description">
                                            {{strip_tags(str_limit($new->des,50))}}</p><br>
                                        <span style="color:#659be0;font-weight:bolder;">{{\Carbon\Carbon::parse($new->created_at)->format('m/d/Y h:m')}}</span>

                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>

                </div>
                <div class="col-lg-2 col-xs-12 col-sm-12">&nbsp;</div>

            </div>
            <!-- END CONTENT BODY -->
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

@section('js')
    <script>
        $(document).ready(function () {


            setInterval(function () {
                var x = $('.p').attr('id');
                console.log(x);

                var p = $('.b').attr('id');
                $.getJSON('https://www.hivephing.com/companies/entra/get_mail_ajax/' + x,
                    function (result) {
                        console.log(result);
                        if (result.success == 1) {
                            for (i = 0; i < result.data.length; i++) {
                                console.log(result.data.length);
                                if (result.type == null) {
                                    var name = 'nothings';

                                } else {
                                    var name = result.type[i]['name'];

                                }


                                $('.pa').prepend(
                                    " <div class='mt-action animated fadeIn p' id= " + result.data[i]['id'] + "><div class='mt-action-img'></div>" +
                                    " <div class='mt-action-body'>" +
                                    "<div class='mt-action-row'>" +
                                    " <div class='mt-action-info'>" +
                                    "<div class='mt-action-icon'>" +
                                    "<i class='icon-bubbles'></i>" +
                                    "</div>" +
                                    "<div class='mt-action-details '>" +
                                    "<span class='mt-action-author'>" +
                                    name +

                                    "</span>" +
                                    "<p class='mt-action-desc'>" + result.data[i]['title'] +
                                    " </p>" +
                                    " </div>" +
                                    "</div>" +
                                    "<div class='mt-action-datetime '>" +
                                    "<span class='mt-action-dot bg-red'></span>" +

                                    "  <span class='mt-action-date'>" + new Date(result.data[i]['created_at']).toLocaleDateString() + "</span>" +

                                    "</div>" +
                                    "<span class='badge badge-success'>P</span>" +

                                    "<div class='mt-action-buttons'>" +

                                    "<a href='entra/view_mail_for_project/" +
                                    result.data[i]['id'] +
                                    "' type='button' class='btn green btn-sm'>" +
                                    "Read" +
                                    "</a>" +

                                    "</button>" +
                                    "</div>" +
                                    "</div>" +
                                    " </div>" +
                                    "</div>" +
                                    " </div>"
                                );
                                if (i == (result.data.length - 1)) {
                                    console.log('true');
                                    break;
                                } else {
                                    $('#' + result.data[i]['id']).removeAttr('id');

                                    $('#' + result.data[i]['id']).removeClass('fadeIn');


                                }

                            }
                            ;


                        }

                    });
                $.getJSON('https://www.hivephing.com/companies/entra/get_bmail_ajax/' + p, function (result) {
                    if (result.bsuccess == 1) {
                        for (i = 0; i < result.bdata.length; i++) {
                            if (result.btype == null) {
                                var name = 'nothings';
                                var status = "";

                            } else {
                                var name = result.btype[i]['name'];
                                var status = "C";


                            }

                            $('.pa').prepend(
                                " <div class='mt-action animated fadeIn b' id= " + result.bdata[i]['id'] + "><div class='mt-action-img'></div>" +
                                " <div class='mt-action-body'>" +
                                "<div class='mt-action-row'>" +
                                " <div class='mt-action-info '>" +
                                "<div class='mt-action-icon'>" +
                                "<i class='icon-bubbles'></i>" +
                                " </div>" +
                                "<div class='mt-action-details '>" +
                                "<span class='mt-action-author'>" +
                                name +


                                "</span>" +
                                "<p class='mt-action-desc'>" + result.bdata[i]['title'] +
                                " </p>" +
                                " </div>" +
                                "</div>" +
                                "<div class='mt-action-datetime '>" +
                                "<span class='mt-action-dot bg-red'></span>" +

                                "  <span class='mt-action-date'>" + new Date(result.bdata[i]['created_at']).toLocaleDateString() + "</span>" +

                                "</div>" +
                                "<span class='badge badge-danger'>B</span>" +

                                "<div class='mt-action-buttons '>" +
                                "<a href='entra/view_mail/" +
                                result.bdata[i]['id'] +
                                "' type='button' class='btn green btn-sm'>" +
                                "Read" +
                                "</a>" +
                                "</button>" +
                                "</div>" +
                                "</div>" +
                                " </div>" +
                                " </div>" +
                                " </div>"
                            );
                            if (i == (result.bdata.length - 1)) {
                                console.log('true');
                                break;
                            } else {
                                $('#' + result.bdata[i]['id']).removeAttr('id');

                                $('#' + result.bdata[i]['id']).removeClass('fadeIn');


                            }

                        }
                        ;


                    }
                });

            }, 5000)
        });

    </script>
@endsection
@endsection
<![endif]-->
<!-- BEGIN CORE PLUGINS -->