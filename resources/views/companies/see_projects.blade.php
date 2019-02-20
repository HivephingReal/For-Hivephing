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
                    <div class="panel-heading">

                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th class="text-center">Post ID</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Close</th>
                                    <th class="text-center">Point</th>
                                    <th class="text-center">Seeing Count</th>
                                    <th class="text-center">Last Seeing Time</th>

                                </tr>
                                </thead>
                                <tbody>
                            @foreach($data as $d)
                                <?php
                                    $com = DB::connection('mysql_service')->table('for_repair')->where('id', $d->project_id)->first();
                                    $create = DB::table('see_projects_with_plan')->where('project_id', $d->project_id)->where('user_id', $user_id)->orderBy('created_at', 'desc')->first();
                                
                                    ?>
                                @if(!empty($com))
                                <tr>
                                    <td  class="text-center">{{ $d->project_id }}</td>
                                    <td  class="text-center">{{ $com->name }}</td>
                                    <td  class="text-center">{{ $com->phone }}</td>
                                    <td  class="text-center">
                                        {{strip_tags(str_limit($com->description,'110'))}}
                                    </td>
                                    <td  class="text-center">{{ $com->close }}</td>
                                    <td  class="text-center">{{ $com->project_define_point }}</td>
                                    <td class="text-center">{{ $d->count }}</td>
                                    <td  class="text-center">
                                        {{ $create->created_at }}   
                                    </td>
                                </tr>
                                @endif
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