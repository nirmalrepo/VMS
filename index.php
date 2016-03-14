<?php
session_start();
session_regenerate_id(true);
require_once './config/dbc.php';
?>
<!DOCTYPE html>
<html>
    <head>          
        <?php require_once './include/systemHeader.php'; ?>        
    </head>
    <body>        
        <div class="container signForm" style='padding-top: 100px'>
            <div class="card card-signin" style='background-color: rgba(61, 59, 59, 0.42)'>
            <h1 class="form-signin-heading text-center">Vehicle Management System</h1>
                <img class="profile-img" src="img/dashbord/tranportation-icon.png" style="height:80px;width:80px;margin-bottom: 2px" alt="">
                <div class="form-signin">
                    <input type="text" class="form-control" id="userName" placeholder="Username" required autofocus autocapitalize="off" autocomplete="off" autocorrect="off">
                    <input type="password" class="form-control" id="password" placeholder="Password" required onkeyup="inputKeyUp(event)">
<!--                                        <label class="checkbox">
                                            <input type="checkbox" class="showHidePwd"> Show / Hide Password
                                        </label>-->
<button class="btn btn-lg btn-primary btn-block" id="logSystem" style="">Sign in</button>

                </div>
            </div>

        </div> <!-- /container -->        
        <?php require_once './include/systemFooter.php'; ?>       
        <script type="text/javascript">

            function inputKeyUp(e) {
                e.which = e.which || e.keyCode;
                if (e.which === 13) {
                    var userName = $('#userName').val();
                    var password = $('#password').val();

                    if ($('#remember').prop('checked')) {
                        var remember = "r";
                    } else {
                        var remember = "nr";
                    }
                    login(userName, password, remember);
                }
            }

            $(function () {
                starterBgSlideTransition();
                $('.showHidePwd').on('change', function () {
                    $('#password').hideShowPassword($(this).prop('checked'));
                });

                $('#logSystem').click(function () {
                    var userName = $('#userName').val();
                    var password = $('#password').val();

                    if ($('#remember').prop('checked')) {
                        var remember = "r";
                    } else {
                        var remember = "nr";
                    }
                    login(userName, password, remember);
                });

                $(document).ready(function ()
                {
//                $(document).bind("contextmenu", function(e) {
//                    return false;
//                });
                });

                document.onkeypress = function (event) {
                    event = (event || window.event);
                    if (event.keyCode == 123) {
                        //alert('No F-12');
                        return false;
                    }
                }
                document.onmousedown = function (event) {
                    event = (event || window.event);
                    if (event.keyCode == 123) {
                        //alert('No F-keys');Vehi
                        return false;
                    }
                }
//document.onkeydown = function (event) {
//        event = (event || window.event);
//        if (event.keyCode == 123) {
//            //alert('No F-keys');
//            return false;
//        }
//    }

            });
        </script>
    </body>
</html>

