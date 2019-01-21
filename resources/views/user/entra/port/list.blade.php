@extends('layouts.dashboard')

@section('content')
@section('title')
    Portfolio
@endsection
@section('bg'){{asset('images/about_banner.jpg')}}@endsection

<!-- BEGIN SIDEBAR -->

<!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->

    <!-- BEGIN CONTENT BODY -->
    <div class="col-xs-12" style="background-color:#ddedf2; padding: 30px;" >
         <div class="col-xs-12" style="background-color:white;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN THEME PANEL -->

        <!-- END THEME PANEL -->
        <!-- BEGIN PAGE BAR -->


         <div class="col-xs-12" style="background-color: #8ca9d038;text-align: center;font-family: Century Gothic;font-size:30px;font-weight:bolder;margin-top: 30px;">Your Portfolio
        </div>
        <div class="col-xs-12" style="background-color: #80808021;text-align: center; font-size:30px;font-weight:bolder; margin-bottom: 30px;margin-top: 10px;">
              <a href="{{url('entra/portfolio/add')}}" class="btn btn-info">Add New Portfolio</a>
        </div>
          
        <div class="col-xs-12">
            @foreach($data as $d)

                <div class="col-md-6 " >
                    <!-- BEGIN Portlet PORTLET-->
                    <div class="portlet box blue-hoki" >
                        <div class="portlet-title" >

                            <div class="caption" >
                                <i class="fa fa-gift" ></i >
                            </div >
                            @if(Auth::user()->id == $d->user_id)
                                <div class="actions" >
                                    <a href="{{url('entra/portfolio/edit/'.$d->id)}}"
                                       class="btn btn-default btn-sm" >
                                        <i class="fa fa-pencil" ></i > Edit </a >
                                    <a href="javascript:;" onclick="de('{{url('entra/portfolio/delete/'.$d->id)}}')"
                                       class="btn btn-default btn-sm" >
                                        <i class="fa fa-trash" ></i > Delete </a >
                                </div >
                                <script>
                                    function de(li) {
                                        if (window.confirm('Are You Sure Want to delete?')) {
                                            window.location.assign(li);
                                        }
                                    }
                                </script>
                            @endif

                        </div >
                        <div class="portlet-body" style="overflow: auto; heigtht:221px;" >
                            <div class="scroller" style="height:200px" data-rail-visible="1"
                                 data-rail-color="yellow"
                                 data-handle-color="#a1b2bd" >
                                <strong >{{$d->project_name}}</strong >
                                <br>
                                <div style="width:100%;">
                                <img src="{{url('/public/users/entro/photo/portfolio/'.$d->photo)}}"
                                     style=" vertical-align: text-top;float:left;margin:9px; width:30%;" />
                                @if($d->photo1 != NULL)

                                    <img src="{{url('/public/users/entro/photo/portfolio/'.$d->photo1)}}"
                                         style=" vertical-align: text-top;float:left;margin:9px;; width:30%;" />
                                @endif
                                @if($d->photo2 != NULL)
                                    <img src="{{url('/public/users/entro/photo/portfolio/'.$d->photo2)}}"
                                         style=" vertical-align: text-top;float:left;margin:9px;; width:30%;" />
                                @endif
                                </div>
                                <br>
                            </div>
                            <div style="height:92px;overflow:auto;">
                            {!! $d->description !!}

                            </div>

                            <strong style="color:#67809f;" >Address:</strong >{{$d->address}}
                            <br>

                            <strong style="color:#67809f;" >Start Date:{{\Carbon\Carbon::parse($d->start_date)->toFormattedDateString()}}</strong >
                            <br>
                            <strong style="color:#67809f;" >Date of Completion:{{\Carbon\Carbon::parse($d->end_date)->toFormattedDateString()}}</strong >


                        </div >
                    </div >
                    <!-- END Portlet PORTLET-->
                </div >
            @endforeach

        </div >

    </div>
    </div >
    <!-- END CONTENT BODY -->

<!-- END CONTENT -->
<!-- BEGIN QUICK SIDEBAR -->
<a href="javascript:;" class="page-quick-sidebar-toggler" >
    <i class="icon-login" ></i >
</a >
<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->

<!-- END FOOTER -->
</div>
<!-- BEGIN QUICK NAV -->


@endsection
