@extends('layouts.dashboard')
@section('content')
@section('title')
    Plan List
@endsection
@section('bg'){{asset('images/about_banner.jpg')}}@endsection

    <!-- BEGIN : LOGIN PAGE 5-1 -->

@if(\Illuminate\Support\Facades\Session::has('no_auth'))
    <div class="modal fade in" id="myModal" role="dialog"
         style="display: block; padding-left: 17px;background-color: #f1eaea96;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" onclick="tohide()" class="close" data-dismiss="modal">×</button>
                    <h4 style="font-weight:bolder;color:#32c5d2;font-size:27px;">Need to register or login</h4>
                </div>
                <div class="modal-body" style="font-size: 19px !important;
    color: #4c4949cf;
    font-weight: bolder;">
                    You need to register or login to see projects details
                </div>
                <div class="modal-footer" style="">
                    <button type="button" class="btn btn-default" onclick="tohide()" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <script>
        function tohide() {
            document.getElementById("myModal").style.display = 'none';
        }
    </script>
    <?php
    \Illuminate\Support\Facades\Session::forget('no_auth');
    ?>
@endif
@if(\Illuminate\Support\Facades\Session::has('no_auth'))
    <div class="modal fade in" id="myModal" role="dialog"
         style="display: block; padding-left: 17px;background-color: #f1eaea96;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" onclick="tohide()" class="close" data-dismiss="modal">×</button>
                    <h4 style="font-weight:bolder;color:#32c5d2;font-size:27px;">Need to register or login</h4>
                </div>
                <div class="modal-body" style="font-size: 19px !important;
    color: #4c4949cf;
    font-weight: bolder;">
                    You need to register or login to see projects details
                </div>
                <div class="modal-footer" style="">
                    <button type="button" class="btn btn-default" onclick="tohide()" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <script>
        function tohide() {
            document.getElementById("myModal").style.display = 'none';
        }
    </script>
    <?php
    \Illuminate\Support\Facades\Session::forget('no_auth');
    ?>
@endif


 <div class="col-xs-12" style="background-color:#ddedf2; padding: 30px;" >
         <div class="col-xs-12" style="background-color:white;">
         <div class="col-xs-12" style="background-color: #8ca9d038;text-align: center;font-family: Century Gothic;font-size:30px;font-weight:bolder;margin-top: 30px;">Plans
        </div>
        <div class="col-xs-12" style="background-color: #80808021;text-align: center; font-size:20px;font-weight:bolder; margin-bottom: 30px;margin-top: 10px;">
              If you want to know more about plans, please contact us. Phone Numbers: 09456114442, 09773777445</div>
    <div class="col-xs-12">

        <div class="col-md-12">

            <div class="col-md-12">
                <!-- BEGIN PAGE HEADER-->
                <!-- BEGIN THEME PANEL -->

                <!-- END THEME PANEL -->
                <!-- BEGIN PAGE BAR -->

                <div class="portlet light portlet-fit ">
                    <div class="portlet-body">
                        <?php
                        $tocp = DB::table('plans')->where('user_id', Auth:: user()->id)->count();
                        ?>
                        @if($tocp != 0)
                            <?php
                            $tocp_data = DB::table('plans')->where('user_id', Auth::user()->id)->first();
                            ?>

                            <div class="col-sm-6 ">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-red-haze">
                                                <span data-counter="counterup" data-value="Your Plan">Your Plan</span>
                                            </h3>
                                            <small>
                                                @if($tocp_data->plan_type == 1)
                                                    <?php
                                                    $pt='A';
                                                    ?>
                                                @elseif($tocp_data->plan_type == 2)
                                                    <?php
                                                    $pt='B';
                                                    ?>
                                                @else
                                                    <?php
                                                    $pt='C';
                                                    ?>

                                                @endif
                                                Plan Type :{{$pt}}   &nbsp;&nbsp;&nbsp; For {{$tocp_data->duration_month}} Month

                                            </small>
                                            <br>
                                            <small>

                                                Start Date :{{\Carbon\Carbon::parse($tocp_data->start_date)->toDateTimeString()}}

                                            </small>
                                            <br>
                                            <small>

                                                End Date :{{\Carbon\Carbon::parse($tocp_data->expire_date)->toDateTimeString()}}

                                            </small>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        @endif


                        <div class="row">&nbsp;</div>
                        <div class="row">
                            @if(Auth::user()->type==1)
                                @foreach($plan as $p)
                                    @if($p->type == 'A')
                                        <div class="col-sm-6 col-lg-4" style="margin-bottom: 20px;">
                                            <div class="mt-widget-3">
                                                <div class="mt-head blue-sharp" style="padding-bottom: 100px; margin: 0px !important;">
                                                    <div class="mt-head-icon">
                                                        <i class="fa fa-book" style="padding-right: 10px;"></i> Plan Type : {{ $p->type }}
                                                    </div>

                                                    <div class="col-xs-12" style="padding-left: 50px;">
                                                        <i class="fa fa-paper-plane" style="padding-right: 10px;"></i> Received Month : Unlimited
                                                    </div>

                                                    <div class="col-xs-12" style="padding-left: 50px;">
                                                        <i class="fa fa-plus" style="padding-right: 10px;"></i> Received Points : {{ $p->point }}
                                                    </div>


                                                    <div class="col-xs-12" style="padding-left: 50px;">
                                                        <i class="fa fa-puzzle-piece" style="padding-right: 10px;"></i> Payment : {{ $p->amount }}
                                                    </div>


                                                    {{--<div class="mt-head-button">--}}
                                                    {{--<a href="{{url('entra/buy_plan/A')}}" type="button" class="btn btn-default btn-sm">Buy </a>--}}
                                                    {{--</div>--}}
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($p->type == 'B')
                                        <div class="col-sm-6 col-lg-4" style="margin-bottom: 20px;">
                                            <div class="mt-widget-3">
                                                <div class="mt-head bg-blue" style="padding-bottom: 100px; margin: 0px !important;">
                                                    <div class="mt-head-icon">
                                                        <i class="fa fa-book" style="padding-right: 10px;"></i> Plan Type : {{ $p->type }}
                                                    </div>

                                                    <div class="col-xs-12" style="padding-left: 50px;">
                                                        <i class="fa fa-paper-plane" style="padding-right: 10px;"></i> Received Month :Unlimited
                                                    </div>

                                                    <div class="col-xs-12" style="padding-left: 50px;">
                                                        <i class="fa fa-plus" style="padding-right: 10px;"></i> Received Points : {{ $p->point }}
                                                    </div>


                                                    <div class="col-xs-12" style="padding-left: 50px;">
                                                        <i class="fa fa-puzzle-piece" style="padding-right: 10px;"></i> Payment : {{ $p->amount }}
                                                    </div>


                                                    {{--<div class="mt-head-button">--}}
                                                    {{--<a href="{{url('entra/buy_plan/A')}}" type="button" class="btn btn-default btn-sm">Buy </a>--}}
                                                    {{--</div>--}}
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-sm-6 col-lg-4" style="margin-bottom: 20px;">
                                            <div class="mt-widget-3">
                                                <div class="mt-head bg-yellow" style="padding-bottom: 100px; margin: 0px !important;">
                                                    <div class="mt-head-icon">
                                                        <i class="fa fa-book" style="padding-right: 10px;"></i> Plan Type : {{ $p->type }}
                                                    </div>

                                                    <div class="col-xs-12" style="padding-left: 50px;">
                                                        <i class="fa fa-paper-plane" style="padding-right: 10px;"></i> Received Month : {{ $p->multi }}
                                                    </div>

                                                    <div class="col-xs-12" style="padding-left: 50px;">
                                                        <i class="fa fa-plus" style="padding-right: 10px;"></i> Received Points : Unlimited
                                                    </div>


                                                    <div class="col-xs-12" style="padding-left: 50px;">
                                                        <i class="fa fa-puzzle-piece" style="padding-right: 10px;"></i> Payment : {{ $p->amount }}
                                                    </div>


                                                    {{--<div class="mt-head-button">--}}
                                                    {{--<a href="{{url('entra/buy_plan/A')}}" type="button" class="btn btn-default btn-sm">Buy </a>--}}
                                                    {{--</div>--}}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(Auth::user()->type ==2)
                                <div class="col-sm-6 col-lg-4">
                                    <div class="mt-widget-3">
                                        <div class="mt-head bg-blue">
                                            <div class="mt-head-icon">
                                                <i class="fa fa-book"></i> A
                                            </div>
                                            <div class="col-xs-12" style="padding-left:30%;"><i class="fa fa-search"></i>
                                                View Project limit : 20
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">&nbsp;</div>
                                            <div class="col-xs-12" style="padding-left:30%;">
                                                <i class="fa fa-paper-plane"></i> Create Project limit : 40
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">&nbsp;</div>

                                            <div class="col-xs-12" style="padding-left:30%;">
                                                <i class="fa fa-puzzle-piece"></i> Create Business Plan Limit : 5
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">&nbsp;</div>

                                            <div class="mt-head-button">
                                                <a href="{{url('entra/buy_plan/A')}}" type="button" class="btn btn-default btn-sm">Buy </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="mt-widget-3">
                                        <div class="mt-head bg-yellow-gold">
                                            <div class="mt-head-icon">
                                                <i class="fa fa-book"></i> B
                                            </div>
                                            <div class="col-xs-12" style="padding-left:30%;"><i class="fa fa-search"></i>
                                                View Project limit : unlimited
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">&nbsp;</div>
                                            <div class="col-xs-12" style="padding-left:30%;">
                                                <i class="fa fa-paper-plane"></i> Create Project limit : unlimited
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">&nbsp;</div>

                                            <div class="col-xs-12" style="padding-left:30%;">
                                                <i class="fa fa-puzzle-piece"></i> Create Business Plan Limit : unlimited
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">&nbsp;</div>

                                            <div class="mt-head-button">
                                                <a href="{{url('entra/buy_plan/B')}}" type="button" class="btn btn-default btn-sm">Buy </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
            <!--   </div> -->

            <!-- END VALIDATION STATES-->
        </div>
        <div class="row">&nbsp;</div>
    </div>
</div>
</div>
@endsection