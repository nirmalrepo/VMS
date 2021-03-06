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
                            <h3>Vehicle Repairing</h3>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-horizontal">
                                    <input type="hidden" id="system_id">

                                    <div id="main_reg_data">
                                        <div class="form-group">
                                            <label for="" class="col-md-4 control-label">Branch: </label>
                                            <div class="col-md-5 braComboDiv input-group">
                                                <select class="branchComboBox" id="rp_branch"></select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="col-md-4 control-label">Register No: </label>
                                            <div class="col-md-5 vehicleComboDiv input-group">
                                                <select class="vehicleComboBox" id="rp_vehicle">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hidden">
                                            <label class="col-md-4 " style="text-align: right">V ID</label>
                                            <div class="col-md-5"> 
                                                <input type="text" class="vid form-control" id="vid">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="system_name" class="col-md-4 control-label required-field">Date :</label>
                                            <div class="col-md-5 input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                <input type="text" id="rp_date" class="form-control datepicker" data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="po_number" class="col-lg-4 control-label required-field">Comment:</label>
                                            <div class="col-md-5 input-group">
                                                <!--<input type="text" onkeypress="return isNumberKey(event)" maxlength="12" id="po_number" class="form-control" placeholder="PO Number" >-->
                                                <!--<input type="text" id="po_number" class="form-control" placeholder="" >-->
                                                <textarea id="rp_desc" class="form-control">
                                                    
                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="po_date" class="col-lg-4 control-label required-field">Repair Place:</label>
                                            <div class="col-md-5 input-group">
                                                <input type="text"  id="rp_place" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="po_date" class="col-lg-4 control-label required-field">Cost:</label>
                                            <div class="col-md-5 input-group">
                                                <input type="text"  id="rp_cost" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-4 col-lg-10">

<!--                                                <span  id="vehi_reg_save_btn_div" class="">
                                                    <button class="btn btn-info" id="vehi_rep_save_btn"><i class="fa fa-sign-in fa-lg"></i>&nbsp;Save</button>
                                                    <button class="btn btn-success" id="itm_add_btn"><i class="fa fa-save fa-lg"></i>&nbsp;Add Item</button>
                                                </span>-->

                                                <span  id="vehicle_rep_update_btn_div" class="hidden">
                                                    <button class="btn btn-warning" id="vehicle_rep_Update_btn"><i class="fa fa-check-square-o fa-lg"></i>&nbsp;Update</button>
                                                    <button class="btn btn-info" id="job_reg_reset_btn"><i class="fa fa-refresh fa-lg"></i>&nbsp;Clear</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>



                            <!--T A B L E      D I V--> 
                            <div class="col-md-7">
                                <div id="main_data_table_div">
                                    <div class="panel panel-primary" style="border-color: #304483;">
                                        <div class="panel-heading" style="background-color:#304483">
                                            <h3 class="panel-title">Vehicle Repairing Informations</h3>
                                            <div class="pull-right">
                                                <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                                    <i class="glyphicon glyphicon-filter"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="panel-body filterTableSearch">
                                            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters=".vehicle_repair_data_table"/>
                                        </div>
                                        <div class="scrollable" style="height: 220px; overflow-y: auto">
                                            <table class="table table-bordered table-striped table-hover datable vehicle_repair_data_table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Date</th>
                                                        <th>Comment</th>                                                                   
                                                        <th>Place</th>
                                                        <th>Cost</th>
                                                        <th>Action</th>
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
                        <hr>
                        <div class="row">
                            <div class="col-md-9">
                                <div id="uploaded_imgs" class="clearfix">
                                    <div id="carouFredSelwrapper">
                                        <div id="carousel" style="padding-left:10px;margin-left: 55px">
                                        </div>
                                        <a id="prev" href="#"></a>
                                        <a id="next" href="#"></a>
                                        <div id="pager"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-6">

                                        <button type="button" id="imguploader_repair_btn" class="btn btn-block btn-primary" data-toggle="modal" data-target="#model4" style=" width: 150px;height:60px">
                                            <i class="fa fa-upload"></i>&nbsp;Upload Images</button>
                                    </div>
                                    <span  id="vehi_reg_save_btn_div" class="">
                                        <button class="btn btn-success" id="vehi_rep_save_btn" style=" width: 150px;height:60px"><i class="fa fa-sign-in fa-lg"></i>&nbsp;Save</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="model4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="cls close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Upload Images</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span id="imgname" class="form-control"></span>
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="button" id="browsebtn">Browse</button>
                                    </div>
                                </div>
                                <form method="post" enctype="multipart/form-data"  action="upload.php" class="hide">
                                    <input type="file" name="images[]" id="images" multiple />
                                    <button type="submit" id="btn" class="hide">Upload Files!</button>
                                </form>
                                <div id="response"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default cls" data-dismiss="modal" id="cls">Close</button>
                        <button type="button" class="btn btn-primary" id="upbtn">Upload</button>
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
            checkurl();
            branchComboBox(false, function () {
                vehicleComboBox(false, function () {
                    var branchID = $('#rp_branch').val();
                    var rpv = $('#rp_vehicle').val();
                    var regID = $('#rp_vehicle option[value=' + rpv + ']').html();
                    vid_val_load_for_repair(branchID, regID, function () {
                        var brid = $('#rp_branch').val();
                        var vid = $('#vid').val();
                        var mkdir = brid + '-'.concat(vid);
                        model_view_slide_repair(mkdir);
                    });
                    repair_vehicle_table();
                });
            });

            $('select').chosen({width: "100%"});


            $('#vehi_rep_save_btn').click(function () {
                vehicleRepSave();
            });

            $('#vehicle_rep_Update_btn').click(function () {
                update_vehicle_repair($('#rp_id').val());
            });

            $('#rp_vehicle').change(function () {
                var branchID = $('#rp_branch').val();
                var rpv = $('#rp_vehicle').val();
                var regID = $('#rp_vehicle option[value=' + rpv + ']').html();
                vid_val_load_for_repair(branchID, regID, function () {
                    var brid = $('#rp_branch').val();
                    var vid = $('#vid').val();
                    var mkdir = brid + '-'.concat(vid);
                    model_view_slide_repair(mkdir);
                });
                clear_vehicle_repair();
                repair_vehicle_table();
            });

            $('.branchComboBox').change(function () {
                vehicleComboBox(false, function () {
                    var branchID = $('#rp_branch').val();
                    var rpv = $('#rp_vehicle').val();
                    var regID = $('#rp_vehicle option[value=' + rpv + ']').html();
                    vid_val_load_for_repair(branchID, regID, function () {
                        var brid = $('#rp_branch').val();
                        var vid = $('#vid').val();
                        var mkdir = brid + '-'.concat(vid);
                        model_view_slide_repair(mkdir);
                    });

                    clear_vehicle_repair();
                    repair_vehicle_table();
                });
            });
            $('#browsebtn').click(function () {

                $('#images').click();
            });
            $('body').on('change', '#images', function () {
                $('#imgname').html($('#images').val());
            });
            $('#upbtn').click(function () {
                var input = document.getElementById("images");
                var brid = $('#rp_branch').val();
                var vid = $('#vid').val();
                var mkdir = brid + '-'.concat(vid);
                make_dir_repair(mkdir, function () {
                    upload_image_repair(input, function () {
                        model_view_slide_repair(mkdir);
//                        view_slide(mkdir);
                    });
                });

            });

            $('#job_reg_reset_btn').click(function () {
                empty_machine_repair_data_new();
                var branchID = $('#rp_branch').val();
                var rpv = $('#rp_vehicle').val();
                var regID = $('#rp_vehicle option[value=' + rpv + ']').html();
                vid_val_load_for_repair(branchID, regID, function () {
                    var brid = $('#rp_branch').val();
                    var vid = $('#vid').val();
                    var mkdir = brid + '-'.concat(vid);
                    model_view_slide_repair(mkdir);
                });
                repair_vehicle_table();
            });
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd'
            });

            //fancyBox
            $(".fancybox").fancybox({
                openEffect: 'none',
                closeEffect: 'none'
            });
        });
    </script>
</html>

