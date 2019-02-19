@extends('layout.master')
@section('title','Company')
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
                        Company Table
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Seen Projects</th>
                                    <th class="text-center">Requested Projects</th>
                                    <th class="text-center">Comfirmed Projects</th>
                                    <th class="text-center">Remaining Points</th>

                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 1; ?>
                                @foreach($data as $dd)
                                    <tr>
                                        <td class="text-center"><?php echo $count;$count += 1; ?></td>

                                        <td>{{$dd->name}}</td>
                                         <td>
                                         <?php
                                         $ee= \Illuminate\Support\Facades\DB::table('users')->where('id',$dd->user_id);
                                          
                                         ?>
                                         @if($ee->count() > 0)
                                         {{$ee->first()->email}}
                                         @endif
                                         </td>
                                        <td>{{$dd->phone}}</td>
                                        <td>
                                            <?php
                                                 $total = DB::SELECT('SELECT DISTINCT project_id FROM see_projects_with_plan WHERE user_id = ?;',[$dd->user_id]);
                                                 
                                           
                                            echo count($total);
                                             ?>
                                        </td>
                                        <td>
                                            <?php
                                                $project_count=DB::connection('mysql_service')->table('request')->where('requester_id',$dd->user_id)->count();
                                            ?>
                                            {{$project_count}}
                                        </td>
                                        <td>
                                           <?php
                                                $project_count=DB::connection('mysql_service')->table('request')->where('requester_id',$dd->user_id)->where([['status', '=', 'con']])->count();
                                            ?>
                                            {{$project_count}}
                                        </td>
                                        <td>
                                            <?php
                                            $points = \Illuminate\Support\Facades\DB::table('company_with_plan')->where('com_id', $dd->id);
                                            ?>
                                            @if($points->count() > 0)
                                                {{$points->first()->remaining_point}}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="companies/detail/{{$dd->id}}" class="btn btn-info">
                                                <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                                                Detail
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


    <a href="{{url('countries/upload')}}" class="btn btn-info pull-right">
        <i class="fa fa-plus" aria-hidden="true"></i>
        New Country
    </a>

@endsection
