<?php
echo header("Cache-Control:no-store,no-cache,must-revalidate,max-age=0");header("Cache-Control:post-check=0,pre-check=0", false);header("Pragma:no-cache");header('Content-Type:text/html');

?>
<!DOCTYPE html>

<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->


<!-- Mirrored from keenthemes.com/preview/metronic/theme/admin_1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Nov 2017 07:33:32 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8"/>
    <title>
        Hive Phing
    </title>
    <link rel="shortcut icon" href="{{ asset('images/logo/logo.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Preview page of Metronic Admin Theme #1 for statistics, charts, recent events and reports"
          name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -')}}>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS -->
    <link href="{{asset('global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('global/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('global/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('global/plugins/jqvmap/jqvmap/jqvmap.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset('global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css"/>
    <link href="{{asset('global/css/plugins.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->

    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{asset('layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css"
          id="style_color"/>
    <link href="{{asset('layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/custom.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/jquery.bxslider.css')}}" rel="stylesheet"/>
    <!-- END THEME LAYOUT STYLES -->

    <link href="{{asset('css/bootstrap-imageupload.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('css/normalize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/stylesheet.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/github-light.css')}}">
    <link rel="shortcut icon" href="favicon.ico"/>
    <style>
        .red {
            color: red;
        }

        .input-title {
            font-weight: bold;
            color: #888;
        }

        .pannel-title {
            font-weight: bold;
            color: #888;
            margin: 22px;
            font-size: 18px;
        }

        .detail-title {
            color: lightseagreen;
            font-weight: bolder;
            font-size: 16px;
        }

        @font-face {
            font-family: 'Ours-Unicode';
            src: local('Ours-Unicode'), url('https://mmwebfonts.comquas.com/fonts/oursunicode.woff') format('woff'), url('https://mmwebfonts.comquas.com/fonts/oursunicode.ttf') format('ttf');
        }

        @font-face {
            font-family: 'Zawgyi-One';
            src: local('Zawgyi-One'), url('https://mmwebfonts.comquas.com/fonts/zawgyi.woff') format('woff'), url('https://mmwebfonts.comquas.com/fonts/zawgyi.ttf') format('ttf');
        }
    </style>
    <style>

        .topnavs {
            overflow: hidden;
            background-color: #2e4765;
            float: right;

        }

        .background_lyrics {
            color: #eede2c;
            font-size: 33px;
            margin-left: 52px;
            margin-top: 55px;
            font-weight: bolder;
            height: 222px;
        }

        .topnavs a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .actives {
            background-color: #4CAF50;
            color: white;
        }

        .topnavs .icon {
            display: none;
        }

        .dropdowns {
            float: left;
            overflow: hidden;
        }

        .dropdowns .dropbtns {
            font-size: 17px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .dropdowns-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdowns-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .topnavs a:hover, .dropdowns:hover .dropbtns {
            background-color: #516a88;
            color: white;
        }

        .dropdowns-content a:hover {
            background-color: #ddd;
            color: black;
        }

        .dropdowns:hover .dropdowns-content {
            display: block;
        }

        @media screen and (max-width: 600px) {
            .topnavs a:not(:first-child), .dropdowns .dropbtns {
                display: none;

            }

            .dropdowns-content a:hover {
                background-color: #ddd;
                color: black;

            }

            .dropdowns:hover .dropdowns-content {
                display: block;
            }

            .topnavs {
                overflow: hidden;
                background-color: #2e4765;
                width: 100%;
            }

            .topnavs a.icon {
                display: block;
                float: right;
            }

        }

        @media screen and (max-width: 600px) {
            .topnavs.responsive {
                position: relative;
            }

            .topnavs.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }

            .topnavs.responsive a {
                float: none;
                display: block;
                text-align: left;
            }

            .topnavs.responsive .dropdowns {
                float: none;
            }

            .topnavs.responsive .dropdowns-content {
                position: relative;
            }

            .topnavs.responsive .dropdowns .dropbtns {
                display: block;
                width: 100%;
                text-align: left;
            }
        }

        .top_m {
            float: right;
            margin-top: 5%;
        }

        .bg-z {
            height: 622px;
        }

        .login_box {
            border: 2px solid #1918182e;
            background-color: white;
            width: 312px;
            height: 422px;
            border-radius: 22px !important;
            margin-left: 17%;

        }

        .login_box_title {
            background-color: #345884;
            width: 322px;
            margin-left: -7px;
            margin-top: 8%;
            text-align: center;
            height: 47px;
            padding: 12px;
            font-size: 22px;
        }

        .footer_img {
            float: right;
            width: 61px;
            margin-top: 5%;
        }

        .login_parent {
            padding: 122px;
        }

        .latest {
            margin-left: 12px;
            width: 90%;
            border: 1px solid #cdc2c2;
            border-bottom: 2px solid #659be0;
            background-color: white;
            padding: 12px;
        }

        .bgs {

            color: white;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            height: 433px;
        }

        .form_yk {
            padding-left: 12px;
            width: 271px;
            margin-left: 12px;
            height: 42px;
            border-radius: 9px !important;
            color: black;
            background-color: #c1c1c17a;
            border: 1px solid #b1a5a52e;
        }

        @media only screen and (max-width: 900px) {
            .top_m {
                float: none;
                margin-top: 5%;
            }

            .background_lyrics {
                color: #eede2c;
                font-size: 33px;
                margin-left: 52px;
                margin-top: 55px;
                font-weight: bolder;
                height: 222px;
            }

            .bgs {
                color: white;
                background-repeat: no-repeat;
                background-size: 100% 100%;
                height: 433px;
            }

            .bgs2 {
                color: white;
                background-repeat: no-repeat;
                background-size: 100% 100%;
                height: 433px;
            }

            .latest {
                margin-left: 22px;
                width: 90%;
                border: 1px solid #cdc2c2;
                border-bottom: 2px solid #659be0;
                background-color: white;
                padding: 12px;
            }

            .bg-z {
                height: 422px;
            }

            .login_parent {
                padding: 22px;
            }

            .top_header {
                margin-left: 111px;
            }

            .login_box {
                border: 1px solid #b1a5a52e;
                background-color: white;

                width: 312px;
                height: 422px;
                border-radius: 22px !important;
                margin-left: 28%;
            }

            .login_box_title {
                background-color: #345884;
                width: 322px;
                margin-left: -7px;
                margin-top: 8%;
                text-align: center;
                height: 47px;
                padding: 12px;
                font-size: 22px;
            }

            .form_yk {
                padding-left: 12px;
                width: 271px;
                margin-left: 22px;
                height: 42px;
                border-radius: 9px !important;
                color: black;
                background-color: #c1c1c17a;
                border: 1px solid #b1a5a52e;
            }
        }
    </style>
</head>
<body style="background:#2e4765;" id="cf">
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

@yield('body')
</body>

<!-- END QUICK NAV -->
<!--[if lt IE 9]>

<script src="{{asset('global/plugins/respond.min.js')}}"></script>
<script src="{{asset('global/plugins/excanvas.min.js')}}"></script>
<script src="{{asset('global/plugins/ie8.fix.min.js')}}"></script>
<![endif]-->
<script>
    function go(link) {
        window.location.assign(link);
    }
    ;
    function change_font(name) {
        if (name == 'z') {
            document.getElementById('cf').style.fontFamily = "Zawgyi-One";
        } else {
            document.getElementById('cf').style.fontFamily = "Ours-Unicode";

        }


    }
</script>

<!-- BEGIN CORE PLUGINS -->
<script src="{{asset('global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="{{asset('global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/jquery-validation/js/additional-methods.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/bootstrap-markdown/lib/markdown.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/bootstrap-markdown/js/bootstrap-markdown.js')}}" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset('global/plugins/moment.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('global/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/morris/raphael-min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/amcharts/amcharts/amcharts.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/amcharts/amcharts/serial.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/amcharts/amcharts/pie.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/amcharts/amcharts/radar.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/amcharts/amcharts/themes/light.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/amcharts/amcharts/themes/patterns.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/amcharts/amcharts/themes/chalk.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/amcharts/ammap/ammap.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/amcharts/ammap/maps/js/worldLow.js')}}" type="text/javascript"></script
<script src="{{asset('global/plugins/amcharts/amstockcharts/amstock.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/horizontal-timeline/horizontal-timeline.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/flot/jquery.flot.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/flot/jquery.flot.resize.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/flot/jquery.flot.categories.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/jquery-easypiechart/jquery.easypiechart.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/jqvmap/jqvmap/jquery.vmap.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{asset('global/scripts/app.min.js')}}" type="text/javascript"></script>
<script src="{{asset('pages/scripts/form-validation.min.js')}}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('pages/scripts/dashboard.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{asset('layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
<script src="{{asset('layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
<script src="{{asset('layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
<script src="{{asset('layouts/global/scripts/quick-nav.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/jquery.bxslider.js')}}"></script>

<script src="{{asset('js/loading/loadingoverlay.min.js')}}"></script>
<script src="{{asset('js/loading/loadingoverlay_progress.min.js')}}"></script>

<script src="{{asset('js/jquery.imagereader-1.1.0.min.js')}}"></script>


{{--<script src="{{asset('js/bootstrap-imageupload.js')}}"></script>--}}
<!-- END THEME LAYOUT SCRIPTS -->
<script>
    $(document).ready(function () {
        $('#clickmewow').click(function () {
            $('#radio1003').attr('checked', 'checked');
        });
    })
</script>
<script>
    $(document).ready(function () {
        $('.bxslider').bxSlider({
            mode: 'horizontal',
            moveSlides: 1,
            slideMargin: 20,
            auto: true,
            infiniteLoop: true,
            slideWidth: 400,
            minSlides: 2,
            maxSlides: 5,
            speed: 800,
            pager: false
        });
    });
</script>

<script>
    $(document).ready(function () {
        $("#country").click(function () {
            var id = $("#country option:selected").val();
            $.get("https://hivephing.com/get_cities_ajax/" + id, function (data) {
                console.log(data.data);
                $("#cities").children().remove();
                $('#cities').prop("disabled", false);
                for (var i = 0; i < data.data.length; i++) {
                    $('#cities').append("<option value=" + data.data[i].id + ">" + data.data[i].name + "</option>");
                }
                var options = $('#cities option');
                var arr = options.map(function (_, o) {
                    return {t: $(o).text(), v: o.value};
                }).get();
                arr.sort(function (o1, o2) {
                    return o1.t > o2.t ? 1 : o1.t < o2.t ? -1 : 0;
                });
                options.each(function (i, o) {
                    o.value = arr[i].v;
                    $(o).text(arr[i].t);
                });

            })
        });

    });
</script>

{{--<script>--}}
{{--var $imageupload = $('.imageupload');--}}
{{--$imageupload.imageupload();--}}
{{--</script>--}}

<script type="text/javascript">
    $(document).ready(function () {
        $('#photo').imageReader({
            renderType: 'canvas',
            onload: function (canvas) {
                var ctx = canvas.getContext('2d');
                ctx.fillStyle = "orange";
                ctx.font = "12px Verdana";
                ctx.fillText("Filename : " + this.name, 10, 20, canvas.width - 10);
                $(canvas).css({
                    width: '100%',
                    height: '100%',
                    marginBottom: '-10px'
                });
            }
        });
    });

</script>
<script>
    //to sort cities name
    var options = $('#cities option');
    var arr = options.map(function (_, o) {
        return {t: $(o).text(), v: o.value};
    }).get();
    arr.sort(function (o1, o2) {
        return o1.t > o2.t ? 1 : o1.t < o2.t ? -1 : 0;
    });
    options.each(function (i, o) {
        o.value = arr[i].v;
        $(o).text(arr[i].t);
    });

</script>
@yield('js')
<!-- Google Code for Universal Analytics -->
</body>
<script src="https://www.gstatic.com/firebasejs/5.5.9/firebase.js"></script>
{{--<script src="https://localhost/comreal/HivePhing/resources/views/layouts/firebase-messaging-sw.js"></script>--}}


<script>
    // TODO: Replace with your project's customized code snippet
    var config = {
        apiKey: "AIzaSyBqx_3zrr1VHyv7UjLDD4EYKPK9ujGbWqQ",
        authDomain: "hivephing-6589f.firebaseapp.com",
        databaseURL: "https://hivephing-6589f.firebaseio.com",
        projectId: "hivephing-6589f",
        storageBucket: "hivephing-6589f.appspot.com",
        messagingSenderId: "303951752448",
    };
    firebase.initializeApp(config);

    messaging = firebase.messaging();
    messaging.usePublicVapidKey('BHukpDQk_W_mBxXd1vekcQXVpjWm99ToopRdcp8X4AekrIakuAMRAeP1Ns7JsFiPui_PT-2Bdj1ZpUywEtmsxK0');
    gid = '';//global var fro userid to use everywhere
    messaging.requestPermission().then(function () {
        console.log('Notification permission granted.');
        // TODO(developer): Retrieve an Instance ID token for use with FCM.
        messaging.getToken().then(function (currentToken) {
            if (currentToken) {
                console.log('token:' + currentToken);
                $.post("https://" + window.location.hostname + "/companies/entra/store_token", {token: currentToken}, function (data, status) {
                    console.log(data);
                    gid = data.data;
                    console.log('gg' + gid);
                });

            } else {
                // Show permission request.
                console.log('No Instance ID token available. Request permission to generate one.');
                // Show permission UI.
                updateUIForPushPermissionRequired();
                setTokenSentToServer(false);
            }
        }).catch(function (err) {
        });
        // ...
    }).catch(function (err) {
        console.log('Unable to get permission to notify.', err);
    });
    messaging.onMessage(function (payload) {
        console.log('Message received.', payload.notification.body);
        console.log('Message received.', payload.data.post_id);
        $('#mom-noti').prepend("<a class='content' href='#'><div class='notification-item'>"
                +"<br><br><div class='caption'><i class='icon-layers font-green'></i><span class='caption-subject font-green bold uppercase'>New Project</span></div>"+
                +"<div class='item-info' style = 'font-size: 13px;color:#888;' >"+ payload.notification.body +"</div >"+
                + "</div>" +
                +"</a>"
        )
        ;

        messaging.getToken().then(function (currentToken) {
            if (currentToken) {
                $.get("https://" + window.location.hostname + "/companies/entra/get_noti/" + gid, function (data, status) {
                    document.getElementById('noti').innerHTML = data.count;
                    console.log(data);
                });
            }
        });
        $(".modal-title").html("<h3 style='font-weight:bold'>" + payload.notification.title + "</h3>");
        $(".modal-body").html(payload.notification.body + '<br><br>' + "<a href='https://" + window.location.hostname + "/companies/entra/construct_projects' style='float:right' class='btn btn-primary'> Go to See </a><br><br>");
        $("#myModal").modal();

        // [START_EXCLUDE]
        // Update the UI to include the received message.
        // [END_EXCLUDE]
    });
</script>
{{--<script>--}}
    {{--//when user click noti button--}}
    {{--$("#dLabel").click(function () {--}}
        {{--$.get("http://localhost/realfinal/hivephing/entra/clear_noti/" + gid, function (data, status) {--}}
            {{--document.getElementById('noti').innerHTML = 0;--}}
            {{--console.log(data);--}}
        {{--});--}}
    {{--});--}}


{{--</script>--}}


</html>