<?php
echo header("Cache-Control:no-store,no-cache,must-revalidate,max-age=0");
header("Cache-Control:post-check=0,pre-check=0", false);
header("Pragma:no-cache");
header('Content-Type:text/html');

?>
@extends('layout.master')
@section('title','Pending')
@section('content')
    @if(sizeof($data)==0)

        <h4 class="alert alert-info">There is no data currently</h4>

    @else

        @if(session('update'))

            <p class="alert alert-info">{{session('update')}}</p>

        @endif
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-primary">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Quotation</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $d)
                                    <tr>
                                        <td>
                                            {{$d->id}}
                                        </td>
                                        <td>
                                            <?php
                                            $com = DB::table('company')->where('user_id', $d->user_id)->first();
                                            ?>
                                            {{$com->name}}
                                        </td>
                                        <td>
                                            <?php
                                            $com = DB::table('company')->where('user_id', $d->user_id)->first();
                                            ?>
                                            {{$com->phone}}
                                        </td>

                                        <td>{{$d->created_at}}
                                        </td>
                                        <td>
                                            <?php
                                            $upload_quo = \Illuminate\Support\Facades\DB::connection('mysql_service')->table('upload_form_for_quo')->where([['project_id', '=', $pid], ['com_id', '=', $d->id]]);
                                            ?>
                                            @if($upload_quo->count() > 0 )
                                                <a href="{{'http://localhost/constructback/public/users/entro/qfile/'.$upload_quo->first()->quotation_file}}"
                                                   class="btn blue" download="{{$upload_quo->first()->quotation_file}}"> Draw 1
                                                    <span class="fa fa-download"></span></a>
                                            @else

                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    @endif


@endsection