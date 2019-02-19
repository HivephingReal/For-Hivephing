<?php
echo header("Cache-Control:no-store,no-cache,must-revalidate,max-age=0");header("Cache-Control:post-check=0,pre-check=0", false);header("Pragma:no-cache");header('Content-Type:text/html');

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
    <title>User Login </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Preview page of Metronic Admin Theme #1 for " name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('fontawesome/css/fontawesome-all.min.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset('global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset('global/css/components.min.css')}}" rel="stylesheet" id="style_compoents" type="text/css"/>
    <link href="{{asset('global/css/plugins.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{asset('pages/css/login-5.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL STYLES -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800,300" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,700" rel="stylesheet"/>
    <!-- Animate.css -->
    <link rel="stylesheet" href="{{asset('css/slider/animate.css')}}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{asset('css/slider/icomoon.css')}}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{asset('css/slider/bootstrap.css')}}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{asset('css/slider/magnific-popup.css')}}">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="{{asset('css/slider/flexslider.css')}}">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('css/slider/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/slider/owl.theme.default.min.css')}}">

    <!-- Flaticons  -->
    <link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{asset('css/slider/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/yankee_custom.css')}}">
    <!-- BEGIN THEME LAYOUT STYLES -->

    <!-- END THEME LAYOUT STYLES -->
</head>
<!-- END HEAD -->


<!-- END HEAD -->

<body>
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
<div class="col-xs-12 top_banner">
    <div class="top_header">
        <div class="col-xs-4  col-sm-4 col-md-2" style="">
            <img src="{{asset('images/logo/logo.png')}}" class="logo" style="width:112px;height:63px;float:right;"/>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 logo_lyric" style="">HivePhing</div>
        <div class="col-xs-12 col-sm-12 col-md-2" style="margin-top:20px;">
            <a href="{{url('about_us')}}" class="about_us" style="">About Us</a>&nbsp;
            <span href="#" style="" class="phone_top">09773777445</span>
        </div>
    </div>
</div>
</div>
{{--slider--}}
        <div id="page" style="top:0px;">
            <aside id="colorlib-hero">
                <div class="flexslider">
                    <ul class="slides">
                        <li style="background-image: url({{asset('css/images/img_bg_4.jpg')}});">
                            <div class="overlay"></div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12 col-md-offset-2 slider-text">
                                        <div class="slider-text-inner text-center">
                                            <h1>Our Obsession Is Distinctive interiors</h1>
                                            <h2>Providing all Kinds of Construction Services</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li style="background-image: url({{asset('css/images/img_bg_2.jpg')}});">
                            <div class="overlay"></div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12 col-md-offset-2 slider-text">
                                        <div class="slider-text-inner text-center">
                                            <h1>High Quality Materials In All Solutions</h1>
                                            <h2>Get your material</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li style="background-image: url({{asset('css/images/img_bg_3.jpg')}});">
                            <div class="overlay"></div>
                            <div class="container-fluids">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12 col-md-offset-2 slider-text">
                                        <div class="slider-text-inner text-center">
                                            <h1>We Build Buildings Professionally</h1>
                                            <h2>We Design All Kinds of Buildings</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li style="background-image: url('http://www.hivephing.com/companies/public/images/banner.jpg');">
                            <div class="overlay"></div>
                            <div class="container-fluids">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12 col-md-offset-2 slider-text">
                                        <div class="slider-text-inner text-center">
                                            <h1>We Build Your Futures</h1>
                                            <h2>We Design All Kinds of Buildings</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
{{--end slider--}}
{{--login form--}}

<div class="for_pad_login" style="">
    {{--beside lyrics--}}
    <div class="col-xs-12 col-sm-12 col-md-6" style="">
        <div class="row login_lyrics" style="">
            Search and connect to grow <br>your bussiness every day
        </div>
        <div class="row login_lyrics_two" style="">Hivephing is easy to
            use cloud based B2B (Business to Business) used by business every hub to increase sales and
            ultimately
            grow
        </div>
    </div>
    {{--end beside lyrics--}}
    <div class="col-xs-12 col-sm-12 col-md-6 login_parent">
        <div class="login_box" style="">
            <div class="login_box_title" style="color:white;font-weight:bold;">Welcome from <span
                        style="color:#fab700;">HivePhing</span></div>
            <br>
            <br>
            <form action="{{ url('/login') }}" method="post">
                <input type="text" class="form_yk" name="email" style="" placeholder="Email"/>
                @if ($errors->has('email'))
                    <span style="margin-left: 12px;margin-right:12px;">
                <strong style="color:red;">
                {{ $errors->first('email') }}
                </strong>
                </span>
                @endif
                <br>
                <br>

                <input type="password" class="form_yk" style="" name="password" placeholder="Password"/>
                @if ($errors->has('password'))
                    <span>
                      <strong style="color:red;">
                     {{ $errors->first('password') }}
                      </strong>
                </span>
                @endif
                <br>
                <br>

                <div style="margin-right:12px;">
                    <button class="btn btn-md btn-success btn_custom" type="submit" style="float:right;">Login</button>
                </div>
                <br>
                <div style="margin-left:11px;color:#3e3d3d;margin-top:42px;">
                    Don't have an account ?
                    <button class="btn btn-md btn-info" type="button" onclick="go_reg('{{url('register')}}')">
                        Register
                        Here
                    </button>


                </div>
                <br>
            </form>
        </div>
    </div>

</div>
{{--login form--}}



<div class="col-md-12" style="background-color: white; padding-top: 100px; padding-bottom: 100px;"><!-- #eae9e9b0 --> 
{{--start of "our project"--}}
<div class="col-md-4">
        
            <h4 class="login_lyrics" style="margin-left:0px;margin-top:0px;">Our Projects</h4>
            <ul class="for_js">
                <li style="margin-bottom:6px;"><i>
                        <a onclick="show_ds(cname='1')" class="pcat">Construction</a>
                        {{--<button class="badge badge-success btd-custom">--}}
                        <?php
                        $con = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed'], ['close', '=', 0]])->whereIn('fr_type', ['rb1', 'b1', 'b2', 'b3'])->get();
                        $con_count = 0;
                        ?>
                        @foreach($con as $conidd )
                          @if($conidd->delete != 1)
                            <?php
                            $limit_q = DB::table('user_saw_this_plan')->where('project_id', $conidd->id)->count();
                            ?>
                            @if($limit_q >= $conidd->quotation  )
                                @continue;
                            @else
                                <?php $con_count += 1;?>
                            @endif
                          @endif
                        @endforeach
                        {{--{{$con_count}}--}}
                    
                        {{--</button>--}}
                        <span class="fa fa-arrow-right" style="color:#fab700;" onclick="show_ds(cname='1')"></span>
                    </i></li>
                <li style="margin-bottom:6px;"><i><a onclick="show_ds(cname='2')" class="pcat">Electricity(M&E)</a></i>
                    {{--<button onclick="show_ds(cname='2')" class="badge badge-success  btd-custom">--}}
                    <?php
                    $e = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed'], ['close', '=', 0]])->whereIn('fr_type', ['fr3', 'rb3'])->get();
                    $e_count = 0;
                    ?>
                    @foreach($e as $eidd )
                      @if($eidd->delete != 1)
                        <?php
                        $limit_q = DB::table('user_saw_this_plan')->where('project_id', $eidd->id)->count();
                        ?>
                        @if($limit_q >= $eidd->quotation  )
                            @continue;
                        @else
                            <?php $e_count += 1;?>
                        @endif
                      @endif
                    @endforeach
                    {{--{{$e_count}}--}}
                    {{--</button>--}}
                    <span class="fa fa-arrow-right" style="color:#fab700;" onclick="show_ds(cname='1')"></span>

                </li>
                <li style="margin-bottom:6px;"><a onclick="show_ds(cname='3')" class="pcat">Water and pipe(M&E)</a>
                    {{--<button onclick="show_ds(cname='3')" class="badge badge-success  btd-custom">--}}
                    <?php
                    $wp = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed'], ['close', '=', 0]])->whereIn('fr_type', ['fr1', 'rb2'])->get();
                    $wp_count = 0;
                    ?>
                    @foreach($wp as $wpidd )
                     @if($wpidd->delete != 1)
                        <?php
                        $limit_q = DB::table('user_saw_this_plan')->where('project_id', $wpidd->id)->count();
                        ?>
                        @if($limit_q >= $wpidd->quotation  )
                            @continue;
                        @else
                            <?php $wp_count += 1;?>
                        @endif
                     @endif
                    @endforeach
                    {{--{{$wp_count}}--}}
                    {{--</button>--}}
                    <span class="fa fa-arrow-right" style="color:#fab700;" onclick="show_ds(cname='1')"></span>

                </li>
                <li style="margin-bottom:6px;">
                    <a onclick="show_ds(cname='4')" class="pcat">
                        Prague and Floor
                    </a>
                    {{--<button onclick="show_ds(cname='4')" class="badge badge-success  btd-custom">--}}
                    <?php
                    $pf = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed'], ['close', '=', 0]])->whereIn('fr_type', ['fr7', 'fr7'])->get();
                    $pf_count = 0;?>
                    @foreach( $pf as  $pfidd )
                      @if($pfidd->delete != 1)
                        <?php
                        $limit_q = DB::table('user_saw_this_plan')->where('project_id', $pfidd->id)->count();
                        ?>
                        @if($limit_q >= $pfidd->quotation  )
                            @continue;
                        @else
                            <?php $pf_count += 1;?>
                        @endif
                      @endif
                    @endforeach
                    {{--{{$pf_count}}--}}
                    {{--</button>--}}
                    <span class="fa fa-arrow-right" style="color:#fab700;" onclick="show_ds(cname='1')"></span>

                </li>
                <li style="margin-bottom:6px;"><a onclick="show_ds(cname='5')" class="pcat">
                        Aluminum
                    </a>
                    {{--<button onclick="show_ds(cname='5')" class="badge badge-success  btd-custom">--}}
                    <?php
                    $al = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed'], ['close', '=', 0]])->whereIn('fr_type', ['fr5', 'fr5'])->get();
                    $al_count = 0;
                    ?>
                    @foreach( $al as  $alidd )
                     @if($alidd->delete != 1)
                        <?php
                        $limit_q = DB::table('user_saw_this_plan')->where('project_id', $alidd->id)->count();
                        ?>
                        @if($limit_q >= $alidd->quotation  )
                            @continue;
                        @else
                            <?php $al_count += 1;?>
                        @endif
                      @endif
                    @endforeach
                    {{--{{$al_count}}--}}
                    {{--</button>--}}
                    <span class="fa fa-arrow-right" style="color:#fab700;" onclick="show_ds(cname='1')"></span>

                </li>
                <li style="margin-bottom:6px;">
                    <a onclick="show_ds(cname='6')" class="pcat">
                        CCTV
                    </a>
                    {{--<button onclick="show_ds(cname='6')" class="badge badge-success  btd-custom">--}}
                    <?php
                    $cc = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed'], ['close', '=', 0]])->whereIn('fr_type', ['fr8', 'rb5'])->get();
                    $cc_count = 0;
                    ?>
                    @foreach($cc as $ccidd )
                      @if($ccidd->delete != 1)
                        <?php
                        $limit_q = DB::table('user_saw_this_plan')->where('project_id', $ccidd->id)->count();
                        ?>
                        @if($limit_q >= $ccidd->quotation  )
                            @continue;
                        @else
                            <?php $cc_count += 1;?>
                        @endif
                      @endif
                    @endforeach
                    {{--{{$cc_count}}--}}
                    {{--</button>--}}
                    <span class="fa fa-arrow-right" style="color:#fab700;" onclick="show_ds(cname='1')"></span>

                </li>
                <li style="margin-bottom:6px;">
                    <a onclick="show_ds(cname='7')" class="pcat">
                        Interior Design and Decoration
                    </a>
                    {{--<button onclick="show_ds(cname='7')" class="badge badge-success  btd-custom">--}}
                    <?php
                    $id = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed'], ['close', '=', 0]])->whereIn('fr_type', ['fn1', 'fn2', 'fn3', 'fn4'])->get();
                    $id_count = 0;
                    ?>
                    @foreach($id as $idd )
                      @if($idd->delete != 1)
                        <?php
                        $limit_q = DB::table('user_saw_this_plan')->where('project_id', $idd->id)->count();
                        ?>
                        @if($limit_q >= $idd->quotation  )
                            @continue;
                        @else
                            <?php $id_count += 1;?>
                        @endif
                      @endif
                    @endforeach
                    {{--{{$id_count}}--}}
                    {{--</button>--}}
                    <span class="fa fa-arrow-right" style="color:#fab700;" onclick="show_ds(cname='1')"></span>

                </li>
                <li style="margin-bottom:6px;">
                    <a onclick="show_ds(cname='8')" class="pcat">
                        Painting
                    </a>
                    {{--<button onclick="show_ds(cname='8')" class="badge badge-success  btd-custom">--}}
                    <?php
                    $p = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed'], ['close', '=', 0]])->whereIn('fr_type', ['rb1', 'b1', 'b2', 'b3'])->get();
                    $p_count = 0;?>

                    @foreach($p as $pdd )
                     @if($pdd->delete != 1)
                        <?php
                        $limit_q = DB::table('user_saw_this_plan')->where('project_id', $pdd->id)->count();
                        ?>
                        @if($limit_q >= $pdd->quotation  )
                            @continue;
                        @else
                            <?php $p_count += 1;?>
                        @endif
                     @endif
                    @endforeach
                    {{--{{$p_count}}--}}
                    {{--</button>--}}
                </li>
                <li style="margin-bottom:6px;">
                    <a onclick="show_ds(cname='9')" class="pcat">
                        Air-con
                    </a>
                    {{--<button onclick="show_ds(cname='9')" class="badge badge-success  btd-custom">--}}
                    <?php
                    $ai = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed'], ['close', '=', 0]])->whereIn('fr_type', ['fr4', 'rb4'])->get();
                    $ai_count = 0;
                    ?>
                    @foreach($ai as $aidd )
                     @if($aidd->delete != 1)
                        <?php
                        $limit_q = DB::table('user_saw_this_plan')->where('project_id', $aidd->id)->count();
                        ?>
                        @if($limit_q >= $aidd->quotation  )
                            @continue;
                        @else
                            <?php $ai_count += 1;?>
                        @endif
                     @endif
                    @endforeach
                    {{--{{$ai_count}}--}}
                    {{--</button>--}}
                    <span class="fa fa-arrow-right" style="color:#fab700;" onclick="show_ds(cname='1')"></span>

                </li>
                <li style="margin-bottom:6px;">
                    <a onclick="show_ds(cname='10')" class="pcat">
                        Security Solution Provider
                    </a>
                    {{--<button onclick="show_ds(cname='10')" class="badge badge-success  btd-custom">--}}
                    <?php
                    $sss = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed'], ['close', '=', 0]])->whereIn('fr_type', ['fr8', 'rb5'])->get();
                    $sss_count = 0;
                    ?>
                    @foreach($sss as $sssidd )
                       @if($sssidd->delete != 1)
                        <?php
                        $limit_q = DB::table('user_saw_this_plan')->where('project_id', $sssidd->id)->count();
                        ?>
                        @if($limit_q >= $sssidd->quotation  )
                            @continue;
                        @else
                            <?php $sss_count += 1;?>
                        @endif
                      @endif
                    @endforeach
                    {{--{{$sss_count}}--}}
                    {{--</button>--}}
                    <span class="fa fa-arrow-right" style="color:#fab700;" onclick="show_ds(cname='1')"></span>

                </li>
                <li style="margin-bottom:6px;">
                    <a onclick="show_ds(cname='11')" class="pcat">
                        Expired Projects
                    </a>
                    {{--<button onclick="show_ds(cname='11')" class="badge badge-success  btd-custom">--}}
                    <?php
                    $esss = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed'], ['close', '=', 1]])->get();
                    $esss_count = 0;
                    ?>
                    @foreach($esss as $esssidd )
                       @if($esssidd->delete != 1)
                        <?php
                        $limit_q = DB::table('user_saw_this_plan')->where('project_id', $esssidd->id)->count();
                        ?>
                        @if($limit_q < $esssidd->quotation  )
                            @continue;
                        @else
                            <?php $esss_count += 1;?>
                        @endif
                      @endif
                    @endforeach
                    {{--{{$esss_count}}--}}
                    {{--</button>--}}
                    <span class="fa fa-arrow-right" style="color:#fab700;" onclick="show_ds(cname='1')"></span>

                </li>

            </ul>

        
</div>
<!-- end of "our project" -->
        <div class="col-md-8" style="">
        
            <div class="latest" style="overflow-y: auto;height:452px;padding:12px;">

                <ol id="show1" style="display:block;">
                    <?php

                    $data = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed'], ['close', '=', 0]])->whereIn('fr_type', ['rb1', 'b1', 'b2', 'b3'])->orderBy('created_at', 'desc')->get();
                    ?>
                    @foreach($data as $d)
                      @if($d->delete != 1)
                        <?php
                        $limit_q = DB::table('user_saw_this_plan')->where('project_id', $d->id)->count();
                        ?>
                        @if($limit_q >= $d->quotation)
                            @continue
                        @else

                            <li style="font-size:17px;margin-bottom:12px;">
                                <i>{!! strip_tags(str_limit($d->description,80)) !!}
                                    <a href="{{url('/detail_without_auth/'.$d->id)}}">More</a></i></li>
                        @endif

                     @endif
                    @endforeach
                </ol>
                <ol id="show2" style="display:none;">
                    <?php

                    $data = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed'], ['close', '=', 0]])->whereIn('fr_type', ['fr3', 'rb3'])->orderBy('created_at', 'desc')->get();
                    ?>
                    @foreach($data as $d)
                      @if($d->delete != 1)
                        <?php
                        $limit_q = DB::table('user_saw_this_plan')->where('project_id', $d->id)->count();
                        ?>
                        @if($limit_q >= $d->quotation)
                            @continue
                        @else

                            <li style="font-size:17px;margin-bottom:12px;">
                                <i>{!! strip_tags(str_limit($d->description,80)) !!}
                                    <a href="{{url('/detail_without_auth/'.$d->id)}}">More</a></i></li>
                        @endif

                     @endif
                    @endforeach
                </ol>
                <ol id="show3" style="display:none;">
                    <?php

                    $data = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed'], ['close', '=', 0]])->whereIn('fr_type', ['fr1', 'rb2'])->orderBy('created_at', 'desc')->get();
                    ?>
                    @foreach($data as $d)
                      @if($d->delete != 1)
                        <?php
                        $limit_q = DB::table('user_saw_this_plan')->where('project_id', $d->id)->count();
                        ?>
                        @if($limit_q >= $d->quotation)
                            @continue
                        @else

                            <li style="font-size:17px;margin-bottom:12px;">
                                <i>{!! strip_tags(str_limit($d->description,80)) !!}
                                    <a href="{{url('/detail_without_auth/'.$d->id)}}">More</a></i></li>
                        @endif

                      @endif
                    @endforeach
                </ol>
                <ol id="show4" style="display:none;">
                    <?php

                    $data = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed'], ['close', '=', 0]])->whereIn('fr_type', ['fr7', 'fr7'])->orderBy('created_at', 'desc')->get();
                    ?>
                    @foreach($data as $d)
                      @if($d->delete != 1)
                        <?php
                        $limit_q = DB::table('user_saw_this_plan')->where('project_id', $d->id)->count();
                        ?>
                        @if($limit_q >= $d->quotation)
                            @continue
                        @else

                            <li style="font-size:17px;margin-bottom:12px;">
                                <i>{!! strip_tags(str_limit($d->description,80)) !!}
                                    <a href="{{url('/detail_without_auth/'.$d->id)}}">More</a></i></li>
                        @endif
                      @endif
                    @endforeach
                </ol>
                <ol id="show5" style="display:none;">
                    <?php

                    $data = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed'], ['close', '=', 0]])->whereIn('fr_type', ['fr5', 'fr5'])->orderBy('created_at', 'desc')->get();
                    ?>
                    @foreach($data as $d)
                      @if($d->delete != 1)
                        <?php
                        $limit_q = DB::table('user_saw_this_plan')->where('project_id', $d->id)->count();
                        ?>
                        @if($limit_q >= $d->quotation)
                            @continue
                        @else

                            <li style="font-size:17px;margin-bottom:12px;">
                                <i>{!! strip_tags(str_limit($d->description,80)) !!}
                                    <a href="{{url('/detail_without_auth/'.$d->id)}}">More</a></i></li>
                        @endif

                     @endif
                    @endforeach
                </ol>
                <ol id="show6" style="display:none;">
                    <?php

                    $data = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed'], ['close', '=', 0]])->whereIn('fr_type', ['fr8', 'rb5'])->orderBy('created_at', 'desc')->get();
                    ?>
                    @foreach($data as $d)
                     @if($d->delete != 1)
                        <?php
                        $limit_q = DB::table('user_saw_this_plan')->where('project_id', $d->id)->count();
                        ?>
                        @if($limit_q >= $d->quotation)
                            @continue
                        @else

                            <li style="font-size:17px;margin-bottom:12px;">
                                <i>{!! strip_tags(str_limit($d->description,80)) !!}
                                    <a href="{{url('/detail_without_auth/'.$d->id)}}">More</a></i></li>
                        @endif

                     @endif
                    @endforeach
                </ol>
                <ol id="show7" style="display:none;">
                    <?php

                    $data = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed'], ['close', '=', 0]])->whereIn('fr_type', ['fn1', 'fn2', 'fn3', 'fn4'])->orderBy('created_at', 'desc')->get();
                    ?>
                    @foreach($data as $d)
                        @if($d->delete != 1)

                        <?php
                        $limit_q = DB::table('user_saw_this_plan')->where('project_id', $d->id)->count();
                        ?>
                        @if($limit_q >= $d->quotation)
                            @continue
                        @else

                            <li style="font-size:17px;margin-bottom:12px;">
                                <i>{!! strip_tags(str_limit($d->description,80)) !!}
                                    <a href="{{url('/detail_without_auth/'.$d->id)}}">More</a></i></li>
                        @endif

                        @endif
                    @endforeach
                </ol>
                <ol id="show8" style="display:none;">
                    <?php

                    $data = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed'], ['close', '=', 0]])->whereIn('fr_type', ['rb1', 'b1', 'b2', 'b3'])->orderBy('created_at', 'desc')->get();
                    ?>
                    @foreach($data as $d)
                     @if($d->delete != 1)
                        <?php
                        $limit_q = DB::table('user_saw_this_plan')->where('project_id', $d->id)->count();
                        ?>
                        @if($limit_q >= $d->quotation)
                            @continue
                        @else

                            <li style="font-size:17px;margin-bottom:12px;">
                                <i>{!! strip_tags(str_limit($d->description,80)) !!}
                                    <a href="{{url('/detail_without_auth/'.$d->id)}}">More</a></i></li>
                        @endif

                      @endif
                    @endforeach
                </ol>
                <ol id="show9" style="display:none;">
                    <?php

                    $data = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed'], ['close', '=', 0]])->whereIn('fr_type', ['fr4', 'rb4'])->orderBy('created_at', 'desc')->get();
                    ?>
                    @foreach($data as $d)
                      @if($d->delete != 1)
                        <?php
                        $limit_q = DB::table('user_saw_this_plan')->where('project_id', $d->id)->count();
                        ?>
                        @if($limit_q >= $d->quotation)
                            @continue
                        @else

                            <li style="font-size:17px;margin-bottom:12px;">
                                <i>{!! strip_tags(str_limit($d->description,80)) !!}
                                    <a href="{{url('/detail_without_auth/'.$d->id)}}">More</a></i></li>
                        @endif
                      @endif
                    @endforeach
                </ol>
                <ol id="show10" style="display:none;">
                    <?php

                    $data = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed'], ['close', '=', 0]])->whereIn('fr_type', ['fr8', 'rb5'])->orderBy('created_at', 'desc')->get();
                    ?>
                    @foreach($data as $d)
                      @if($d->delete != 1)
                        <?php
                        $limit_q = DB::table('user_saw_this_plan')->where('project_id', $d->id)->count();
                        ?>
                        @if($limit_q >= $d->quotation)
                            @continue
                        @else

                            <li style="font-size:17px;margin-bottom:12px;">
                                <i>{!! strip_tags(str_limit($d->description,80)) !!}
                                    <a href="{{url('/detail_without_auth/'.$d->id)}}">More</a></i></li>
                        @endif
                      @endif
                    @endforeach
                </ol>
                <ol id="show11" style="display:none;">
                    <?php

                    $data = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed'], ['close', '=', 1]])->orderBy('created_at', 'desc')->get();
                    ?>
                    @foreach($data as $d)
                     @if($d->delete != 1)
                        <?php
                        $limit_q = DB::table('user_saw_this_plan')->where('project_id', $d->id)->count();
                        ?>
                        @if($limit_q < $d->quotation)
                            @continue
                        @else
                            <li style="font-size:17px;margin-bottom:12px;">
                                <i>{!! strip_tags(str_limit($d->description,80)) !!}
                                </i></li>
                        @endif

                     @endif
                    @endforeach
                </ol>


            </div>
    
</div>
    <!-- end of project list -->


</div>



<div class="col-xs-12 footer_custom" style="color:white;">
    <div style="margin-left:2%;margin-right:2%;margin-top:2%;">
        <div class="col-xs-6 col-sm-4" style="text-align: center;">
            <div class="col-xs-3 col-sm-3">
            </div>
            <div class="col-xs-12 col-sm-6" style="text-align:left;margin-top:4%;">
                <span class="fa fa-envelope" style="font-size:22px;"></span>
                <span style="font-weight:bolder;"> Email</span>
                info@masterymyanmar.com
                info@hivephing.com
            </div>
        </div>
        <div class="col-xs-12 col-sm-4" style="text-align: center;">
            <div class="col-xs-3 col-sm-3">
            </div>

            <div class="col-xs-12 col-sm-6" style="text-align:left;margin-top:4%;">
                <span class="fa fa-phone" style="font-size:22px;"></span>

                <span style="font-weight:bolder;">Call Us</span><br>
                09456114442<br>
                09773777445
            </div>
        </div>
        <div class="col-xs-12 col-sm-4" style="text-align: center;">
            <div class="col-xs-3 col-sm-3">
            </div>
            <div class="col-xs-12 col-sm-12" style="text-align:left;margin-top:4%;">
                <span class="fa fa-map-marker" style="font-size:22px;"></span>

                <span style="font-weight:bolder;">Address</span><br>
                  No.628/636 Merchant Road,(10th Floor,Royal River View Condo)Between 29th and 30th street,Yangon
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="col-xs-1 col-sm-3">
            &nbsp;
        </div>
        <div class="col-xs-12 col-sm-6" style="padding-left: 117px;">
            <img src="{{asset('images/homepage/facebook_ico.png')}}" style="float:left;margin-right:4%;"
                 class="footer_img"/>
            <img src="{{asset('images/homepage/google_plus-ico.png')}}" style="float:left;margin-right:4%;"
                 class="footer_img"/>
            <img src="{{asset('images/homepage/linkedin_ico.png')}}" style="float:left;margin-right:4%;"
                 class="footer_img"/>
            <img src="{{asset('images/homepage/wk_ico.png')}}" style="float:left;margin-right:4%;" class="footer_img"/>
            <img src="{{asset('images/homepage/ytube_ico.png')}}" style="float:left;margin-right:4%;"
                 class="footer_img"/>
            <img src="{{asset('images/homepage/digg_ico.png')}}" style="float:left;margin-right:4%;"
                 class="footer_img"/>
        </div>
        <div class="col-xs-1 col-sm-3">
            &nbsp;
        </div>

    </div>
    <div class="col-xs-12"
         style="text-align: center;margin-bottom:22px;font-weight:bolder;font-size:15px;color:#345884;margin-top:12px;">
        2018 Mastery Co.Ltd All Rights Reserved.

    </div>
</div>
{{--<div class="user-login">--}}
{{--<div class="user-login-5">--}}
{{--<div class="bg-img">--}}
{{--<div class="bs-reset">--}}

{{--<div class="">--}}

{{--<div class="col-md-8">--}}

{{--<div class="col-xs-6 col-sm-6 col-md-6">--}}
{{--<img src="{{asset('images/logo/logo.png')}}" class="logo" style="float: right;"/>--}}
{{--</div>--}}

{{--<div class="col-xs-6 col-sm-6 col-md-6" style="margin-top:27px;">--}}
{{--<p class="title-p"> Business Network </p>--}}
{{--</div>--}}

{{--<div class="clearfix"></div>--}}

{{--<div class="mt-login-5-bsfix">--}}
{{--<div class="descript">--}}
{{--<p> Are you finding the right places to do business with? There are many ways to make--}}
{{--business connections but which is going to be the most effective for you? Nowadays,--}}
{{--many people are using IT to improve their Business Network. Do you want to link your--}}
{{--business to other business or associations? Hivephing has the original Business--}}
{{--Network Application that provides corporate business the means to connect with other--}}
{{--business to business and business to investors </p>--}}
{{--<div class="clearfix"></div>--}}
{{--<div>--}}
{{--<a href="{{ url('register') }}" class="btn btn-lg green start-now">--}}
{{--Getting Start Now--}}
{{--</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-md-4 login-container mt-login-5-bsfix" style="min-height: 80% !important;">--}}
{{--<a href="see_project_without_auth" class="btn green"--}}
{{--style="float:right;margin-top:12px !important;">--}}
{{--To See Projects--}}
{{--</a>--}}
{{--<a href="usage" class="btn green" style="float:right;margin-top:12px !important;">--}}
{{--To Usage--}}
{{--</a>--}}
{{--<div class="login-content" style="margin-top:0% !important;">--}}

{{--<form action="{{ url('/login') }}" class="login-form" method="post">--}}
{{--{{ csrf_field() }}--}}

{{--<div class="row">--}}

{{--<div class="col-xs-12" style="padding: 20px;">--}}

{{--<a href="register" class="btn green">--}}
{{--Create an account--}}
{{--</a>--}}

{{--</div>--}}

{{--<div class="col-xs-12">--}}
{{--<input id="login"--}}
{{--class="form-control form-control-solid placeholder-no-fix input-bg"--}}
{{--type="email" autocomplete="off" placeholder="Email" name="email"--}}
{{--required="required"/>--}}

{{--@if ($errors->has('email'))--}}
{{--<span class="help-block">--}}
{{--<strong style="color:red;">--}}
{{--{{ $errors->first('email') }}--}}
{{--</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--<div class="col-xs-12">--}}
{{--<input id="login"--}}
{{--class="form-control form-control-solid placeholder-no-fix input-bg"--}}
{{--type="password"--}}
{{--autocomplete="off" placeholder="Password" name="password" required/>--}}
{{--@if ($errors->has('password'))--}}
{{--<span class="help-block">--}}
{{--<strong style="color:red;">--}}
{{--{{ $errors->first('password') }}--}}
{{--</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--<div class="col-xs-12 text-right">--}}

{{--<button class="btn green" type="submit" style="width:100%">Sign In</button>--}}
{{--</div>--}}
{{--</div>--}}

{{--</form>--}}
{{--<!-- BEGIN FORGOT PASSWORD FORM -->--}}

{{--<!-- END FORGOT PASSWORD FORM -->--}}
{{--</div>--}}
{{--<div class="" style="position:relative;padding-top:12px;float:right;">--}}
{{--<div class="row">--}}

{{--<div class="col-xs-12 ">--}}
{{--<div class="login-copyright" style="float:right;">--}}

{{--<div class="forgot-password">--}}
{{--<a href="{{ url('/password/reset') }}" id="forget-password"--}}
{{--class="forget-password" style="color: #fff;">--}}
{{--Forgot Password ?--}}
{{--</a>--}}

{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--</div>--}}
{{--<div class="clearfix"></div>--}}
{{--</div>--}}

{{--<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 fronteer">--}}
{{--<ul class="arrow middle">--}}
{{--<p>--}}
{{--<span class="fa fa-envelope"--}}
{{--style="color:#32c5d2;border:2px solid #93edf9;padding:12px;border-radius:50% !important;"></span>--}}
{{--We provide the Business frontier for you--}}
{{--</p>--}}

{{--<li>--}}
{{--<span class="fa fa-paper-plane" style="color:#32c5d2;"></span>--}}
{{--Linking the Investors--}}
{{--</li>--}}
{{--<li>--}}
{{--<span class="fa fa-paper-plane" style="color:#32c5d2;"></span>--}}

{{--Outlining Tendersr--}}
{{--</li>--}}
{{--<li>--}}
{{--<span class="fa fa-paper-plane" style="color:#32c5d2;"></span>--}}

{{--To find and create projects--}}
{{--</li>--}}
{{--<li>--}}
{{--<span class="fa fa-paper-plane" style="color:#32c5d2;"></span>--}}

{{--Sharing updated information--}}
{{--</li>--}}
{{--<li>--}}
{{--<span class="fa fa-paper-plane" style="color:#32c5d2;"></span>--}}

{{--To advertise your activities--}}
{{--</li>--}}
{{--<li>--}}
{{--<span class="fa fa-paper-plane" style="color:#32c5d2;"></span>--}}

{{--To connect you to events and workshops.--}}
{{--</li>--}}
{{--</ul>--}}
{{--</div>--}}

{{--<div class="clearfix"></div>--}}

{{--<div class="foot">--}}

{{--<div>--}}
{{--<p style="text-align: center;">--}}
{{--Delivering the latest product trends and industry news straight to your inbox.--}}
{{--</p>--}}
{{--<div class="col-md-5 col-md-offset-4 col-xs-6 col-xs-offset-3">--}}
{{--<input type="text" name="email" class="contact-email">--}}
{{--<button type="submit" name="submit" class="btn btn-lg green"> Submit </button>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="clearfix"></div>--}}

{{--<p style="margin:20px 0px;"></p>--}}

{{--<div class="footer-col col-md-4 col-xs-4">--}}
{{--<ul>--}}
{{--<li class="footer-title"> Company/SME</li>--}}
{{--<li> Register your Company Information</li>--}}
{{--<li> Browse the Project</li>--}}
{{--<li> Pitch Investor with Bussiness Plan</li>--}}
{{--<li> Join Events</li>--}}
{{--<li> Read News</li>--}}
{{--<li> Join Bussiness Association</li>--}}
{{--<li> Create Projects or call Third Party</li>--}}
{{--<li> Publish Events</li>--}}
{{--<li> Upload your Activities</li>--}}
{{--<li> Search Companies Information</li>--}}
{{--</ul>--}}
{{--</div>--}}

{{--<div class="footer-col col-md-4 col-xs-4">--}}
{{--<ul>--}}
{{--<li class="footer-title"> Investor</li>--}}
{{--<li> Register Investor Information</li>--}}
{{--<li> Pick Bussiness Proposal you want</li>--}}
{{--<li> Register your Company Information</li>--}}
{{--<li> Browse Projects</li>--}}
{{--<li> Join Events</li>--}}
{{--<li> Read News</li>--}}
{{--<li> Join Bussiness Association</li>--}}
{{--<li> Create Projects or call Third Party</li>--}}
{{--<li> Publish Events</li>--}}
{{--<li> Upload your Activities</li>--}}
{{--<li> Search Companies Information</li>--}}
{{--</ul>--}}
{{--</div>--}}

{{--<div class="footer-col col-md-4 col-xs-4">--}}
{{--<ul>--}}
{{--<li class="footer-title"> Association</li>--}}
{{--<li> Create Association</li>--}}
{{--<li> Publish New</li>--}}
{{--<li> Create Events</li>--}}
{{--<li> Create Projects</li>--}}
{{--<li> Approved your Association</li>--}}
{{--<li> Read News</li>--}}
{{--<li> Upload your Activities</li>--}}
{{--<li> Search Companies Information</li>--}}
{{--</ul>--}}
{{--</div>--}}

{{--<div class="clearfix"></div>--}}

{{--<hr style="margin:30px; border-top: 2px solid #fff;">--}}

{{--<div class="clearfix"></div>--}}

{{--<div class="col-md-6 col-md-offset-3" id="social">--}}

{{--<ul>--}}
{{--<li> Follow us :</li>--}}

{{--<li>--}}
{{--<a rel="nofollow" target="_blank" title="Follow us on facebook"--}}
{{--href="https://www.facebook.com/businessnetwork.hivephing/" class="facebook">--}}
{{--<i class="fab fa-facebook-f" aria-hidden="true"></i>--}}
{{--</a>--}}
{{--</li>--}}

{{--<li>--}}
{{--<a rel="nofollow" target="_blank" title="Follow us on instagram"--}}
{{--href="https://www.instagram.com/hivephingmyanmar" class=instagram>--}}
{{--<i class="fab fa-instagram"></i>--}}
{{--</a>--}}
{{--</li>--}}

{{--<li>--}}
{{--<a rel="nofollow" target="_blank" title="Follow us on linkedin"--}}
{{--href="https://www.linkedin.com/in/hivephing-business-network-a90767159/" class="linkedin">--}}
{{--<i class="fab fa-linkedin-in"></i>--}}
{{--</a>--}}
{{--</li>--}}

{{--<li>--}}
{{--<a rel="nofollow" target="_blank" title="Follow us on twitter"--}}
{{--href="https://www.twitter.com/hive_phingmm/" class="twitter">--}}
{{--<i class="fab fa-twitter"></i>--}}
{{--</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</div>--}}

{{--<div class="clearfix"></div>--}}


{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

<script src="{{asset('global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/jquery.blockui.min.js')}}'" type="text/javascript"></script>
<script src="{{asset('global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset('plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/backstretch/jquery.backstretch.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
{{--<script src="{{asset('global/scripts/app.min.js')}}" type="text/javascript"></script>--}}
{{--<!-- END THEMCRIPTS -->--}}
{{--<!-- BEGIN PAGE LEVEL SCRIPTS -->--}}
{{--<script src="{{asset('global/scripts/login-5.min.js')}}" type="text/javascript"></script>--}}
<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
<!-- Stellar Parallax -->
<!-- Flexslider -->
<script src="{{asset('js/jquery.flexslider-min.js')}}"></script>
<!-- Owl carousel -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<!-- Magnific Popup -->
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/magnific-popup-options.js')}}"></script>
<!-- Counters -->
<script src="{{asset('js/jquery.countTo.js')}}"></script>
<!-- Main -->
<script src="{{asset('js/main.js')}}"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
<script>
    $(document).ready(function () {
        $('#clickmewow').click(function () {
            $('#radio1003').attr('checked', 'checked');
        });
    })
</script>
<script>
    function show_ds(cname) {
        for (i = 1; i < 12; i++) {
            if (i == cname) {
                console.log(i)
                console.log('ff')
                document.getElementById("show" + cname).style.display = 'block';
                document.getElementsByClassName("pcat")[i-1].className += ' bor_btm';

            }
            else {
                console.log('n' + i)

                document.getElementById("show" + i).style.display = 'none';
                document.getElementsByClassName("pcat")[i-1].className = 'pcat';
            }
        }

    }
    function show_logandreg(par) {
        if (par == 'reg') {
            document.getElementById("ds_register").style.display = 'block';
            document.getElementById("ds_login").style.display = 'none';
        } else {
            document.getElementById("ds_login").style.display = 'block';
            document.getElementById("ds_register").style.display = 'none';

        }

    }
    function go_reg(url) {
        window.location.href = url;
    }
</script>
<!-- Google Code for Universal Analytics -->

</body>

</html>