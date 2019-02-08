@extends('layout.master')

@section('title','Admin Dashboard')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $.get("demo_test.php", function(data, status){
      alert("Data: " + data + "\nStatus: " + status);
    });
  });
});
</script>

    <div class="row">
        <!-- Boxes de Acoes -->
       @if(auth()->guard('admin')->user()->role=='admin')
        <div class="col-xs-12 col-sm-6 col-lg-4">
            <div class="box">
                <div class="icon">
                    <div class="image"><i class="fa fa-user"></i></div>
                    <div class="info">
                        <h3 class="title">User</h3>
                        <div id="shiva"><span class="count">{{count($users)}}</span></div>
                        <div class="more">

                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-4">
            <div class="box">
                <div class="icon">
                    <div class="image"><i class="fa fa-user"></i></div>
                    <div class="info">
                        <h3 class="title">Tenders</h3>
                        <div id="shiva"><span class="count">{{count($tender)}}</span></div>
                        <div class="more">

                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-4">
        <div class="box">
            <div class="icon">
                <div class="image"><i class="fa fa-rss"></i></div>
                <div class="info">
                    <h3 class="title">News</h3>

                    <a href="{{url('news')}}">
                        <div id="shiva"><span class="count">{{count($news)}}</span></div>
                    </a>

                    <div class="more">

                    </div>
                </div>
            </div>

            <div class="space">


            </div>
        </div>
    </div>
        <div class="col-xs-12 col-sm-6 col-lg-4">

        <div class="box">
            <div class="icon">
                <div class="image"><i class="fa fa-user"></i></div>
                <div class="info">
                    <h3 class="title">Events</h3>
                    <div id="shiva"><span class="count">{{count($events)}}</span></div>
                    <div class="more">

                    </div>
                </div>
            </div>
            <div class="space"></div>
        </div>
    </div>
       @endif
        <div class="col-xs-12 col-sm-6 col-lg-4">
            <div class="box">
                <div class="icon">
                    <div class="image"><i class="fa fa-user"></i></div>
                    <div class="info">
                        <h3 class="title">Require services<br>( pending )</h3>
                        @php
                        $count_pending=DB::table('relation_user_post_and_op')->where('op_id',auth()->guard('admin')->user()->id)->count();

                        @endphp

                        <div id="shiva"><span class="count"> {{$count_pending}}</span></div>
                        <div class="more">

                        </div>
                    </div>
                </div>
                <div class="space"><button>Send an HTTP GET request to a page and get the result back</button></div>
            </div>
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
