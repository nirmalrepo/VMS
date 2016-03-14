<?php
include './config/dbc.php';
$conn = new MainConfig();
session_start();
?>
<!DOCTYPE html>
<html>
    <head>        
        <?php require_once './include/systemHeader.php'; ?>          
    </head>
    <body>
        <div id="wrap" class="" >
            <?php require_once './include/navBar.php'; ?>
            <div class="container">               
                <div class="row">    
                    <h3 style="margin-top: 25px; margin-left: 0px;">Reports</h3>
                    <hr>
                    <div class="col-md-12" style="margin-top: 50px;">
                        <div class="row">
                            <a href="rep_cus_vice_orders.php" class="col-md-3">
                                <div class="col-md-12 outline-inward" style="margin:5px; margin-bottom: 20px; padding: 0px;">
                                    <div class="thumbnail" style="background-color: #dcdcdc;margin: 0px; padding: 0px;">
                                        <img src="img/dashbord/delivery_truck_box_transportation-512.png" style="width:80px; height:80px">
                                        <div class="caption text-center" style="margin-top:-20px;">
                                            <h3>Vehicle Reports</h3>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="customer_report.php" class="col-md-3">
                                <div class="col-md-12 outline-inward" style="margin:5px; margin-bottom: 20px; padding: 0px;">
                                    <div class="thumbnail" style="background-color: #dcdcdc; margin: 0px; padding: 0px;">
                                        <img src="img/dashbord/vre.png" style="width:80px; height:80px">
                                        <div class="caption text-center" style="margin-top:-20px;">
                                            <h3>Repair Reports</h3>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="dispose_report.php" class="col-md-3">
                                <div class="col-md-12 outline-inward" style="margin:5px; margin-bottom: 20px; padding: 0px;">
                                    <div class="thumbnail" style="background-color: #dcdcdc; margin: 0px; padding: 0px;">
                                        <img src="img/dashbord/ggg.png" style="width:80px; height:80px">
                                        <div class="caption text-center" style="margin-top:-20px;">
                                            <h3>Dispose Reports</h3>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="fuel_report.php" class="col-md-3">
                                <div class="col-md-12 outline-inward" style="margin:5px; margin-bottom: 20px; padding: 0px;">
                                    <div class="thumbnail" style="background-color: #dcdcdc; margin: 0px; padding: 0px;">
                                        <img src="img/dashbord/31774.png" style="width:80px; height:80px">
                                        <div class="caption text-center" style="margin-top:-20px;">
                                            <h3>Fuel Reports</h3>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="fuel_report_branch.php" class="hide col-md-3">
                                <div class="col-md-12 outline-inward" style="margin:5px;margin-bottom: 20px; padding: 0px;">
                                    <div class="thumbnail" style="background-color: #dcdcdc; margin: 0px; padding: 0px;">
                                        <img src="img/dashbord/31774.png" style="width:80px; height:80px">
                                        <div class="caption text-center" style="margin-top:-20px;">
                                            <h3>Fuel Report- Detailed </h3>
                                            <p></p>
                                        </div>                                                                                                                
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <?php // require_once './include/footerBar.php'; ?>
        <?php require_once './include/systemFooter.php'; ?>
    </body>
    <script type="text/javascript">
        $(function () {
            pageProtect();
//            $('#logout').click(function() {
//                logout();
//            });
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
                    //alert('No F-keys');
                    return false;
                }
            }
            document.onkeydown = function (event) {
                event = (event || window.event);
                if (event.keyCode == 123) {
                    //alert('No F-keys');
                    return false;
                }
            }

        });
    </script>
</html>

