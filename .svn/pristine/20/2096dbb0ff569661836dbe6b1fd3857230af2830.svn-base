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
                            <h3>Job Registration</h3>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-horizontal">
                                    <input type="hidden" id="system_id">




                                    <div id="main_reg_data">
                                        <div class="form-group hidden">
                                            <label for="branch" class="col-md-4 control-label">Branch:</label>
                                            <div class="col-md-6 branchcomboDiv">
                                                <input class="branchComboBox" readonly="" id="branchComboBox" value="<?php echo $_SESSION['branch']; ?>">
                                                <input class="amila_malli" type="text" value="<?php
                                                if (isset($_POST['customer_id'])) {
                                                    $cus = $_POST['customer_id'];
                                                    echo $cus;
                                                } else {
                                                    echo $cus = '';
                                                }
                                                ?>">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="system_name" class="col-lg-4 control-label">Job Id :</label>
                                            <div class="col-lg-6 input-group">
                                                <input type="text" id="jobID" class="form-control" placeholder="" readonly="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="system_name" class="col-lg-4 control-label">Customer :</label>
                                            <div class="col-lg-4">
                                                <select id="customer" class="form-control customer" placeholder=""></select>
                                            </div>
                                            <div class="col-lg-2">
                                                <input type="text" id="cusID" class="form-control" placeholder="Reg NO." readonly="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="system_name" class="col-lg-4 control-label">Date :</label>
                                            <div class="col-lg-6 input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                <input type="text" id="date" class="form-control datepicker" data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="po_number" class="col-lg-4 control-label">PO No:</label>
                                            <div class="col-md-6 input-group">
                                                <input type="text" onkeypress="return isNumberKey(event)" maxlength="12" id="po_number" class="form-control" placeholder="PO Number" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="po_date" class="col-lg-4 control-label">PO Date:</label>
                                            <div class="col-md-6 input-group">
                                                <input type="text"  id="po_date" class="form-control datepicker" data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d'); ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-4 col-lg-10">

                                                <span  id="job_reg_save_btn_div" class="">
                                                    <button class="btn btn-default hidden" id="items_div_btn">Items&nbsp; <i class="fa fa-angle-double-right fa-lg"></i></button>
                                                    <button class="btn btn-info" id="start_job_btn"><i class="fa fa-sign-in fa-lg"></i>&nbsp;Start</button>
                                                    <!--<button class="btn btn-success" id="itm_add_btn"><i class="fa fa-save fa-lg"></i>&nbsp;Add Item</button>-->
                                                </span>

                                                <span  id="job_reg_update_btn_div" class="hidden">
                                                    <button class="btn btn-warning" id="job_reg_Update_btn"><i class="fa fa-check-square-o fa-lg"></i>&nbsp;Update</button>
                                                    <button class="btn btn-info" id="job_reg_reset_btn"><i class="fa fa-refresh fa-lg"></i>&nbsp;Clear</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>





                                    <div id="itam_reg_data" class="hidden">
                                        <div class="form-group">
                                            <label for="system_name" class="col-lg-4 control-label">Description :</label>
                                            <div class="col-md-6 input-group">
                                                <textarea type="text" id="description" class="form-control" placeholder="" style="resize: none; background-color: #d9edf7; font-weight: bold;" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="system_name" class="col-lg-4 control-label">Quantity :</label>
                                            <div class="col-md-6 input-group">
                                                <input type="number" onkeypress="return isNumberKey(event)" id="qun" class="form-control" placeholder="Quantity" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="system_name" class="col-lg-4 control-label">Unit Price :</label>
                                            <div class="col-md-6 input-group">
                                                <span class="input-group-addon">Rs</span>
                                                <input type="text" onkeypress="return isNumberKey(event)" maxlength="12" id="uPrice" class="form-control" placeholder="Unit Price" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="system_name" class="col-lg-4 control-label">Discount Rate :</label>
                                            <div class="col-md-6 input-group">
                                                <input type="text" onkeypress="return isNumberKey(event)" maxlength="5" id="discount" class="form-control" placeholder="Discount Rate" >
                                                <span class="input-group-addon">%</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-4 col-lg-10">
                                                <span  id="job_reg_save_btn_div" class="">
                                                    <!--<button class="btn btn-info" id="start_job_btn"><i class="fa fa-sign-in fa-lg"></i>&nbsp;Start</button>-->
                                                    <button class="btn btn-default" id="back_btn"><i class="fa fa-angle-double-left fa-lg"></i>&nbsp;Back</button>
                                                    <button class="btn btn-success" id="itm_add_btn"><i class="fa fa-save fa-lg"></i>&nbsp;Add Item</button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-4 col-lg-10">
                                                <span  id="job_reg_save_btn_div" class="">
                                                    <button class="btn btn-primary btn-lg col-lg-5" id="compleate_job_reg_btn"><i class="fa fa-check fa-lg"></i>&nbsp;Complete</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>



                            <!--T A B L E      D I V--> 
                            <div class="col-md-7">
                                <div id="main_data_table_div">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Current Pending Jobs</h3>
                                            <div class="pull-right">
                                                <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                                    <i class="glyphicon glyphicon-filter"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="panel-body filterTableSearch">
                                            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters=".job_registration_data_table"/>
                                        </div>
                                        <div class="scrollable" style="height: 350px; overflow-y: auto">
                                            <table class="table table-bordered table-striped table-hover datable job_registration_data_table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Job Id</th>
                                                        <th>Customer</th>                                                                   
                                                        <th>Job Date</th>
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




                                <div id="item_details_table_div" class="hidden">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title" id="item_details_table_panel">Added Item Details</h3>
                                            <div class="pull-right">
                                                <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                                    <i class="glyphicon glyphicon-filter"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="panel-body filterTableSearch">
                                            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters=".job_registration_data_table"/>
                                        </div>
                                        <div class="scrollable" style="height: 350px; overflow-y: auto">
                                            <table class="table table-bordered table-striped table-hover datable" id="added_items_for_jobs_table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Description</th>
                                                        <th>Quantity</th>
                                                        <th>Unit Price</th>
                                                        <th>Discount Rate</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>                                                             
                                                </tbody>
                                            </table>
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
        $(function() {
            pageProtect();
            checkurl();
            getJobId($('#branchComboBox').val());

            customer_ComboBox(<?php echo array_key_exists('customer_id', $_POST) ? $_POST['customer_id'] : 'false'; ?>, $('#branchComboBox').val(), function() {
                job_registration_data_table();
            });

            $('#logout').click(function() {
                logout();
            });

            $('#job_reg_save_btn').click(function() {
            });
            $('#start_job_btn').click(function() {
                save_jobs_fnc();
            });
            $('#items_div_btn').click(function() {
                $('#itam_reg_data').removeClass("hidden");
                $('#main_reg_data').addClass("hidden");
                $('#main_data_table_div').addClass("hidden");
                $('#item_details_table_div').removeClass("hidden");
            });
            $('#back_btn').click(function() {
                $('#itam_reg_data').addClass("hidden");
                $('#main_data_table_div').removeClass("hidden");
                $('#item_details_table_div').addClass("hidden");
                $('#main_reg_data').removeClass("hidden");
                $('#items_div_btn').removeClass("hidden");
            });
            $('#compleate_job_reg_btn').click(function() {
                clear_jobs_form_fields();
                $('#itam_reg_data').addClass("hidden");
                $('#main_reg_data').removeClass("hidden");
                getJobId($('#branchComboBox').val());
                $('#main_data_table_div').removeClass("hidden");
                $('#item_details_table_div').addClass("hidden");
                $('#start_job_btn').prop("disabled", false);
                customer_ComboBox(<?php echo array_key_exists('customer_id', $_POST) ? $_POST['customer_id'] : 'false'; ?>, $('#branchComboBox').val(), function() {
                    job_registration_data_table();
                });
            });
            $('#itm_add_btn').click(function() {
                add_items_for_jobs();
            });

            $('#job_reg_Update_btn').click(function() {
                update_jobs_fnc($(this).val());
            });

            $('#discount').keyup(function() {
                if ($(this).val() > 100) {
                    $('#discount').val(100);
                }
            });

            $('#job_reg_reset_btn').click(function() {
                clear_jobs_form_fields();
                $('#job_reg_update_btn_div').addClass("hidden");
                $('#job_reg_save_btn_div').removeClass("hidden");
                $('#start_job_btn').removeClass("hidden");
                getJobId($('#branchComboBox').val());
            });


            $('#customer').change(function() {
                $('#cusID').val($(this).val());
                job_registration_data_table();
            });

            $('select').chosen({width: "100%"});
            $('.datepicker').datepicker();

            $(document).ready(function() {
                $(document).bind("contextmenu", function(e) {
                    return false;
                });
            });

            document.onkeypress = function(event) {
                event = (event || window.event);
                if (event.keyCode == 123) {
                    //alert('No F-12');
                    return false;
                }
            }
            document.onmousedown = function(event) {
                event = (event || window.event);
                if (event.keyCode == 123) {
                    //alert('No F-keys');
                    return false;
                }
            }
            document.onkeydown = function(event) {
                event = (event || window.event);
                if (event.keyCode == 123) {
                    //alert('No F-keys');
                    return false;
                }
            }
        });
    </script>
</html>

