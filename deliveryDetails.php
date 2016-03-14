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
                            <div class="row">
                                <div class="col-lg-2">
                                    <h3>Delivery Details</h3>
                                </div>
                                <div class="col-lg-5 hidden">
                                    <div class="form-horizontal" style="margin-top: 20px;">
                                        <div class="form-group">
                                            <label for="system_name" class="col-lg-4 control-label">Search Type</label>
                                            <div class="col-lg-7">
                                                <input style="background-color: #eeb956;" type="radio" value="1" name="radio" id="bydefult" class="radio radio-inline" placeholder="" checked=""/>&nbsp;&nbsp;&nbsp;<b>By Invoice</b>
                                                &nbsp;&nbsp;<input style="background-color: #c9e2b3;" type="radio" value="2" name="radio" id="bycustomer" class="radio radio-inline" placeholder="" />&nbsp;&nbsp;&nbsp;<b>By Customer</b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-horizontal">
                                    <input type="hidden" id="deliv_id">
                                    <input type="hidden" id="qtyy_id">
                                    <input type="hidden" id="delveredQty">

                                    <div class="form-group hidden">
                                        <label for="branch" class="col-md-4 control-label">Branch:</label>
                                        <div class="col-md-6 branchcomboDiv">
                                            <input class="branchComboBox" readonly="" id="branchComboBox" value="<?php echo $_SESSION['branch']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group hidden" id="cusArea">
                                        <label for="customer_reg_no" class="col-lg-4 control-label">Customer:</label>
                                        <div class="col-lg-5">
                                            <select class="customer" id="customer"></select>  
                                        </div>
                                        <div class="col-lg-2">
                                            <input class="form-control" id="cusID" readonly="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="system_name" class="col-lg-4 control-label">Job Id :</label>
                                        <div class="col-lg-7">
                                            <select id="jobComboBox" class="form-control jobComboBox" placeholder=""></select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="system_name" class="col-lg-4 control-label">Selected Item</label>
                                        <div class="col-lg-7">
                                            <textarea id="jobDesc" class="form-control" placeholder="" rows="2" style="background-color: #ffc; resize: none; color: #843534;" readonly=""></textarea>
                                            <input class="form-control" readonly="" id="orderdQty" value="" style="color: #843534; background-color: #ffc;">
                                            <input class="form-control" readonly="" id="DleverdQty" value="" style="color: #843534; background-color: #ffc;">
                                            <input type="hidden" class="form-control" readonly="" id="itemID" value="" style="color: #843534; background-color: #ffc;">
                                            <input type="hidden" class="form-control" readonly="" id="jobItemTblID" value="" style="color: #843534; background-color: #ffc;">
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label for="system_name" class="col-lg-4 control-label">Delivery ID :</label>
                                        <div class="col-lg-7">
                                            <input type="text" id="delivery_id" class="form-control" placeholder="Delivery ID" readonly="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="system_name" class="col-lg-4 control-label">Delivery Qty :</label>
                                        <div class="col-lg-7">
                                            <input type="text" id="delivery_qty" style="background-color: #d9edf7; font-weight: bold;" class="form-control" placeholder="Delivery Qty" onkeypress="return isNumberKey(event)">
                                            <h6 style="color: red; font-weight: bold; margin-left: 5px;" id="delivery_msg"></h6>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="system_name" class="col-lg-4 control-label">Delivery Date:</label>
                                        <div class="col-lg-7">
                                            <input type="text" id="delivery_date" class="form-control datepicker" value="<?php echo date('Y-m-d'); ?>" placeholder="Delivery Date" >
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-lg-offset-4 col-lg-10">

                                            <span  id="systemdataSaveActionBtn" class="">
                                                <button class="btn btn-success" id="deliveryDataSave"><i class="fa fa-save fa-lg"></i>&nbsp;Save</button>
                                            </span>

                                            <span  id="DeliverydataActionBtn" class="">                                                
                                                <button class="btn btn-warning hidden" id="systemdataUpdate"><i class="fa fa-check-square-o fa-lg"></i>&nbsp;Update</button>
                                            </span>
                                            <span  id="deliveryReset" class="">                                                
                                                <button class="btn btn-info hidden" id="deliveryreset"><i class="fa fa-refresh fa-lg"></i>&nbsp;Reset</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 hidden" id="penOder" >
                                <div class="panel panel-primary">
                                    <div class="panel-heading" style="background-color: #dff0d8;">
                                        <h3 class="panel-title" style="color: black;">Pending Orders</h3>
                                        <div class="pull-right">
                                            <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body" style="color: #000;">
                                                <i class="glyphicon glyphicon-filter"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="panel-body filterTableSearch">
                                        <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters=".delivery_table"/>
                                    </div>
                                    <div class="scrollable" style="height: 200; overflow-y: auto">
                                        <table class="table table-bordered table-striped table-hover datable job_registration_data_table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Job Id</th>
                                                    <th>Date</th>
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
                            <div class="col-md-7">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Available Items</h3>
                                        <div class="pull-right">
                                            <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                                <i class="glyphicon glyphicon-filter"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="panel-body filterTableSearch">
                                        <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters=".delivery_table"/>
                                    </div>
                                    <div class="scrollable" style="height: 200px; overflow-y: auto">
                                        <table class="table table-bordered table-striped table-hover datable delivery_table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>                                                                
                                                    <th>Description</th>
                                                    <th>QTY</th>
                                                    <th>Unit Price</th>
                                                    <th>Discount</th>
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
        <?php // require_once './include/footerBar.php'; ?>
        <?php require_once './include/systemFooter.php'; ?>
    </body>
    <script type="text/javascript">
        $(function() {
            pageProtect();
            checkurl();
            get_delevery_id($('.branchComboBox').val());
            job_ComboBox($('.branchComboBox').val(), null, function() {
                getJobDescription();
                delivery_table();
            });
            customer_ComboBox(null, $('.branchComboBox').val(), function() {
                job_registration_data_ForDilivary();
            });

            $('#logout').click(function() {
                logout();
            });
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd'
            });
            $('select').chosen({width: "100%"});
            
            $('#deliveryDataSave').click(function() {
                deliveryDataSave();
            });
            $('#systemdataUpdate').click(function() {
                systemdataUpdate();
            });
            $('#delivery_qty').keyup(function() {
                    //fire message on callback to set value in hidden field
                    var qty = Number($('#delivery_qty').val());
                    var qtyhide = Number($('#qtyy_id').val());                
                    var deliveredQty = Number($('#delveredQty').val());
                    var typeTot = parseFloat(deliveredQty) + parseFloat(qty);
                    if (Number(typeTot) > Number(qtyhide)) {
                        $('#systemdataSaveActionBtn').addClass('hidden');
                        $('#delivery_msg').html('Delivered Qty is greater than ordered Qty');
                    } else {
                        $('#systemdataSaveActionBtn').removeClass('hidden');
                        $('#delivery_msg').html('');
                    }
            });
            $('#deliveryreset').click(function() {
                get_delevery_id($('.branchComboBox').val());
                $('#systemdataUpdate').addClass('hidden');
                $('#deliveryDataSave').removeClass('hidden');
                $('#deliveryreset').addClass('hidden');
            });
            $('#jobComboBox').change(function() {
               // getJobDescription();
                delivery_table($(this).val());
            });

            $('#customer').change(function() {
                $('#cusID').val($(this).val());
            });

            $('#bydefult').click(function() {
                $('#cusArea').addClass("hidden");
                $('#penOder').addClass("hidden");
            });

            $('#bycustomer').click(function() {
                $('#cusArea').removeClass("hidden");
                $('#penOder').removeClass("hidden");
            });

            $('#customer').change(function() {
                $('#cusID').val($(this).val());
                job_registration_data_ForDilivary();
            });

$(document).ready(function()
            {
                $(document).bind("contextmenu", function(e) {
                    alert('Sorry! right click option disabled in this system');
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

