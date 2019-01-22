@extends('layouts.dashboard')

@section('content')
<!-- BEGIN : LOGIN PAGE 5-1 -->
@section('title')
    Tenders
@endsection
@section('bg'){{asset('images/about_banner.jpg')}}@endsection
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

<div class="col-xs-12" style="background-color:#ddedf2; padding: 30px;">
    <div class="col-xs-12" style="background-color:white; padding-bottom: 30px;">
    <div class="col-xs-12" style="background-color: #8ca9d038;text-align: center;font-family: Century Gothic;font-size:30px;font-weight:bolder; margin-bottom: 30px;margin-top: 30px;">Tenders
    </div>
    @if($bid != '')
        @foreach($imp_events as $in)
            <div class="col-md-6 " >
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>{{ str_limit($in->title, 30)}} </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                            <a href="" class="fullscreen" id="{{$in->id}}"> </a>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div style="overflow:auto;height:300px;">

                            <strong>{{$in->title}}</strong> <br/>
                            <img src="{{asset('upload/tenders/'.$in->photo)}}" width="652"
                                 style=" vertical-align: text-top;float:left;margin:9px;"></img>
                            {!! $in->description !!}
                        </div>
                        <strong style="color:#67809f;">Create Date:<{{$in->created_at}}> </strong>

                    </div>
                </div>
                <!-- END Portlet PORTLET-->
            </div>

        @endforeach

    @endif

    @foreach($events as $n)
        <div class="col-md-6 ">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>{{ str_limit($n->title, 30)}}</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a> <a href="#" class="fullscreen" id=""> </a>
                    </div>

                </div>
                <div class="portlet-body">
                    <div style="overflow:auto;height:300px;">
                        <strong>{{$n->title}}</strong> <br/>
                        <img src="{{asset('upload/tenders/'.$n->photo)}}" width="652"
                             style=" vertical-align: text-top;float:left;margin:9px;"></img>
                        {!!  $n->description !!}
                    </div>

                    <strong style="color:#67809f;">Create Date:<{{$n->created_at}}> </strong>
                </div>
            </div>
            <!-- END Portlet PORTLET-->
        </div>
    @endforeach
    <div class="row">&nbsp;</div>
    <div class="row">
        <div class="col-sm-4">&nbsp;&nbsp;&nbsp;
        </div>
        <div class=" col-sm-6">
            {{$events->links()}}
        </div>
        <div class="col-sm-2">&nbsp;&nbsp;&nbsp;
        </div>
    </div>


</div>
</div>
@endsection

