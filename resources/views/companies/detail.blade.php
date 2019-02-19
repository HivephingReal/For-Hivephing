@extends('layout.master')
@section('title','News Browse')
@section('content')
    <head>
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

        </style>
    </head>

        @if(session('block'))
            <div class="alert alert-danger">
                {{ session('block') }}
            </div>
        @endif

    @if(session('unblock'))
        <div class="alert alert-primary">
            {{ session('unblock') }}
        </div>
    @endif

    <a href="" style="text-decoration:none;">
        <h4>
            <i class="fa fa-newspaper-o" aria-hidden="true"></i> Browse Article
        </h4>
    </a>

    <div class="container">

        <hr>
        <div class="row row-margin-bottom">
            <div class="col-md-1">

            </div>
            <div class="col-md-8 no-padding lib-item" data-category="view">
                <div class="lib-panel">
                    <div class="row box-shadow">

                        <div class="col-md-12">
                            <div class="lib-row lib-header">
                                {{$data->name}}   {{$data->id}}

                                <div class="lib-header-seperator"></div>
                            </div>
                            <br>

                            <div class="lib-row lib-desc">
                                {!! $data->description !!}
                            </div>
                            <br>

                            <div class="lib-row lib-desc">
                                <?php
                                $bname = \Illuminate\Support\Facades\DB::table('construct')->where('id', $data->business_hub)->first();

                                ?>
                                {!! $bname->name !!}
                            </div>
                            <br>

                            <div class="lib-row lib-desc">
                                <?php
                                $cname = \Illuminate\Support\Facades\DB::table('cities')->where('id', $data->city_id)->first();

                                ?>
                                {!! $cname->name !!}
                            </div>
                            <br>

                            <div class="lib-row lib-desc">
                                {!! $data->address !!}
                            </div>
                            <br>

                            <div class="lib-row lib-desc">
                                {!! $data->email !!}
                            </div>
                            <br>

                            <div class="lib-row lib-desc">
                                {!! $data->phone !!}
                            </div>
                            <br>
                            <div class="lib-row lib-desc">
                                <?php
                                $points = \Illuminate\Support\Facades\DB::table('company_with_plan')->where('com_id', $data->id);
                                ?>
                                @if($points->count() > 0)
                                   Remaining Points: {{$points->first()->remaining_point}}
                                @endif
                            </div>
                            <br>

                            <div class="lib-row lib-desc">
                                {!! $data->created_at !!}
                            </div>
                            <div class="lib-row lib-desc">
                                See_project_count  : 
                                 <?php
                                    $total = DB::SELECT('SELECT DISTINCT project_id FROM see_projects_with_plan WHERE user_id = ?;',[$data->user_id]);
                                    echo count($total);
                                 ?>
                            </div>
                            <br>

                            <br>
                            <br>
                            <br>
                            <div class="pull-right" style="margin-left: 5px;">
                                <a href="{{url('companies/add_plan/'.$data->id)}}" class="btn btn-success">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    Add Plan
                                </a>
                            </div>
                            <div class="pull-right" style="margin-left: 5px;">
                                <a href="{{url('companies/see_projects/'.$data->user_id)}}" class="btn btn-success">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    See Project
                                </a>
                            </div>

                            @if($circum === 'block')
                                <div class="pull-right">
                                    <a href="{{url('companies/unblock/'.$data->id)}}" class="btn btn-success">
                                        <i class="fas fa-ban" aria-hidden="true"></i>
                                        Unblock this Company
                                    </a>
                                </div>
                            @else
                                <div class="pull-right">
                                    <a href="{{url('companies/block/'.$data->id)}}" class="btn btn-success">
                                        <i class="fas fa-ban" aria-hidden="true"></i>
                                        Block this Company
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection
