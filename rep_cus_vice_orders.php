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
                            <h3>Registered Vehicle Report</h3>
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
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-primary" style="border: none">
                                            <div class="panel-heading" id="panhead">
                                                <h3 class="panel-title">Registered Vehicles</h3>


                                                <div class="pull-right">
                                                    <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                                        <i class="glyphicon glyphicon-filter"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="panel-body filterTableSearch">
                                                <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters=".vehicle_save_Table"/>
                                            </div>
                                            <div class="scrollable" style="height: 200px; overflow-y: auto">
                                                <table class="table table-bordered table-striped table-hover datable vehicle_save_Table" id="table1">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Type</th>
                                                            <th>Brand</th>
                                                            <th>Reg.No</th>
                                                            <th>Manufacture Year</th>
                                                            <th>Value</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>                                                             
                                                    </tbody>
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
        <div class="modal fade" id="model2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header hide">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Report</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div id="uploaded_imgs" class="clearfix">
                                <div id="carouFredSelwrapper">
                                    <div id="carousel" style="padding-left:20px;margin-left: 0px">
                                    </div>
                                    <a id="prev" href="#"></a>
                                    <a id="next" href="#"></a>
                                    <div id="pager"></div>
                                </div>
                            </div>
                        </div>
                        <table class="table modal_table table-striped table-hover " id="table2" style="border: none">
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
                vehicle_registration_tabele_report($('#branchCombo').val());
            });
            $('#branchCombo').change(function () {

                var branchVal = $(this).val();
                vehicle_registration_tabele_report(branchVal);
            });


        });
    </script>
</html>

<div class="span12">
    <h2>SeeLive internet based TV channels</h2>
    <p>SeeLive lets you enjoy live, internet based TV channels alongside free-to-air TV.</p>
    <p> Here’s just a selection of SeeLive TV channels available:</p>
    <p style="text-align: center;">
        <em>
            <div class="row-fluid ">
                <div class="span3">
                    <a>
                        <span class="sliders">hfhfghgfhgf</span>
                        <img class="aligncenter  wp-image-3119" title="ABC 1" src="http://seebo.com.au/wp-content/uploads/2014/05/01.ABC_1.jpg" alt="01.ABC_1" width="200" height="200" />
                    </a>
                </div>
                <div class="span3  ">
                    <img class="aligncenter  wp-image-3120" title="ABC 2" src="http://seebo.com.au/wp-content/uploads/2014/05/01.ABC_2.jpg" alt="01.ABC_2" width="200" height="200" />
                </div>
                <div class="span3  ">
                    <img class="aligncenter  wp-image-3121" title="ABC 3" src="http://seebo.com.au/wp-content/uploads/2014/05/03.ABC_3.jpg" alt="03.ABC_3" width="200" height="200" />
                </div>
                <div class="span3  ">
                    <img class="aligncenter  wp-image-3122" title="ABC_4Kids" src="http://seebo.com.au/wp-content/uploads/2014/05/04.ABC_4Kids.jpg" alt="04.ABC_4Kids" width="200" height="200" />
                </div>
            </div>
        </em>
    </p>
</div>