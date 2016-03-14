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
                            <h3>Dispose Reports</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-offset-4 col-md-4">
                                        <label class="col-md-4">Branch</label>
                                        <div class="col-md-6">
                                            <select class="branchCombo" id="branchCombo"><option></option></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-offset-4 col-md-4">
                                        <label class="col-md-4">Register No</label>
                                        <div class="col-md-6">
                                            <select class="regCombo" id="regCombo"><option></option></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-horizontal col-md-offset-4 ">

                                        <label class="col-md-2">Generate Using:</label>
                                        <div class="col-md-3">
                                            <input type="radio" name="radio1" value="1" id="wardRadio" class="rad " checked>&nbsp;&nbsp;&nbsp;By Branch
                                            <input type="radio" name="radio1" value="2" id="streetRadio" class="rad">&nbsp;&nbsp;&nbsp;By Reg.No.
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-md btn-info " id="generate_repair_forms_btn" style="margin-left: 5px;">Generate</button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Dispose Vehicle Informations</h3>
                                                <div class="pull-right">
                                                    <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                                        <i class="glyphicon glyphicon-filter"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="panel-body filterTableSearch">
                                                <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters=".vehicle_repair_data_table"/>
                                            </div>
                                            <div class="scrollable" style="height: 350px; overflow-y: auto">
                                                <table class="table table-bordered table-striped table-hover datable vehicle_repair_data_table" id="table2">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Date</th>
                                                            <th>Sell Amount</th>                                                                   
                                                            <th class="thead">Register No</th>
                                                            <th>Type</th>
                                                            <th>Action</th>
                                                            <!--<th>View</th>-->
                                                            <!--<th></th>-->
                                                        </tr>
                                                    </thead>
                                                    <tbody>                                                             
                                                    </tbody>
                                                </table>
                                                <input type="hidden" id="rp_id">
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
                                                <div class="row-fluid">

                                                    <div class="col-md-3"> <a class=" thumbnail fancybox" rel="gallerys" href="js/fancyBox/img/c/classic-corvette.jpg" title="">
                                                            <img  src="js/fancyBox/img/c/classic-corvette.jpg" alt=""  style="height: 100px;width: 150px"/>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3"> <a class="thumbnail fancybox" rel="gallerys" href="js/fancyBox/img/c/582383_18399318_1962_Chevrolet_Corvette.jpg" title="">
                                                            <img  src="js/fancyBox/img/c/582383_18399318_1962_Chevrolet_Corvette.jpg" alt="" style="height: 100px; width: 150px" />
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3"> <a class="thumbnail fancybox" rel="gallerys" href="js/fancyBox/img/c/582383_18399318_1962_Chevrolet_Corvette.jpg" title="">
                                                            <img  src="js/fancyBox/img/c/582383_18399318_1962_Chevrolet_Corvette.jpg" alt="" style="height: 100px;width: 150px" />
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3"> <a class="thumbnail fancybox" rel="gallerys" href="js/fancyBox/img/c/582383_18399316_1962_Chevrolet_Corvette.jpg" title="">
                                                            <img  src="js/fancyBox/img/c/582383_18399316_1962_Chevrolet_Corvette.jpg" alt="" style="height: 100px;width: 150px" />
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="row-fluid">
                                                    <div> <a class=" fancybox" rel="gallerys" href="js/fancyBox/img/2_bb.jpg" title="">
                                                            <img  src="js/fancyBox/img/2_ss.jpg" alt="" style="height: 100px;" />
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="row-fluid">
                                                    <div> <a class=" fancybox" rel="gallerys" href="js/fancyBox/img/2_bb.jpg" title="">
                                                            <img  src="js/fancyBox/img/2_ss.jpg" alt="" style="height: 100px;" />
                                                        </a>
                                                    </div>
                                                </div>
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
        $(function () {
            $('select').chosen({width: "100%"});
            pageProtect();
            checkurl();
            branch_combo_box_load(false, function () {
                reg_no_load($('#branchCombo').val());
                vehicle_registration_tabele($('#branchCombo').val());
            });

            $('#branchCombo').change(function () {

                var branchVal = $(this).val();
                reg_no_load(branchVal);
                vehicle_registration_tabele(branchVal);
            });
            $('#generate_repair_forms_btn').click(function () {
                var branchCombo = $('#branchCombo').val();
                var regCombo = $('#regCombo').val();
                var i = $('.rad:checked').val();

                generate_dispose_table(branchCombo, regCombo, i);
                $('#table2').removeClass('hidden');
                if (i == 2) {
                    $('.thead').addClass('hidden');
                }
                else {
                    $('.thead').removeClass('hidden');
                }
//                $('#table2').removeClass('hidden');
            });

        });
    </script>
</html>

