<?php
echo header("Cache-Control:no-store,no-cache,must-revalidate,max-age=0");header("Cache-Control:post-check=0,pre-check=0", false);header("Pragma:no-cache");header('Content-Type:text/html');

?>
@extends('layout.master')
@section('title','Service')
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
                        @if(preg_match('/confirmed_service/',url()->current()))

                            Confirm Table &emsp;

                            <?php
                                $count_CON=\Illuminate\Support\Facades\DB::connection('mysql_service')->table('for_repair')->where([['confirm','=','confirmed'],['close','=',0]])->count();
                            ?>

                            <?php
                                $op_CON=\Illuminate\Support\Facades\DB::connection('mysql_service')->table('for_repair')->where([['confirm','=','confirmed'],['close','=',1]])->count();
                            ?>
                            Confirmed Projects Counts -&emsp;Open : {{$count_CON}}&emsp;Close : {{$op_CON}}

                        @else
                            Pending Table &emsp;

                            <?php
                            $count_CON=\Illuminate\Support\Facades\DB::connection('mysql_service')->table('for_repair')->where([['confirm','=','pending'],['close','=',0]])->count();
                            ?>

                            Pending Projects Counts  : {{$count_CON}}

                        @endif
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Post ID</th>
                                    <th class="text-center">Owner</th>
                                    <th class="text-center">phone</th>
                                    <th class="text-center">service type</th>
                                    <th class="text-center">need quotation</th>
                                    <th class="text-center">Expired</th>
                                    <th class="text-center">Count see</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 1; ?>
                                @foreach($data as $d)

                                    <?php
                                    $service_check = DB::connection('mysql_service')->table('for_repair')->where('id', $d->post_id);
                                    $service_data = $service_check->first();
                                    ?>

                                    @if($service_check->count() > 0)

                                        <tr>
                                            <td class="text-center"><?php echo $count;$count += 1; ?></td>
                                            <td class="text-center"> {{$d->post_id}} </td>
                                            <td class="text-center">
                                                {{$service_data->name}}
                                                <?php
                                                $acc_name = \Illuminate\Support\Facades\DB::connection('mysql_service')->table('users')->where('id', $service_data->user_id)->first();
                                                ?>
                                                {{--                                            {{$acc_name->name}}--}}
                                            </td>
                                            <td class="text-center">
                                                {{$service_data->phone}}
                                            </td>
                                            <td class="text-center">
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
                                            </td>
                                            <td class="text-center">
                                                {{$service_data->quotation}}
                                            </td>
                                            <td class="text-center">
                                                @if($service_data->close == 1)
                                                    Yes
                                                @else
                                                    No
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                @if(preg_match('/confirmed_service/',url()->current()))

                                                    <?php
                                                    $count_see = DB::table('user_saw_this_plan')->where('project_id', $service_data->id)->count();
                                                    ?>
                                                    {{$count_see}}
                                                    
                                                @else
                                                    0
                                                @endif
                                            </td>


                                            <?php
                                            $check_conf = \Illuminate\Support\Facades\DB::table('relation_user_post_and_op')->where('post_id', $service_data->id)->first();
                                            ?>
                                            <td class="text-center">
                                                <a href="service/detail/{{$d->id}}" class="btn btn-success">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    Detail
                                                </a>
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
    <a href="{{url('countries/upload')}}" class="btn btn-info pull-right">
        <i class="fa fa-plus" aria-hidden="true"></i>
        New Pending Service
    </a>

@endsection