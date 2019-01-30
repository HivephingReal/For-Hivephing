@extends('layout.master')
@section('title','Pending Detail')
@section('content')
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <style media="screen">

            .lib-panel {
                margin-bottom: 20Px;
            }

            .lib-panel img {
                width: 100%;
                background-color: transparent;
            }

            .lib-panel .row,
            .lib-panel .col-md-6 {
                padding: 0;
                background-color: #FFFFFF;
            }

            .lib-panel .lib-row {
                padding: 0 20px 0 20px;
            }

            .lib-panel .lib-row.lib-header {
                background-color: #FFFFFF;
                font-size: 20px;
                padding: 10px 20px 0 20px;
            }

            .lib-panel .lib-row.lib-header .lib-header-seperator {
                height: 2px;
                width: 26px;
                background-color: #d9d9d9;
                margin: 7px 0 7px 0;
            }

            .lib-panel .lib-row.lib-desc {
                position: relative;
                height: 100%;
                display: block;
                font-size: 13px;
            }

            .lib-panel .lib-row.lib-desc a {
                position: absolute;
                width: 100%;
                bottom: 10px;
                left: 20px;
            }

            .row-margin-bottom {
                margin-bottom: 20px;
            }

            .box-shadow {
                -webkit-box-shadow: 0 0 10px 0 rgba(0, 0, 0, .10);
                box-shadow: 0 0 10px 0 rgba(0, 0, 0, .10);
            }

            .no-padding {
                padding: 0;
            }
   /* table */
   table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        </style>
    </head>

    <div class="">

        @if(session('update'))
            <span class="form-control alert-success">
                <strong>{{ session('update') }}</strong>
            </span>
        @endif

        @if ($errors->has('description'))
            <span class="form-control alert-danger">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif

        @if ($errors->has('address'))
            <span class="form-control alert-danger">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif

        <hr>

        <div class="row row-margin-bottom">
            <div class="col-md-1">
            </div>
            <div class="col-md-8 no-padding lib-item" data-category="view">
                <div class="lib-panel">
                    <div class="row box-shadow">
                        <div class="col-md-10 offset-col-1">
                            <div class="lib-row lib-header">
                                <?php
                                $service_data = \Illuminate\Support\Facades\DB::connection('mysql_service')
                                    ->table('for_repair')->where('id', $data->post_id)->first();
                                ?>
                                <strong>Name : </strong>
                                {{$service_data->name}}

                                <div class="lib-header-seperator"></div>
                                <strong>Phone : </strong>
                                {{$service_data->phone}}

                                <div class="lib-header-seperator"></div>
                                <strong>Type : </strong>
                                <?php
                                $dd = 'Database Wrong';

                                switch ($service_data->fr_type) {
                                    case 'fr1':
                                        $dd = 'ေရလုိင္း';
                                        break;
                                    case 'fr2':
                                        $dd = 'မီးလိုင္း';
                                        break;

                                    case 'fr3':
                                        $dd = 'လၽွပ္စစ္သြယ္တန္းျခင္း';
                                        break;

                                    case 'fr4':
                                        $dd = 'Air-con တပ္ဆင္ျခင္း';
                                        break;

                                    case 'fr5':
                                        $dd = 'အလူမီနီယံလုပ္ငန္း';
                                        break;

                                    case 'fr6':
                                        $dd = 'ေဆးသုတ္မည္';
                                        break;

                                    case 'fr7':
                                        $dd = 'ၾကမ္းခင္း၊ ပါေကးခင္းမည္';
                                        break;

                                    case 'fr8':
                                        $dd = 'CCTV ႏွင့္ လံုျခံဳေရးပစၥည္းမ်ား တပ္ဆင္မည္';
                                        break;

                                    case 'fr9':
                                        $dd = 'အေဆာက္အဦး ေဆာက္လုပ္မည္';
                                }
                                switch ($service_data->fr_type) {

                                    case 'fn1':
                                        $dd = 'အိမ္ခန္းအတြင္း အလွဆင္မည္';
                                        break;
                                    case 'fn2':
                                        $dd = 'ဆိုင္ခန္းအတြင္း အလွဆင္မည္';
                                        break;

                                    case 'fn3':
                                        $dd = 'လၽွပ္စစ္သြယ္တန္းျခင္း';
                                        break;

                                    case 'fn4':
                                        $dd = 'အေဆာက္အဦးအတြင္း အလွဆင္မည္';
                                        break;

                                    case 'fn5':
                                        $dd = 'Shopping Mall အတြင္း အလွဆင္မည္';
                                        break;
                                }
                                switch ($service_data->fr_type) {

                                    case 'b1':
                                        $dd = 'Building';
                                        break;
                                    case 'b2':
                                        $dd = 'Lan ';
                                        break;

                                    case 'b3':
                                        $dd = 'Tat tar';
                                        break;


                                }

                                switch ($service_data->fr_type) {
                                    case 'rb1':
                                        $dd = 'အေဆာက္အဦးအား ျပန္လည္တည္ေဆာက္မည္';
                                        break;
                                    case 'rb2':
                                        $dd = 'ေရလုိင္း';
                                        break;
                                    case 'rb3':
                                        $dd = 'လၽွပ္စစ္သြယ္တန္းျခင္း';
                                        break;
                                    case 'rb4':
                                        $dd = 'Air-con တပ္ဆင္ျခင္း';
                                        break;
                                    case 'rb5':
                                        $dd = 'CCTV ႏွင့္ လံုျခံဳေရးပစၥည္းမ်ား တပ္ဆင္မည္';
                                        break;
                                }
                                ?>
                                {{$dd}}

                                <div class="lib-header-seperator"></div>
                                <strong>Description : </strong>

                                {!! $service_data->description !!}

                                <div class="lib-header-seperator"></div>
                                <strong>Quotation : </strong>
                                {{$service_data->quotation}}


                                <div class="lib-header-seperator"></div>
                                <strong>Project Define Point : </strong>
                                {{$service_data->project_define_point}}

                                <div class="lib-header-seperator"></div>
                                <strong>Address : </strong>
                                {{$service_data->address}}

                                <div class="lib-header-seperator"></div>
                                <div> asfaf</div>
                                <strong>Link : </strong>
                                http://www.hivephing.com/companies/entra/construct_project_detail/{{$service_data->id}}

                                <div class="lib-header-seperator"></div>
                                <strong>City : </strong>
                                <?php
                                $city = \Illuminate\Support\Facades\DB::table('cities')->where('id', $service_data->city)->first();
                                ?>
                                {{$city->myan_name}}
                                <div class="lib-header-seperator"></div>

                                <strong>State : </strong>
                                <?php
                                $state = \Illuminate\Support\Facades\DB::table('states')->where('id', $service_data->state)->first();
                                ?>
                                {{$state->mm_name}}
                                <div class="lib-header-seperator"></div>

                                <strong>Created Date : </strong>
                                {{$service_data->updated_at}}

                                @if(!empty($service_data->quotation_file))
                                    <a href="{{'localhost/companies/public/users/entro/qfile/forop'.$service_data->quotation_file}}"
                                       class="btn blue" download="{{$service_data->quotation_file}}">Quotation File
                                        <span class="fa fa-download"></span></a>
                                @endif

                                <strong>Created Date : </strong>
                                <?php
                                $get_draw1 = DB::connection('mysql_service')->table('attachment')->where([['project_id', '=', $service_data->id], ['position', '=', 1]]);
                                ?>
                                @if($get_draw1->count() != 0 )
                                    <a href="{{'http://www.hivephing.com/constructback/public/user_attachments/'.$get_draw1->first()->file_name}}"
                                       class="btn blue" download="{{$get_draw1->first()->file_name}}"> Draw 1
                                        <span class="fa fa-download"></span></a>
                                @else

                                @endif
                                <?php
                                $get_draw2 = DB::connection('mysql_service')->table('attachment')->where([['project_id', '=', $service_data->id], ['position', '=', 2]]);
                                ?>
                                @if($get_draw2->count() != 0 )
                                    <a href="{{'http://www.hivephing.com/constructback/public/user_attachments/'.$get_draw2->first()->file_name}}"
                                       class="btn blue" download="{{$get_draw2->first()->file_name}}"> Draw 2
                                        <span class="fa fa-download"></span></a>
                                @else

                                @endif
                                <?php
                                $get_draw3 = DB::connection('mysql_service')->table('attachment')->where([['project_id', '=', $service_data->id], ['position', '=', 3]]);
                                ?>
                                @if($get_draw3->count() != 0 )
                                    <a href="{{'http://www.hivephing.com/constructback/public/user_attachments/'.$get_draw3->first()->file_name}}"
                                       class="btn blue" download="{{$get_draw3->first()->file_name}}"> Draw 3
                                        <span class="fa fa-download"></span></a>
                                @else

                                @endif
                                <br>
                                <?php

                                $check_conf = \Illuminate\Support\Facades\DB::table('relation_user_post_and_op')->where('post_id', $service_data->id)->first();

                                ?>
                                @if($check_conf->process == 'confirmed')

                                    <strong>Seen Company Count : </strong>
                                    <?php
                                    $seen_count = DB::table('user_saw_this_plan')->where('project_id', $service_data->id)->count();

                                    ?>
                                    {{$seen_count}}

                                @endif
                                <div class="lib-header-seperator"></div>

                                @if($check_conf->process == 'pending')
                                    <a href="#" class="btn btn-success" onclick="goto({{$service_data->id}});">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        Confirm
                                    </a>
                                @else
                                    <?php
                                    $count_close = \Illuminate\Support\Facades\DB::table('close_project_by_admin')->where('project_id', $service_data->id);
                                    ?>
                                    @if($count_close->count() == 0)
                                        <a class="btn btn-success" id="close">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                            Close
                                        </a>
                                    @else
                                        <a class="btn btn-success" id="open">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                            Open
                                        </a>
                                    @endif

                                @endif

                                <a type="button" class="btn btn-info" data-toggle="modal" data-target="#edit_modal">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    Edit
                                </a>
                                <a type="button" href='{{url('see_which_company_see_thist/'.$service_data->id.'/'.$data->id)}}'
                                   class="btn btn-default" data-dismiss="modal">
                                    See which company see this?
                                </a>
                                <!-- Modal -->
                                <div id="edit_modal" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-md">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;
                                                </button>
                                                <h4 class="modal-title"> Edit Services </h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('service/detail/'.$data->post_id.'/edit') }}"
                                                      method="post" enctype="multipart/form-data">
                                                    <input type="hidden" value="{{ $service_data->description }}">
                                                    <input type="hidden" value="{{ $service_data->address }}">

                                                    <div class="form-group">
                                                        <label for="description"> Description </label>
                                                        <textarea id="edit" class="form-control" name="description">
                                                            {{ $service_data->description }}
                                                        </textarea>
                                                        @if($errors->has('description'))
                                                            <span class="help-block">
                                                                    <strong style="color: #f00;">
                                                                        {{ $errors->first('description') }}
                                                                    </strong>
                                                                </span>
                                                        @endif

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address"> Address </label>
                                                        <textarea name="address" id="address" rows="3"
                                                                  class="form-control">{{ $service_data->address }}</textarea>

                                                        @if($errors->has('address'))
                                                            <span class="help-block">
                                                                    <strong style="color: #f00;">
                                                                        {{ $errors->first('address') }}
                                                                    </strong>
                                                                </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="define_point"> Project Define Point </label>
                                                        <input type="text" name="project_define_point"
                                                               class="form-control"
                                                               value="{{ $service_data->project_define_point }}">

                                                        @if($errors->has('project_define_point'))
                                                            <span class="help-block">
                                                                    <strong style="color: #f00;">
                                                                        {{ $errors->first('project_define_point') }}
                                                                    </strong>
                                                                </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="define_point"> Quotation </label>
                                                        <input type="text" name="quotation"
                                                               class="form-control"
                                                               value="{{ $service_data->quotation }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="define_point"> Quotation File </label>
                                                        <input type="file" name="quotation_file"
                                                               class="form-control"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <button type="submit" class="btn btn-success pull-right">Save
                                                        Changes
                                                    </button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <form method="post" action="{{url('close_project')}}" id='close_form'
                                      style="display:none;">
                                    <input type="hidden" value="{{$service_data->id}}" name="id"/>
                                    <input type="submit" value="submit" name="dd"/>
                                </form>
                                <form method="post" action="{{url('open_project')}}" id='open_form'
                                      style="display:none;">
                                    <input type="hidden" value="{{$service_data->id}}" name="id"/>
                                    <input type="submit" value="submit" name="dd"/>
                                </form>
                                <script>
                                    function goto(id) {
                                        if (window.confirm('Are u sure want to confirm?') == true) {
                                            window.location.assign('confirm/' + id);
                                        }

                                    }
                                    $("#close").click(function () {
                                        $('#close_form').submit();
                                    });
                                    $("#open").click(function () {
                                        $('#open_form').submit();
                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php
        if(count($req_com)==0)
        {
            echo "<hr><h3>There's no requesting company for this project.</h3>";
        }
        else{
         ?>
         <hr> <h3>Requesting companies for this projects</h3>
       <table>
           <tr>
               <th>No.</th>
               <th>Company ID</th>
               <th>Company Name</th>
               <th>Requested time</th>
           </tr>
        <?php
           $i=0;
           foreach($req_com as $rc){
               $i++;
               $company = DB::table('company')
                               ->where([['user_id', '=', $rc->requester_id]])
                               ->first(); ;
         ?>      
               <tr>
                   <td>{{ $i }}</td>
                   <td>{{ $company->id }}</td>
                   <td>{{ $company->name }}</td>
               <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($rc->created_at))->diffForHumans()}}</td>
               </tr>
         <?php    
         //end of loop  
           }  
           //end of else
        }
        ?>
    </div>

@endsection