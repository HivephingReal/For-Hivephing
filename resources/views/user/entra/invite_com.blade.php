<?php
echo header("Cache-Control:no-store,no-cache,must-revalidate,max-age=0");header("Cache-Control:post-check=0,pre-check=0", false);header("Pragma:no-cache");header('Content-Type:text/html');

?>
@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN : LOGIN PAGE 5-1 -->
@section('title')
    Invite Company
@endsection
@section('bg'){{asset('images/about_banner.jpg')}}@endsection
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
@if(\Illuminate\Support\Facades\Session::has('ex'))
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
                    This Project expired
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
<div class="col-xs-12" style="background-color:#ddedf2; padding: 30px;">
    <div class="col-xs-12" style="background-color:white;">
        @if(\Illuminate\Support\Facades\Session::has('error'))
        <div class="alert alert-danger" style="text-align: center;font-weigth:bold;">
            {{\Illuminate\Support\Facades\Session::get('error')}}
        </div>
        @endif

    <div class="col-xs-12" style="background-color: #8ca9d038;text-align: center;font-family: Century Gothic;font-size:30px;font-weight:bolder; margin-bottom: 30px;margin-top: 30px;">Invite Projects
    </div>

    <!-- paid plan -->


    <div class="col-xs-12">

        @foreach($data as $dd)
            <?php
            $project = \Illuminate\Support\Facades\DB::connection('mysql_service')->table('for_repair')->where('id', $dd->post_id)->get();
            ?>
            @foreach($project as $d)

                <div class="col-md-6 ">
                    <!-- BEGIN Portlet PORTLET-->
                    <div class="portlet box blue-hoki">
                        <div class="portlet-title">

                            <div class="caption">
                                <i class="fa fa-gift"></i>
                                ID : {{$d->id}}

                            </div>

                            @if($d->close == 1)
                                <div class="actions">
                                    <a class="btn btn-danger btn-sm" disabled> <i class="fa fa-cross"></i> Expired
                                    </a>
                                </div>
                            @else

                                <?php
                                $see_project = DB::connection('mysql_service')->table('request')->where([['post_id', '=', $d->id], ['requester_id', '=', Auth::user()->id]]);
                                ?>
                                @if($see_project->count() > 0)
                                    @if($see_project->first()->status == 'rq')

                                        <div class="actions">
                                            <a href="{{url('entra/construct_project_detail_one/'.$d->id)}}"
                                               class="btn btn-default btn-sm"> <i class="fa fa-search"></i> Requested
                                            </a>
                                        </div>
                                            <div class="actions">
                                                <a href="{{url('entra/construct_project_detail_one/'.$d->id)}}"
                                                   class="btn btn-default btn-sm"> <i class="fa fa-search"></i> See
                                                </a>
                                            </div>
                                    @elseif($see_project->first()->status == 'con')
                                            <div class="actions">
                                                <a href="{{url('entra/construct_project_detail_one/'.$d->id)}}"
                                                   class="btn btn-default btn-sm"> <i class="fa fa-search"></i> Confirmed
                                                </a>
                                            </div>
                                        <div class="actions">
                                                       <a href="{{url('entra/construct_project_detail_one/'.$d->id)}}"
                                               class="btn btn-default btn-sm"> <i class="fa fa-search"></i> See
                                            </a>
                                        </div>
                                    @endif
                                @else
                                    <div class="actions">
                                        <a href="{{url('entra/construct_project_detail_one/'.$d->id)}}"
                                           class="btn btn-default btn-sm"> <i class="fa fa-search"></i> Request
                                        </a>
                                    </div>
                                        <div class="actions">
                                            <a href="{{url('entra/construct_project_detail_one/'.$d->id)}}"
                                               class="btn btn-default btn-sm"> <i class="fa fa-search"></i> See
                                            </a>
                                        </div>

                                @endif

                            @endif
                        </div>
                        <div class="portlet-body">
                            <div class="scroller" style="height:200px" data-rail-visible="1"
                                 data-rail-color="yellow"
                                 data-handle-color="#a1b2bd">
                                <br>
                                <strong> Points:{{$d->project_define_point}}
                                </strong>
                                <br/>
                                {{ strip_tags(str_limit($d->description,140)) }}
                            </div>
                           <!--  <span class="badge badge-danger">
                                <?php
                                $comp = DB::table('user_saw_this_plan')->where([['project_id', '=', $d->id]])->count();
                                ?>
                                {{$comp}}
                                </span> <strong style="color:#67809f;">Competitors</strong> &nbsp;&nbsp; &nbsp;&nbsp; -->
                            <strong style="color:#67809f;">Post Date : {{$d->created_at}}</strong>

                        </div>
                    </div>
                    <!-- END Portlet PORTLET-->
                </div>
            @endforeach
        @endforeach

    </div>

    <div class="col-xs-12">
        <div class="col-md-12 pull-right">
            {{$data->links()}}
        </div>
    </div>

</div>
</div>
@endsection