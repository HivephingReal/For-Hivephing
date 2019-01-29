<?php
echo header("Cache-Control:no-store,no-cache,must-revalidate,max-age=0");header("Cache-Control:post-check=0,pre-check=0", false);header("Pragma:no-cache");header('Content-Type:text/html');

?>
@extends('layouts.dashboard')
@section('content')
@section('title')
    Edit Your Company
@endsection
@section('bg'){{asset('images/about_banner.jpg')}}@endsection
<!-- BEGIN : LOGIN PAGE 5-1 -->

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
    <div class="col-xs-12" style="background-color:white;">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN THEME PANEL -->
        <div class="theme-panel hidden-xs hidden-sm">

        </div>
        <!-- END THEME PANEL -->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">

            <div class="page-toolbar">
            </div>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <div class="col-xs-12" style="background-color: #8ca9d038;text-align: center;font-family: Century Gothic;font-size:30px;font-weight:bolder; margin-bottom: 30px;margin-top: 30px;">Company Profile Edition
        </div>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase">Please edit your company perfectly.</span>
                        </div>
                    </div>
                    @if(\Illuminate\Support\Facades\Session::has('success'))
                        <div class="note note-success">
                            <h4 class="block">Successful</h4>

                            <p> Your company was
                                successfully {{\Illuminate\Support\Facades\Session::get('success')}}
                            </p>
                        </div>
                    @endif
                    <div class="portlet-body form">
                        <form action='{{url('company_edit')}}' enctype="multipart/form-data" role="form"
                              method="post">
                            {{csrf_field()}}
                            @foreach($data as $d)
                                <div class="row">
                                    <div class="form-body">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label>Email Address</label>
                                                <input type="text" class="form-control f" name="email"
                                                       placeholder="Email Address" value="{{$d->email}}">
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                     </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label>Company Name</label>
                                                <input type="text" class="form-control f" name="name"
                                                       placeholder="Company Name" value="{{$d->name}}">
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                     </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-body">
                                        <div class="col-md-6">

                                            <div class="form-group  {{ $errors->has('phone') ? ' has-error' : '' }}">
                                                <label>Phone No.</label>

                                                <input type="number" class="form-control f" name="phone"
                                                       placeholder="Phone No." value="{{$d->phone}}">
                                                @if ($errors->has('phone'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                     </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group {{ $errors->has('website') ? ' has-error' : '' }}">
                                                <label>Website Link</label>

                                                <input type="text" class="form-control f" name="website"
                                                       placeholder="optional" value="{{$d->website}}">
                                                @if ($errors->has('website'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('website') }}</strong>
                                                     </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-body">
                                        <div class="col-md-6">

                                            <div class="form-group {{ $errors->has('facebook') ? ' has-error' : '' }}">
                                                <label>Facebook Link</label>

                                                <input type="text" class="form-control f" name="facebook"
                                                       placeholder="optional" value="{{$d->facebook}}">
                                                @if ($errors->has('facebook'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('facebook') }}</strong>
                                                     </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('ceo_name') ? ' has-error' : '' }}">
                                                <label>Name of Ceo</label>

                                                <input type="text" class="form-control f" name="ceo_name"
                                                       placeholder="Name of Ceo" value="{{$d->ceo_name}}">
                                                @if ($errors->has('ceo_name'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('ceo_name') }}</strong>
                                                     </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-body">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('ceo_phone') ? ' has-error' : '' }}">
                                                <label>Phone No. of Ceo</label>

                                                <input type="number" class="form-control f" name="ceo_phone"
                                                       placeholder="Phone No. of Ceo" value="{{$d->ceo_phone}}">
                                                @if ($errors->has('ceo_phone'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('ceo_phone') }}</strong>
                                                     </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('ceo_email') ? ' has-error' : '' }}">
                                                <label>Email of Ceo</label>

                                                <input type="email" class="form-control f" name="ceo_email"
                                                       placeholder="Email of Ceo" value="{{$d->ceo_email}}">
                                                @if ($errors->has('ceo_email'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('ceo_email') }}</strong>
                                                     </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-body">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('business_hub') ? ' has-error' : '' }}">
                                                <label>Business's Hub</label>
                                                <select class="form-control f select2me" name="business_hub">
                                                    <?php
                                                    $bh = \Illuminate\Support\Facades\DB::table('business_hub')->orderBy('description','asc')->get();
                                                    ?>
                                                    @php
                                                        $wb=\Illuminate\Support\Facades\DB::table('business_hub')->where([['id','=',$d->business_hub]])->first();
                                                    @endphp
                                                    <option value="{{$wb->id}}">{{$wb->description}}</option>
                                                    @foreach ($bh as $b)
                                                        <option value="{{$b->id}}"
                                                                style="word-wrap:break-word">{{str_limit($b->description,'50')}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('business_hub'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('business_hub') }}</strong>
                                                     </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group {{ $errors->has('country_id') ? ' has-error' : '' }}">
                                                <label class="input-title">Country?
                                                </label>


                                                <select class="form-control f" id="country" name="country_id" required>
                                                    @php
                                                        $selected_country=DB::table('countries')->where('id',$d->country_id)->first();
                                                    @endphp
                                                    <option value="{{$selected_country->id}}" style="word-wrap:break-word" selected>{{$selected_country->name}}</option>
                                                    <?php
                                                    $bcc = \Illuminate\Support\Facades\DB::table('countries')->get();
                                                    ?>
                                                    @foreach ($bcc as $bc)
                                                        <option value="{{$bc->id}}">{{$bc->name}}</option>

                                                    @endforeach
                                                </select>

                                                @if ($errors->has('country_id'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('country_id') }}</strong>
                                                     </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-body">
                                        <div class="col-md-6">

                                            <div class="form-group {{ $errors->has('city_id') ? ' has-error' : '' }}">
                                                <label class="input-title">City/State?
                                                </label>


                                                <select class="form-control f" name="city_id" required>


                                                    @php
                                                        $selected_city=DB::table('cities')->where('id',$d->city_id)->first();
                                                    @endphp
                                                    <option value="{{$selected_city->id}}"
                                                            style="word-wrap:break-word" selected>{{$selected_city->name}}</option>
                                                    <?php

                                                    $cities = DB::table('cities')->whereBetween('state_id', ['2537','2551'])->orderBy('name','asc')->get();
                                                    ?>

                                                    @foreach ($cities as $bc)

                                                        <option value="{{$bc->id}}">{{$bc->name}}</option>

                                                    @endforeach


                                                </select>

                                                @if ($errors->has('city_id'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('city_id') }}</strong>
                                                         </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Invesment </label>
                                                <select name="investment" class="form-control f" required>
                                                    <option value="{{$d->investment}}" selected>
                                                        @if($d->investment == '1')
                                                            Yes
                                                        @else
                                                            No
                                                        @endif
                                                    </option>

                                                    <option value="1" selected>Yes</option>
                                                    <option value="0">No</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-body">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>Registration Status </label>
                                                <select name="registration_status" class="form-control f">
                                                    <option value="{{$d->registration_status}}" selected>
                                                        @if($d->registration_status == '1')
                                                            Yes
                                                        @else
                                                            No
                                                        @endif
                                                    </option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">NO</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                                <label>Year</label>
                                                <input type='number' class="form-control f" name="year_esta"
                                                       value="{{$d->year_esta}}"/>
                                                @if ($errors->has('year_esta'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('year_esta') }}</strong>
                                                     </span>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-body">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                                <label>Description</label> <textarea class="form-control f" rows="3"
                                                                                     name="description">{!! $d->description !!}</textarea>
                                                @if ($errors->has('description'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                     </span>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                                <label>Address</label>
                                                <textarea class="form-control f" name="address" rows="3"
                                                          name="address">{{ $d->address }}</textarea>
                                                @if ($errors->has('address'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                     </span>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-body">

                                        <div class="col-md-6">

                                            <div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}">
                                                <label for="exampleInputFile1">Logo</label>
                                                <input type="file" name='logo' id="exampleInputFile1">
                                                @if ($errors->has('logo'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('logo') }}</strong>
                                                     </span>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="col-md-6">

                                            <input type="hidden" name="id" value="{{$d->id}}"/>

                                            <div class="form-actions">
                                                <button type="submit" class="btn blue">Submit</button>
                                                <button type="button" class="btn default">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </form>
                        <!-- END SAMPLE FORM PORTLET-->
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <!-- END SAMPLE FORM PORTLET-->
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <!-- END SAMPLE FORM PORTLET-->
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <a href="javascript:;" class="page-quick-sidebar-toggler"> <i class="icon-login"></i> </a>
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <!-- END FOOTER -->
    </div>

    </div>
</div>

@endsection