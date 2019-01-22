@extends('layouts.dashboard')

@section('content')
    @section('bg'){{asset('images/about_banner.jpg')}}@endsection
    @section('title')
	Profile Detail
    @endsection
<div class="col-xs-12" style="background-color:#ddedf2; padding: 30px;">
    <div class="col-xs-12" style="background-color:white; padding-bottom: 30px;">
        <!-- BEGIN CONTENT BODY -->
     
            <div class="col-xs-12" style="background-color: #8ca9d038;text-align: center;font-family: Century Gothic;font-size:30px;font-weight:bolder; color: #32c5d2; margin-bottom: 30px;margin-top: 30px;">
            	Your Profile
    		</div>

			@if(session('status'))
			<div class="col-xs-12">
				<div class="alert alert-success">
					{{session('status')}}
				</div>
			</div>
			@endif


			@if(session('success'))
			<div class="col-xs-12">
	    		<div class="alert alert-success">
	    			{{ session('success') }}
	    		</div>
	    	</div>
	    	@endif

            <div class="col-md-6 col-md-offset-3">
	            <form action="{{ url('entra/profile_detail/'.$data->id) }}" method="post">
	            	{{ csrf_field() }}
	            	
	            	<input type="hidden" name="id" value="{{ $data->id }}">

					<div class="form-group">
						<label class="input-title"> Name </label>
						<input class="form-control" type="text" name="name" value="{{$data->name}}">

						@if ($errors->has('name'))
                            <span class="help-block">
                                <strong style="color:red;">
                                    {{ $errors->first('name') }}
                                </strong>
                            </span>
                        @endif
					</div>

					<div class="form-group">
						<label class="input-title"> Email </label>
						<input class="form-control" type="text" name="email" value="{{$data->email}}" required="required">

						@if ($errors->has('email'))
                            <span class="help-block">
                                <strong style="color:red;">
                                    {{ $errors->first('email') }}
                                </strong>
                            </span>
                        @endif
					</div>

					<input type="submit" name="submit" value="Update" class="btn btn-lg green">

					<a href="#change" role="button" class="pull-right" data-toggle="modal">
						Change Password
					</a>
				</form>

        	</div>
        	</div>
    	<!-- END CONTENT BODY -->

	</div>

			<!-- Modal HTML -->
			<div id="change" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title">Change Password</h4>
			            </div>
			            <form method="post" action="{{ url('entra/changepassword/'.$data->id) }}">

			            	{{ csrf_field() }}

				            <div class="modal-body col-sm-6 col-sm-offset-3">

				            	@if(session('error'))
					            	<span class="help-block">
					            		<strong style="color: #f00;"> {{ session('error') }} </strong>
					            	</span>
				            	@endif

				            	<div class="form-group">
					                <label class="input-title"> Current Password </label>
					                <input type="password" class="form-control" name="current_password">

					                @if ($errors->has('current_password'))
			                            <span class="help-block">
			                                <strong style="color:red;">
			                                    {{ $errors->first('current_password') }}
			                                </strong>
			                            </span>
			                        @endif
					            </div>

				            	<div class="form-group">
					                <label class="input-title"> New Password </label>
					                <input type="password" class="form-control" name="password">

					                @if ($errors->has('password'))
			                            <span class="help-block">
			                                <strong style="color:red;">
			                                    {{ $errors->first('password') }}
			                                </strong>
			                            </span>
			                        @endif
					            </div>

					            <div class="form-group">
					                <label class="input-title"> Confirm Password </label>
					                <input type="password" class="form-control" name="password_confirm">

					                @if ($errors->has('password_confirm'))
			                            <span class="help-block">
			                                <strong style="color:red;">
			                                    {{ $errors->first('password_confirm') }}
			                                </strong>
			                            </span>
			                        @endif
					            </div>

				            </div>

				            <div class="clearfix"></div>

				            <div class="modal-footer">
				                <button type="submit" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				               	<button type="submit" class="btn green"> Save Changes </button>
				            </div>
			        	</form>
			        </div>
			    </div>
			</div>
            
</div>

@endsection
