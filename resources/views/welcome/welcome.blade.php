@extends('layouts.dashboard')

@section('content')

@section('bg'){{asset('images/about_banner.jpg')}}@endsection
	<div class="col-xs-12" style="background:white;">

		<div class="col-xs-12">
			<div class="col-md-8 col-md-offset-2" style="text-align: center;">
				<h2 style="color: #36c6d3; font-weight:bolder;font-size: 60px;"> Welcome!</h2>
   			     <p style="color: #97a1a1; font-weight:bold;font-size: 25px;">
					Thanks for creating hivephing account.Please like our facebook page,
				<div class="fb-like" data-href="https://www.facebook.com/businessnetwork.hivephing" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
					
				</p>
			</div>
		</div>

	</div><br><br>


@endsection