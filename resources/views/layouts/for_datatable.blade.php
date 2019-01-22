<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.5
Author: KeenThemes
Website: https://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->


<!-- Mirrored from keenthemes.com/preview/metronic/theme/admin_1/table_datatables_managed.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Nov 2017 07:39:34 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <title>Hiveping</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #1 for managed datatable samples" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />

    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset('global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{asset('global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{asset('layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{asset('layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
   <style>
       .red{
    color:red;
    }
       @font-face {
           font-family:'Ours-Unicode';
           src:local('Ours-Unicode'), url('https://mmwebfonts.comquas.com/fonts/oursunicode.woff') format('woff'), url('https://mmwebfonts.comquas.com/fonts/oursunicode.ttf') format('ttf');
       }
       @font-face {
           font-family:'Zawgyi-One';
           src:local('Zawgyi-One'), url('https://mmwebfonts.comquas.com/fonts/zawgyi.woff') format('woff'), url('https://mmwebfonts.comquas.com/fonts/zawgyi.ttf') format('ttf');
       }
   </style>
    <style>
        .red{
            color:red;
        }
        .input-title{
            font-weight:bold;color:#888;
        }
        .pannel-title{
            font-weight:bold;color:#888;margin:22px;font-size:18px;
        }
        .detail-title{
            color:lightseagreen;font-weight:bolder;font-size:16px;
        }
        @font-face {
            font-family:'Ours-Unicode';
            src:local('Ours-Unicode'), url('https://mmwebfonts.comquas.com/fonts/oursunicode.woff') format('woff'), url('https://mmwebfonts.comquas.com/fonts/oursunicode.ttf') format('ttf');
        }
        @font-face {
            font-family:'Zawgyi-One';
            src:local('Zawgyi-One'), url('https://mmwebfonts.comquas.com/fonts/zawgyi.woff') format('woff'), url('https://mmwebfonts.comquas.com/fonts/zawgyi.ttf') format('ttf');
        }
    </style>
    <style>

        .topnavs {
            overflow: hidden;
            background-color: #2e4765;
            float:right;

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
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
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
                width:100%;
            }

            .topnavs a.icon {
                display: block;
                float:right;
            }

        }

        @media screen and (max-width: 600px) {
            .topnavs.responsive {position: relative;}
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
            .topnavs.responsive .dropdowns {float: none;}
            .topnavs.responsive .dropdowns-content {position: relative;}
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
            background-image: url('https://localhost/companies/public/images/banner.jpg');
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
                color: #ffed03;
                font-size: 133px;
                margin-left: 52px;
                margin-top: 55px;
                font-weight: bolder;
                height: 222px;
            }

            .bgs {
                background-image: url('https://localhost/companies/public/images/banner.jpg');
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
<!-- END HEAD -->
<body  style="background:#2e4765;" id="cf">


@yield('body')
</body>
<!-- END QUICK NAV -->
<!-- BEGIN CORE PLUGINS -->
<script src="{{asset('global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset('global/scripts/datatable.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{asset('global/scripts/app.min.js')}}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{asset('layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
<script src="{{asset('layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
<script src="{{asset('layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
<script src="{{asset('layouts/global/scripts/quick-nav.min.js')}}" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<script>
    $(document).ready(function()
    {
        $('#clickmewow').click(function()
        {
            $('#radio1003').attr('checked', 'checked');
        });
    })
    function change_font(name){
        if(name == 'z') {
            document.getElementById('cf').style.fontFamily = "Zawgyi-One";
        }else{
            document.getElementById('cf').style.fontFamily = "Ours-Unicode";

        }


    }
</script>
<script src="https://www.gstatic.com/firebasejs/5.5.9/firebase.js"></script>

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

    messaging.requestPermission().then(function() {
        console.log('Notification permission granted.');
        // TODO(developer): Retrieve an Instance ID token for use with FCM.
        messaging.getToken().then(function(currentToken) {
            if (currentToken) {
                console.log('token:'+currentToken);
                $.post("https://localhost/realfinal/hivephing/store_token",{token:currentToken}, function(data, status){
                    console.log(data);
                });

            } else {
                // Show permission request.
                console.log('No Instance ID token available. Request permission to generate one.');
                // Show permission UI.
                updateUIForPushPermissionRequired();
                setTokenSentToServer(false);
            }
        }).catch(function(err) {
        });
        // ...
    }).catch(function(err) {
        console.log('Unable to get permission to notify.', err);
    });
    messaging.onMessage(function(payload) {
        console.log('Message received.', payload.notification.body);
        console.log('Message received.', payload.data.post_id);
        $.post("https://localhost/realfinal/hivephing/store_fcm",{user_token: payload.data.user_token,post_id:payload.data.post_id}, function(data, status){
            console.log(data);
        });
        $(".modal-title").html("<h3 style='font-weight:bold'>"+payload.notification.title+"</h3>");
        $(".modal-body").html(payload.notification.body +'<br><br>'+"<a href='https://"+window.location.hostname+"/realfinal/hivephing/entra/construct_projects' style='float:right' class='btn btn-primary'> Go to See </a><br><br>");
        $("#myModal").modal();
        // [START_EXCLUDE]
        // Update the UI to include the received message.
        // [END_EXCLUDE]
    });
</script>
<!-- Google Code for Universal Analytics -->

</body>



<!-- Mirrored from keenthemes.com/preview/metronic/theme/admin_1/table_datatables_managed.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Nov 2017 07:39:39 GMT -->
</html>