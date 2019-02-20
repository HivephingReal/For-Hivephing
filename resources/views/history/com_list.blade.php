<?php
echo header("Cache-Control:no-store,no-cache,must-revalidate,max-age=0");header("Cache-Control:post-check=0,pre-check=0", false);header("Pragma:no-cache");header('Content-Type:text/html');

?>
@extends('layout.master')
@section('title','Company')
@section('content')
    @if(sizeof($com_list)==0)

        <h4 class="alert alert-info">There is no data currently</h4>

    @else

        <div class="row">
            <p style="    font-size: 20px; color: #337ab6; font-weight: bold;">&nbsp;&nbsp;Monthly Registered Companies</p><br>

            @if ($errors->has('year'))
                <span class="help-block">
                    <strong style = "color: red;">{{ $errors->first('year') }}</strong>
                </span>
            @endif
            @if ($errors->has('month'))
                <span class="help-block">
                    <strong style="color: red;">{{ $errors->first('month') }}</strong>
                </span>
            @endif

            <div class="col-md-12">
                <!-- Advanced Tables -->
                <form method='get' action='{{url('monthly_registered_companies')}}'>
                    {{csrf_field()}}
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span style="font-weight:bolder; font-size: 17px;">
                        {{ $year }} &nbsp;{{ $month }} : 
                        <?php $count_com = count($com_list); ?>  {{ $count_com }} 
                        @if($count_com <= 1)
                            company
                        @else
                            companies
                        @endif
                        </span>
                        &emsp;
                        <select name = "year" style="color:#337ab6; border-radius: 5px; padding: 6px;">
                            <option value="" selected disabled>Choose a year</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                        </select>
                        
                        <select name = "month" style="color:#337ab6; border-radius: 5px; padding: 6px;">
                            <option value="" selected disabled>Choose a month</option>
                            <?php 
                                $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
                                $i = 0;
                                foreach ($months as $month) {
                                    $i++;
                                echo "<option value=".$i.">".$month."</option>";
                                }
                            ?>
                        </select>
                       
                        <button type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Search</button>
                    </div>
                </form>

                <!-- com list table -->
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
                                @foreach($com_list as $dd)
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
                                             <a href="{{url('companies/detail/'.$dd->id)}}" class="btn btn-info">
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

@endsection
