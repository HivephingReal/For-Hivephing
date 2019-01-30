@extends('layouts.dashboard')
@section('content')
    <!-- BEGIN : LOGIN PAGE 5-1 -->
@section('title')
    Project Detail
@endsection
@section('bg')
    {{asset('images/about_banner.jpg')}}@endsection
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

<div class="col-xs-12" style="background-color:white;padding-bottom:22px;">
    <div class="col-xs-12">
        @if(\Illuminate\Support\Facades\Session::has('success'))
            <div class="note note-success">
                <h4 class="block">Successful</h4>

                <p>  {{\Illuminate\Support\Facades\Session::get('success')}}

                </p>
            </div>
        @endif
        <h1 class="page-title page_title">
            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>
            Project Detail <span class="pannel-title"><!-- Upload By
                @php
                    $user=DB::connection('mysql_service')->table('users')->where('id',$data->user_id)->first();
                @endphp
                {{ $user->name }} -->
                @if($data->confirm != 'done')
                    <span class="label label-warning"> Open </span>
                @else
                    <span class="label label-danger"> Close </span>
                @endif

                </span>
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->

        <div class="col-xs-12">
            <div class="col-md-12">
                <!-- BEGIN VALIDATION STATES-->
                <div class="">

                    @if(\Illuminate\Support\Facades\Session::has('send'))
                        <div class="note note-success">
                            <h4 class="block">Successful</h4>

                            <p> Successfully Send

                            </p>
                        </div>
                    @endif
                    <div class="row ">
                        <!-- BEGIN Portlet PORTLET-->
                        <div class="col-md-12" style="background-color:white;">
                            <div class="portlet-title">
                                {{--<div class="caption">--}}
                                {{--<i class="fa fa-gift"></i>--}}
                                {{--</div>--}}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="col-xs-12 col-sm-12 col-md-12" style="height:auto;">
                                   <!--  <strong>{{$data->name}}</strong> <br/> -->
                                    {!! $data->description !!}
                                    <br>
                                </div>

                                <strong style="color:#67809f;">
                                    <span style="color:#36c6d3">Post Date :</span> {{$data->created_at}}
                                </strong>
 <div class="col-xs-12">&nbsp;</div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <?php
                                $get_draw1 = DB::connection('mysql_service')->table('attachment')->where([['project_id', '=', $data->id], ['position', '=', 1]]);
                                ?>
                                @if($get_draw1->count() != 0 )
                                    <a href="{{'http://www.hivephing.com/constructback/public/user_attachments/'.$get_draw1->first()->file_name}}"
                                       class="btn blue" download="{{$get_draw1->first()->file_name}}"> Draw 1
                                        <span class="fa fa-download"></span></a>
                                @else
                                @endif
                                <?php
                                $get_draw2 = DB::connection('mysql_service')->table('attachment')->where([['project_id', '=', $data->id], ['position', '=', 2]]);
                                ?>
                                @if($get_draw2->count() != 0 )
                                    <a href="{{'http://www.hivephing.com/constructback/public/user_attachments/'.$get_draw2->first()->file_name}}"
                                       class="btn blue" download="{{$get_draw2->first()->file_name}}"> Draw 2
                                        <span class="fa fa-download"></span>
                                    </a>
                                @else

                                @endif
                                <?php
                                $get_draw3 = DB::connection('mysql_service')->table('attachment')->where([['project_id', '=', $data->id], ['position', '=', 3]]);
                                ?>
                                @if($get_draw3->count() != 0 )
                                    <a href="{{'http://www.hivephing.com/constructback/public/user_attachments/'.$get_draw3->first()->file_name}}"
                                       class="btn blue" download="{{$get_draw3->first()->file_name}}"> Draw 3
                                        <span class="fa fa-download"></span></a>
                                @else
                                @endif

                                <br>
                                <br>
                                <br>
                                <?php
                                $com_id = \Illuminate\Support\Facades\DB::table('company')->where('user_id', Auth::user()->id)->first();
                                $check_downloaded = \Illuminate\Support\Facades\DB::connection('mysql_service')->table('upload_form_for_quo')->where([['com_id', '=', $com_id->id], ['project_id', '=', $data->id]]);
                                ?>

                                @if(!empty($check_downloaded->count()))


                                @else

                                    <form action="{{url('entra/upload_quotation')}}" method="post"
                                          enctype="multipart/form-data">
                                        <label>To upload Quotation</label><br>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <input type="file" name="quotation_file"/>
                                            <input type="hidden" name="pid" value="{{$data->id}}"/>
                                            <input type="hidden" name="cid" value="{{$com_id->id}}"/>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <input type="submit" name="quotation_file"/>
                                        </div>
                                    </form>
                                    <br>
                                    <br>
                                    <br>


                                @endif


                                <div class="col-xs-12 col-sm-12 col-md-8">
                                    <a href="{{url('public/users/entro/qfile/forop/'.$data->quotation_file)}}"
                                       class="btn yellow" style="width:60%;"> Download Quotation form
                                        <span class="fa fa-envelope  "></span></a>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="col-xs-12 col-sm-12 col-md-8">
                                    <a href="{{url('entra/cancel_request/'.$data->id)}}" class="btn green"
                                       style="width:60%;"> Cancel Request <span class="fa fa-paper-plane"></span></a>
                                </div>
                            </div>
                            </div>
                            <div class="col-xs-12">&nbsp;</div>

                        </div>
                        <!-- END Portlet PORTLET-->
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>

    </div>
</div>


@endsection