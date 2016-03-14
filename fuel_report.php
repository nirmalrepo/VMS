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
                            <h3>Fuel Report</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs" id="navtab">
                                    <li class="active col-md-3" style="margin-left: 0px;padding-right: 0px;"><a href="#tabone_tab" data-toggle="tab">Full Report</a></li>
                                    <li class="col-md-3" style="margin-left: 0px;padding-left: 0px;"><a href="#tabtwo_tab" data-toggle="tab">By branch</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabone_tab"> 
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-horizontal">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="" class="col-md-4 control-label">Branch: </label>
                                                            <div class="col-md-5 braComboDivfull input-group">
                                                                <select class="branchComboBox" id="rp_branch_full"></select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="fuel_report_to" class="col-md-4 control-label">From :</label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control datepicker" name="fromDate" id="fuel_report_from_full" value="<?php echo date("Y-m-d"); ?>" data-date-format="yyyy-mm-dd">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="fuel_report_from" class="col-md-4 control-label">To :</label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control datepicker" name="toDate" id="fuel_report_to_full" value="<?php echo date("Y-m-d"); ?>" data-date-format="yyyy-mm-dd">
                                                            </div>
                                                            <button class="btn btn-success" name="genarate" type="submit" id="fuel_full_report_genarate_btn">Generate</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <hr>
                                        <div class="col-md-12">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading" id="panhead">
                                                    <h3 class="panel-title">Fuel Details</h3>
                                                    <div class="pull-right">
                                                        <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                                            <i class="glyphicon glyphicon-filter"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="panel-body filterTableSearch">
                                                    <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters=".fuel_report_Table"/>
                                                </div>
                                                <div class="scrollable" style="height: 200px; overflow-y: auto">
                                                    <table class="table table-bordered table-striped table-hover datable fuel_full_report_Table" id="table1">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Register No</th>
                                                                <th>Quantity of Fuel</th>
                                                                <th>Cost</th>
                                                                <th>Date</th>
                                                                <!--<th></th>-->
                                                            </tr>
                                                        </thead>
                                                        <tbody>                                                             
                                                        </tbody>
                                                        <tfoot>
                                                        </tfoot>
                                                    </table>
                                                    <input type="hidden" id="system_id">
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabtwo_tab">  
                                        <div class="row"> 
                                            <br>
                                            <div class="col-md-12">
                                                <div class="form-horizontal">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="" class="col-md-4 control-label">Branch: </label>
                                                            <div class="col-md-5 braComboDiv input-group">
                                                                <select class="branchComboBox" id="rp_branch"></select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="" class="col-md-4 control-label">Register No: </label>
                                                            <div class="col-md-5 input-group vehicleComboBoxDiv">
                                                                <select class="vehicleComboBox" id="rp_vehicle">
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="fuel_report_to" class="col-md-4 control-label">From :</label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control datepicker" name="fromDate" id="fuel_report_from" value="<?php echo date("Y-m-d"); ?>" data-date-format="yyyy-mm-dd">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="fuel_report_from" class="col-md-4 control-label">To :</label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control datepicker" name="toDate" id="fuel_report_to" value="<?php echo date("Y-m-d"); ?>" data-date-format="yyyy-mm-dd">
                                                            </div>
                                                            <button class="btn btn-success" name="genarate" type="submit" id="fuel_report_genarate_btn">Generate</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-md-12">
                                                <hr>
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading" id="panhead">
                                                        <h3 class="panel-title">Fuel Details</h3>
                                                        <div class="pull-right">
                                                            <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                                                <i class="glyphicon glyphicon-filter"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body filterTableSearch">
                                                        <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters=".fuel_report_Table"/>
                                                    </div>
                                                    <div class="scrollable" style="height: 200px; overflow-y: auto">
                                                        <table class="table table-bordered table-striped table-hover datable fuel_report_Table" id="table1">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Quantity of Fuel</th>
                                                                    <th>Cost</th>
                                                                    <th>Date</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>                                                             
                                                            </tbody>
                                                            <tfoot>
                                                            </tfoot>
                                                        </table>
                                                        <input type="hidden" id="system_id">
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
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
        $(function () {
            $('select').chosen({width: "100%"});
            pageProtect();
            checkurl();

            branchComboBox(false, function () {
                vehicleComboBox(false, function () {
                    fuel_management_table_load_report();
                    fuel_management_detailed_report();
                });
            });
            $('select').chosen({width: "100%"});

            //            fuel_management_table_load();

            //        $('#rp_vehicle').change(function() {
            //            fuel_management_table_load_report();
            //        });

            $('#fuel_report_genarate_btn').click(function () {
                var fromDate = $('#fuel_report_from').val();
                var toDate = $('#fuel_report_to').val();
                fuel_management_table_load_report(fromDate, toDate);
            });

            $('#rp_branch').change(function () {
                vehicleComboBox(false, function () {
                    fuel_management_table_load_report();
                });
            });
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd'
            });
            $('#fuel_full_report_genarate_btn').click(function () {
                var fromDate = $('#fuel_report_from_full').val();
                var toDate = $('#fuel_report_to_full').val();
                fuel_management_detailed_report(fromDate, toDate);
            });

            $('#rp_branch_full').change(function () {
                vehicleComboBox(false, function () {
                    fuel_management_detailed_report();
                });
            });

            //            branch_combo_box_load(false, function() {
            ////                alert($('#branchCombo').val());
            //                reg_no_load($('#branchCombo').val());
            //                vehicle_registration_tabele($('#branchCombo').val());
            //            });
            //
            //            $('#branchCombo').change(function() {
            //
            //                var branchVal = $(this).val();
            ////                alert(branchVal);
            //                reg_no_load(branchVal);
            //                vehicle_registration_tabele(branchVal);
            //            });


        });
    </script>
</html>

