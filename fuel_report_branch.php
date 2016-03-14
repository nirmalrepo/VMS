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
                            <h3>Fuel Report- Detailed</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-horizontal">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="col-md-4 control-label">Branch: </label>
                                            <div class="col-md-5 braComboDiv input-group">
                                                <select class="branchComboBox" id="rp_branch"></select>
                                            </div>
                                        </div>

<!--                                        <div class="form-group">
                                            <label for="" class="col-md-4 control-label">Register No: </label>
                                            <div class="col-md-5 input-group vehicleComboBoxDiv">
                                                <select class="vehicleComboBox" id="rp_vehicle">
                                                </select>
                                            </div>
                                        </div>-->
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
                            <table class="table table-bordered table-striped table-hover datable fuel_report_Table" id="table1">
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
        </div>
    </div>
</div>
<div class="modal fade" id="model2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Report</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!--                            <div class="well">
                                                    <div id="gallerys" class="carousel slide" style="height:160px;padding-top:25px;padding-bottom:0px;">
                                                        <div class="row-fluid">
                                                            <div class="carousel-inner" style="margin-top: 0px;">
                                                                <div class="item active">
                                                                </div>
                                                                <div class="item">
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="row-fluid">
                                                            <ol class="carousel-indicators">
                                                                <li data-target="#gallerys" data-slide-to="0" class=""></li>
                                                                <li data-target="#gallerys" data-slide-to="1" class="active"></li>
                                                                <li data-target="#gallerys" data-slide-to="2" class="active"></li>
                                                            </ol>
                                                            <a class="carousel-control" href="#gallerys"style="padding-left: 0px;margin-top: 60px;" data-slide="next"><i class="fa fa-arrow-circle-left fa-lg"></i></a>
                                                            <br>
                                                            <a class="carousel-control" href="#gallerys" style="margin-left: 520px;margin-top: 60px;" data-slide="prev"><i class="fa fa-arrow-circle-right fa-lg"></i></a>
                                                        </div>
                                                    </div>
                                                </div>-->
                </div>
                <table class="table modal_table" id="table2" style="border: none">
                    <thead>
                    </thead>
                    <tbody> 
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Print</button>
            </div>
        </div>
    </div>
</div>
<?php // require_once './include/footerBar.php'; ?>
<?php require_once './include/systemFooter.php'; ?>
</body>
<script type="text/javascript">
    $(function() {
        $('select').chosen({width: "100%"});
        pageProtect();
        checkurl();

        branchComboBox(false, function() {
            vehicleComboBox(false, function() {
                fuel_management_detailed_report();
            });
        });
        $('select').chosen({width: "100%"});

        //            fuel_management_table_load();

//        $('#rp_vehicle').change(function() {
//            fuel_management_table_load_report();
//        });

        $('#fuel_report_genarate_btn').click(function() {
            var fromDate =$('#fuel_report_from').val();
            var toDate =$('#fuel_report_to').val();
            fuel_management_detailed_report(fromDate,toDate);
        });

        $('.branchComboBox').change(function() {
            vehicleComboBox(false, function() {
                fuel_management_detailed_report();
            });
        });
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
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

