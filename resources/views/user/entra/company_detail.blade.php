<!-- * Ki's artwork  -->
<!-- END HEAD -->
@extends('layouts.dashboard')

@section('content')

<!-- BEGIN : LOGIN PAGE 5-1 -->
@section('title')
    Your Dashboard
@endsection
@section('bg'){{asset('images/about_banner.jpg')}}@endsection
<style>
  @import url(https://fonts.googleapis.com/css?family=Roboto:900,300);
body {
  background-color: #f0f0f0;
  font-family: roboto;
}
.container {
  width: 520px;
  margin: 150px auto 120px;
  background-color: #e6ecf5;
  padding: 0 20px 20px;
  border-radius: 6px !important;
  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.075) !important;
  -webkit-box-shadow: 0 2px 5px rgba(0,0,0,0.075) !important;
  -moz-box-shadow: 0 2px 5px rgba(0,0,0,0.075)!important;
  text-align: center;
}
.avatar-flip {
  border-radius: 100px !important;
  overflow: hidden;
  height: 150px;
  width: 150px;
  position: relative;
  margin: auto;
  top: -60px;
  transition: all 0.3s ease-in-out !important;
  -webkit-transition: all 0.3s ease-in-out !important;
  -moz-transition: all 0.3s ease-in-out !important;
  box-shadow: 0 0 0 10px #f0f0f0 !important;
  -webkit-box-shadow: 0 0 0 5px #5e6a6f61 !important;
  -moz-box-shadow: 0 0 0 13px #f0f0f0 !important;
}
.avatar-flip img {
  position: absolute;
  left: 0;
  top: 0;
  border-radius: 100px !important;
  transition: all 0.3s ease-in-out;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
}
h2 {
  font-size: 32px;
  font-weight: 600;
  margin-bottom: 15px;
  color:#5e6a6f/*#333*/;
}
h4 {
  font-size: 17px;
  font-style: italic;
  font-family: Times new roman;
  color: #5e6a6f /*#00baff*/;
  letter-spacing: 1px;
  margin-bottom: 25px
}
.caption {
  font-size: 18px;
  font-weight: bold;
  color: #2e4c2b/*#00baff*/;
  letter-spacing: 1px;
  margin-bottom: 25px
}
p {
  font-size: 16px;
  font-weight: bold;
  line-height: 26px;
  margin-bottom: 20px;
  color: #666;
}

</style>

<div class="col-xs-12" style="background-color:#ddedf2; padding: 30px;">
    <div class="col-xs-12" style="background-color:white; padding-bottom: 30px;">
       <div class="theme-panel hidden-xs hidden-sm"></div>
        @include('user.entra.alert.alert')
       <div class="col-xs-12" style="background-color: #8ca9d038;text-align: center;font-family: Century Gothic;font-size:30px;font-weight:bolder; margin-bottom: 90px;margin-top: 30px;">
            Your Company's Profile
       </div>
          <!-- profile -->
          <body>
            <div class="container">
                <div class="avatar-flip">
                    <img src="{{asset('users/entro/photo/'.$d->logo)}}" height="150" width="150">
                    </a>
                </div>

                <h2>{{$d->name}}</h2>
                <h4>"... {{$d->description}} ..."</h4>
               
                    @if($d->ceo_name != '' or $d->ceo_email != '' or $d->ceo_detail)
                     <p>
                        <i class="fa fa-bookmark"  style="font-size:20px; color: #2e4c2b;"></i>
                        <span class = "caption">CEO Detail</span>
                        @if($d->ceo_name != '')
                        <br>
                        <i class="fa fa-user"></i>&nbsp;{{$d->ceo_name}}
                        @endif
                        @if($d->ceo_email != '')
                        <br>
                        <i class="fa fa-envelope"></i>&nbsp; {{$d->ceo_email}}
                        @endif
                        @if($d->ceo_phone != '')
                        <br>
                        <i class="fa fa-phone"></i>&nbsp; {{$d->ceo_phone}}
                        @endif
                      </p>
                    @endif
               
                    <p>
                        <i class='fa fa-briefcase' style='font-size:20px; color: #2e4c2b;'></i>
                        <span class = "caption">General Facts of Company</span>
                            <br>
                            Looking for investment :
                            @if ($d->investment == '0')
                                <i class="fa fa-close" style="color:darkred;"></i>
                            @else
                                <i class="fa fa-check" style="color:#5e6a6f;"></i>
                            @endif
                            <br>
                            Registration Status :
                            @if ($d->registration_status == '0')
                                <i class="fa fa-close" style="color:darkred;"></i>
                            @else
                                <i class="fa fa-check" style="color:#5e6a6f;"></i>
                            @endif
                            <br>
                            City :
                                @php
                                    $city=DB::table('cities')->where('id',$d->city_id)->first();
                                @endphp
                            {{$city->name}}
                            <br>
                            Country :
                                @php
                                    $country=DB::table('countries')->where('id',$d->country_id)->first();
                                @endphp
                            {{$country->name}}
                            <br>
                            Business type :
                                @php
                                    $city=DB::table('business_hub')->where('id',$d->business_hub)->first();
                                @endphp
                            {{$city->description}}

                            @if($d->website != '')
                                <br>
                                Website Link :
                                @if(preg_match('/http/',$d->website))
                                    <?php $weblink=$d->website;?>
                                @else
                                    <?php $weblink="http://".$d->website;?>

                                @endif
                                    <a href="{{$weblink}}">{{$d->website}}
                                    <span class="fa fa-arrow-right"></span></a></span>
                                @endif

                            @if($d->facebook != '')
                            <br>
                                Facebook Link :
                                @if(preg_match('/http/',$d->facebook))
                                    <?php $facebook=$d->facebook;?>
                                @else
                                    <?php $facebook="http://".$d->facebook;?>

                                @endif
                                    <a href="{{$facebook}}">{{$d->facebook}}
                                        <span class="fa fa-arrow-right"></span></a></span>
                                @endif
                            @if($d->year_esta != '')
                                <br>
                                Year established :
                                {{$d->year_esta}}
                            @endif    
                    </p>
                    <p>
                        <i class="fa fa-star" style="font-size:20px; color: #2e4c2b;"></i>
                        <span class = "caption">Contact Info</span>
                        <br>
                        <i class="fa fa-user"></i>&nbsp;{{$d->name}}
                        <br>
                        <i class="fa fa-envelope"></i>&nbsp;{{$d->email}}
                        <br>
                        <i class="fa fa-phone"></i>&nbsp;{{$d->phone}}
                        <br>
                         <i class="fa fa-map-marker"></i>&nbsp;{{$d->address}}
                    </p>
                    <p style="margin-bottom: 0px !important;">
                        <a href="{{ url('/company_detail/'.$d->id.'/rating') }}" class="btn green-seagreen pull-right" style="margin-top: 20px;">
                            Rating Point :
                            @if($rate == null)
                                0
                            @elseif($rate >= 1000)
                                {{ $rate/1000 }} k
                            @else
                                {{ $rate }}
                            @endif
                        </a>
                        <br>
                        <br>
                        <br>
                        @if(Auth::user()->type == 1 or Auth::user()->type == 2)
                            @if(Auth::user()->id == $d->user_id)
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button type="button" onclick="goss({{$d->id}})" class="btn btn-lg btn-danger pull-right">Edit Company's facts</button>
                                    </div>
                                </div>
                                <script>
                                    function goss(id) {
                                        window.location.assign('{{url('company_edit_form/'.$d->id)}}');
                                    }
                                </script>
                            @endif
                        @endif
                    </p>
            </div>
           </body>
          <!-- end of profile -->
       </div>
    </div>
@endsection

