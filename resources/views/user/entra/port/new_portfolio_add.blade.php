@extends('layouts.dashboard')

@section('content')
@section('title')
    Portfolio
@endsection
@section('bg'){{asset('images/about_banner.jpg')}}@endsection

<!-- BEGIN SIDEBAR -->

<!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->
<div class="col-xs-12" style="background-color:#ddedf2; padding: 30px;">
    <div class="col-xs-12" style="background-color:white; padding-bottom: 30px;">
        <!-- BEGIN CONTENT BODY -->
     <div class="col-xs-12" style="background-color: #8ca9d038;text-align: center;font-family: Century Gothic;font-size:30px;font-weight:bolder; color: grey; margin-bottom: 30px;margin-top: 30px;">
                Adding New Portfolio
            </div>


            <div class="col-md-6 col-md-offset-3">

	            <form action='{{url('entra/portfolio/add')}}' enctype="multipart/form-data" role="form" method="post">
            {{csrf_field()}}

	            	<input type="hidden" name="id" value="#">
					<div class="form-group">
						                        <div class="form-group {{ $errors->has('project_name') ? ' has-error' : '' }}">
                            <label class="input-title">Project's Name
                            </label>

                            <input type="text" class="form-control f" name="project_name"
                                   placeholder="Optional" value="{{old('project_name')}}">
                            @if ($errors->has('project_name'))
                                <span class="help-block">
                                                    <strong>{{ $errors->first('project_name') }}</strong>
                                                     </span>
                            @endif
					</div>

					<div class="form-group">
						<div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                            <label class="input-title">
                                Address
                            </label>

                            <input type="text" class="form-control f" name="address"
                                   placeholder="Optional" value="{{old('address')}}">
                            @if ($errors->has('address'))
                                <span class="help-block">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                     </span>
                            @endif
                        </div>
					</div>

					<div class="form-group">
						<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="input-title">
                                Description
                            </label>

                            <textarea class="form-control f" rows="3"
                                      name="description" required>{{old('description')}}</textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                     </span>
                            @endif
                        </div>
					</div>

					<div class="form-group">
						<div class="form-group {{ $errors->has('start_date') ? ' has-error' : '' }}">
                            <label class="input-title">
                                Start Date
                            </label>

                            <input type="date" class="form-control f" name="start_date"
                                   placeholder="Optional" value="{{old('start_date')}}">
                            @if ($errors->has('start_date'))
                                <span class="help-block">
                                                    <strong>{{ $errors->first('start_date') }}</strong>
                                                     </span>
                            @endif
                        </div>
					</div>

					<div class="form-group">
						<div class="form-group {{ $errors->has('end_date') ? ' has-error' : '' }}">
                            <label class="input-title">
                                Date of completion
                            </label>

                            <input type="date" class="form-control f" name="end_date"
                                   placeholder="Optional" value="{{old('end_date')}}">
                            @if ($errors->has('end_date'))
                                <span class="help-block">
                                                    <strong>{{ $errors->first('end_date') }}</strong>
                                                     </span>
                            @endif
                        </div>
					</div>

					<div class="form-group">
						                        <div class="form-group {{ $errors->has('photo') ? ' has-error' : '' }}">
                            <label class="input-title">
                                Photo
                            </label>

                            <input type="file" class="form-control f" name="photo"
                                   placeholder="Photo" value="{{old('photo')}}">
                            @if ($errors->has('photo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('photo') }}</strong>
                                </span>
                            @endif
                        </div>
					</div>

					<div class="form-group">
						<div class="form-group {{ $errors->has('photo1') ? ' has-error' : '' }}">
                            <label class="input-title">
                                Photo
                            </label>

                            <input type="file" class="form-control f" name="photo1"
                                   placeholder="Photo" value="{{old('photo1')}}">
                            @if ($errors->has('photo1'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('photo1') }}</strong>
                                </span>
                            @endif
                        </div>
					</div>

					<div class="form-group">
						<div class="form-group {{ $errors->has('photo2') ? ' has-error' : '' }}">
                            <label class="input-title">
                                Photo
                            </label>

                            <input type="file" class="form-control f" name="photo2"
                                   placeholder="Photo" value="{{old('photo2')}}">
                            @if ($errors->has('photo2'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('photo2') }}</strong>
                                </span>
                            @endif
                        </div>
					</div>

					<button type="submit" class="btn btn-lg green pull-right f" style="float:right;">Add
                    </button>
				</form>
				<div class="row">&nbsp;</div>
     <div class="row">&nbsp;</div>
     <div class="row">&nbsp;</div>
        	</div>

			<!-- Modal HTML -->
			
            	</div>
    	<!-- END CONTENT BODY -->

	</div>
    </div>

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
