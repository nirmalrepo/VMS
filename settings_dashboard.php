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
                    <h3 style="margin-top: 25px; margin-left: 0px;">System Settings</h3>
                    <hr>
                    <div class="col-md-12" style="margin-top: 50px;">
                        <div class="row">
                            <a href="bank.php">
                                <div class="col-md-3">
                                    <div class="thumbnail" style="background-color: #dcdcdc; padding: 10px;">
                                        <img src="img/dashbord/customerRegistration.png" style="width:80px; height:80px">
                                        <div class="caption text-center" style="margin-top:-20px;">
                                            <h3>Add Banks</h3>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="run.php">
                                <div class="col-md-3">
                                    <div class="thumbnail" style="background-color: #dcdcdc; padding: 10px;">
                                        <img src="img/dashbord/backup.png" style="width:80px; height:80px">
                                        <div class="caption text-center" style="margin-top:-20px;">
                                            <h3>System Backup</h3>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="setVATandNBT.php">
                                <div class="col-md-3">
                                    <div class="thumbnail" style="background-color: #dcdcdc; padding: 10px;">
                                        <img src="img/dashbord/report.png" style="width:80px; height:80px">
                                        <div class="caption text-center" style="margin-top:-20px;">
                                            <h3>Set VAT And NBT</h3>
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
        $(function() {
            pageProtect();
            $('#logout').click(function() {
                logout();
            });
            
            $(document).ready(function()
            {
                $(document).bind("contextmenu", function(e) {
                    return false;
                });
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

