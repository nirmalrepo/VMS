<?php
require_once './include/MainConfig.php';
include './config/dbc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Banks</title> 
        <meta charset="UTF-8">
        <?php require_once './include/systemHeader.php'; ?>        
    </head>
    <body>
        <div id="wrap">
            <?php require_once './include/navBar.php'; ?>
            <div class="container">               
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h2>Banks Settings <small> </small></h2>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-horizontal">
                                    <input type="hidden" id="bankID">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">Bank Name</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="bankName" class="form-control" placeholder="Enter Bank Name" required>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-10">
                                            <span id="bankSaveBtn">
                                                <button class="btn btn-success" id="bankSave"><i class="fa fa-save fa-lg"></i>&nbsp;Save</button>                                        
                                            </span>
                                            <span id="bankActionBtn" class="hidden">
                                                <button class="btn btn-warning" id="bankUpdate"><i class="fa fa-edit fa-lg"></i>&nbsp;Update</button>                                                               
                                               
                                            </span>
                                        </div>
                                    </div>
                                </div>                 
                            </div>
                            <div class="col-lg-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Bank Informations</h3>
                                    </div>
                                    
                                    <input type="text" class="form-control" placeholder="Search Bank" id="dev-table-filter" data-action="filter" data-filters=".loadBanksTable" style="background-color: #f2dede;" />
                                   
                                    <div class="scrollable" style="height: 300px; overflow-y: auto">
                                        <table class="table table-bordered table-striped table-hover loadBanksTable" id="">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Bank Name</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>                                        
                                    </div>
                                </div>                                
                            </div>
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
            $('#logout').click(function() {
                logout();
            });
            $(window).load(function() {
                ///// TABLES/////
                loadBanksTable();
            });
            $('select').chosen({width: "100%"});
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd'
            });

            $('#bankSave').click(function() {
                saveBank();
            });

            $('#bankUpdate').click(function() {
                updateBank();
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




