<?php
echo header("Cache-Control:no-store,no-cache,must-revalidate,max-age=0");header("Cache-Control:post-check=0,pre-check=0", false);header("Pragma:no-cache");header('Content-Type:text/html');

?>
@extends('layout.master')
@section('title','Service')
@section('content')
    @if(sizeof($data)==0)

        <h4 class="alert alert-info">There is no data currently</h4>

    @else
       
        @if (session('restore'))
        <div class="alert alert-success">
        {{ session('restore') }}
        </div>
        @endif


        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Deleted Projects
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Post ID</th>
                                    <th class="text-center">Owner</th>
                                    <th class="text-center">Description</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 1; ?>
                                @foreach($data as $d)

                                        <tr>
                                            <td class="text-center"><?php echo $count;$count += 1; ?></td>
                                            <td class="text-center"> {{$d->id}} </td>
                                            <td class="text-center">
                                                {{ $d->name }}
                                            </td>
                                            <td class="text-center" style = "width : 30px; height: 30px;">
                                                {{ $d->description }}
                                            </td>
                                            

                                            <td class="text-center">
                                                <a href="restore_post/{{$d->id}}" class="btn btn-success">
                                                    <i class="fa fa-window-restore" aria-hidden="true"></i>
                                                    Restore
                                                </a>
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