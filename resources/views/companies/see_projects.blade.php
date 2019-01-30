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
                                    <th> No</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Des</th>
                                    <th class="text-center">Close</th>
                                    <th class="text-center">Point</th>
                                    <th class="text-center">Date</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $d)
                                    <?php
                                    $com_cc = DB::connection('mysql_service')->table('for_repair')->where('id', $d->project_id)->count();

                                    ?>
                                    @if($com_cc != 0)

                                        <?php
                                        $com = DB::connection('mysql_service')->table('for_repair')->where('id', $d->project_id)->first();
                                        ?>
                                        <tr>
                                            <td>{{$com->id}}
                                            </td>
                                            <td>
                                                {{$com->name}}
                                            </td>
                                            <td>
                                                {{$com->phone}}

                                            </td>
                                            <td>
                                                {{strip_tags(str_limit($com->description,'110'))}}
                                            </td>
                                            <td>
                                                {{$com->close}}
                                            </td>
                                            <td>
                                                {{$com->project_define_point}}
                                            </td>
                                            <td>
                                                {{$d->created_at}}
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