@extends('layout.master')
@section('title','History')
@section('content')

<div class = "container">
	<h1>History</h1>
	<hr>
    <?php
    use Carbon\Carbon;
    $now = Carbon::now();
    ?>
	<a href = "{{url('monthly_registered_companies/'.$now)}}">
	 	<div class="col-xs-12 col-sm-6 col-lg-4">
            <div class="box">
                <div class="icon">
                    <div class="image" style = "background-color: #35c537;"><i class="fa fa-user"></i></div>
                    <div class="info">
                        <h3 class="title">Company Registeration by Months</h3>
                        <div id="shiva"><span class="count">{{count($company)}}</span></div>
                        <div class="more">
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div>
        </div>
    </a>

    <a href = "{{ url('companies') }}">
        <div class="col-xs-12 col-sm-6 col-lg-4">
            <div class="box">
                <div class="icon">
                    <div class="image" style = "background-color: #35c537;"><i class="fa fa-user"></i></div>
                    <div class="info">
                        <h3 class="title">Company Buy Points by Months</h3>
                        <div id="shiva"><span class="count">{{count($company_with_plan)}}</span></div>
                        <div class="more">
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div>
        </div>
    </a>

    <a href = "{{ url('companies') }}">
        <div class="col-xs-12 col-sm-6 col-lg-4">
            <div class="box">
                <div class="icon">
                    <div class="image" style = "background-color: #35c537;"><i class="fa fa-user"></i></div>
                    <div class="info">
                        <h3 class="title">Companies with Plan</h3>
                        <div id="shiva"><span class="count">{{count($company_with_plan)}}</span></div>
                        <div class="more">
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div>
        </div>
    </a>
</div>

@endsection

@section('myscript')

    $('.count').each(function () {
    $(this).prop('Counter',0).animate({
    Counter: $(this).text()
    }, {
    duration: 4000,
    easing: 'swing',
    step: function (now) {
    $(this).text(Math.ceil(now));
    }
    });
    });

@endsection