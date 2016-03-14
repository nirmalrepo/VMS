<?php
require_once './include/MainConfig.php';
include './config/dbc.php';
?>
<!DOCTYPE html>
<html>
    <head>        
        <?php require_once './include/systemHeader.php'; ?>        
    </head>
    <body>
        <div id="wrap"><!-- class="bgCustome"-->
            <?php require_once './include/navBar.php'; ?>
            <div class="container-fluid">               
                <div class="row">                                 
                    <div class="col-md-12">
                        <div class="page-header">
                            <h3>Dispose Report</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-horizontal">
                                    <div class="row">

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="col-md-4 control-label text-right" for="date_from">Date from :</label>
                                                <div class="col-lg-4">
                                                    <div class="input-group">
                                                        <input class="form-control datepicker" id="date_from" type="text" data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label text-right" for="date_to">Date to :</label>
                                                <div class="col-lg-4">
                                                    <div class="input-group">
                                                        <input class="form-control datepicker" id="date_to" type="text" data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d'); ?>">
                                                    </div>
                                                </div>
                                                <button class="btn btn-info" id="gen_rep_btn">Generate</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" id="panel_hd">Common Sales Report</h3>
                                        <div class="pull-right">
                                            <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                                <i class="glyphicon glyphicon-filter"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="panel-body filterTableSearch">
                                        <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters=".date_range_vice_income_report_table" style="background-color: #f2dede;" />
                                    </div>
                                    <div class="scrollable" style="height: 300px; overflow-y: auto">
                                        <table class="table table-bordered table-hover datable date_range_vice_income_report_table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Customer</th>
                                                    <th>Job id</th>
                                                    <th>Job Date</th>
                                                    <th>Pay type</th>
                                                    <th class="text-center">Total Price</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                            <tfoot></tfoot>
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
            pageProtect();
            checkurl();
            $('#logout').click(function() {
                logout();
            });

            $(window).load(function() {
                customer_ComboBox(false, <?php echo $_SESSION['branch']; ?>);
            });
            $('#gen_rep_btn').click(function() {
                date_range_vice_income($('#date_from').val(), $('#date_to').val());
            });

            $('select').chosen({width: "100%"});
            $('.datepicker').datepicker();
            
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

