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
        <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" id="systemUser">
        <input type="hidden" value="<?php echo date("h:i:s a"); ?>" id="systemTime">
        <input type="hidden" value="" id="discountTot">
        <div id="wrap"><!-- class="bgCustome"-->
            <?php require_once './include/navBar.php'; ?>
            <div class="container-fluid">               
                <div class="row">                                 
                    <div class="col-md-12">
                        <div class="page-header">
                            <h3>Invoice Data</h3>
                        </div>
                        <div class="row" style="margin-top: -10px;">
                            <div class="col-md-5">
                                <div class="form-horizontal">
                                    <input type="hidden" id="cushiddenid">

                                    <div class="form-group hidden">
                                        <label for="branch" class="col-md-4 control-label">Branch:</label>
                                        <div class="col-md-6 branchcomboDiv">
                                            <input class="branchComboBox" readonly="" id="branchComboBox" value="<?php echo $_SESSION['branch']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="customer_reg_no" class="col-lg-4 control-label">Customer:</label>
                                        <div class="col-lg-4">
                                            <select class="customer" id="customer"></select>  
                                        </div>
                                        <div class="col-lg-2">
                                            <input class="form-control" id="cusID" readonly="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="customer_name" class="col-lg-4 control-label">Invoice No:</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="invoNo" class="form-control" placeholder="Invoice No" readonly="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inv_po_number" class="col-lg-4 control-label">Production No:</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="inv_po_number" class="form-control" placeholder="PO Number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="customer_name" class="col-lg-4 control-label">Invoice Date:</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="date" class="form-control" placeholder="Date" value="<?php echo date('Y-m-d'); ?>" data-date-format="yyyy-mm-dd">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="customer_adress" class="col-lg-4 control-label">Job No:</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="jobNo" class="form-control" placeholder="Job No" readonly="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_person" class="col-lg-4 control-label">Price:</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="price" class="form-control" placeholder="Price" readonly="">
                                        </div>
                                    </div>                                  
                                    <div class="form-group">
                                        <label for="customer_reg_no" class="col-lg-4 control-label">Payment Type:</label>
                                        <div class="col-lg-6">
                                            <select class="payType" id="payType"></select>  
                                        </div>
                                    </div>
                                    <div class="form-group" id="cashAmountsection">
                                        <label for="contact_person" class="col-lg-4 control-label">Cash Amount:</label>
                                        <div class="col-lg-6">
                                            <input style="background-color: #d9edf7; font-weight: bold;" type="text" id="cashAmount" class="form-control" placeholder="Cash Amount" onkeypress="return isNumberKey(event)" >
                                            <h6 id="cashValidatMsg" style="color: red;"></h6>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="chequeAmountSection">
                                        <label for="contact_person" class="col-lg-4 control-label">Cheque Amount:</label>
                                        <div class="col-lg-6">
                                            <input style="background-color: #d9edf7; font-weight: bold;" type="text" id="chequeAmount" class="form-control" placeholder="Cheque Amount" onkeypress="return isNumberKey(event)" >
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="cheqNoSection">
                                        <label for="contact_person" class="col-lg-4 control-label">Cheque No:</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="chequeNo" class="form-control" placeholder="Cheque No">
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="bankSection">
                                        <label for="contact_person" class="col-lg-4 control-label">Bank:</label>
                                        <div class="col-lg-6">
                                            <select id="bank" class="form-control bank" placeholder="Discount" ></select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_person" class="col-lg-4 control-label">Discount:</label>
                                        <div class="col-lg-6 form-inline">
                                            <input type="text" id="discount" class="form-control col-lg-2" placeholder="Discount" readonly="">
                                            <button type="button" id="addDiscount" class="btn btn-info col-lg-4" style="font-size: 10px;">Add Discount</button>
                                            <button type="button" id="removediscount" class="btn btn-danger col-lg-4 hidden" style="font-size: 10px;">Remove</button>
                                        </div>
                                    </div>
                                    <!-- Multiple Radios (inline) -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="radios">VAT :</label>
                                        <div class="col-md-4"> 
                                            <label class="radio-inline" for="radios-0">
                                                <input name="radios" id="radios-0" value="1" class="vat_radio" checked="checked" type="radio">
                                                Yes
                                            </label>
                                            <label class="radio-inline" for="radios-1">
                                                <input name="radios" id="radios-1" value="0" class="vat_radio" type="radio">
                                                No
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-4 col-lg-10">
                                            <span  id="customerregSaveActionBtn" class="">
                                                <button class="btn btn-success col-lg-7" id="copleatInvo" disabled="" style="height: 40px;"><i class="fa fa-save fa-lg"></i>&nbsp;Compleat Invoice</button>
                                            </span>

                                            <span  id="cust_reg_ActionBtn" class="hidden">
                                                <button class="btn btn-warning" id="updateInvo"><i class="fa fa-edit fa-lg"></i>&nbsp;Update</button>
                                            </span>
                                            <span  id="reset_cust" class="hidden">
                                                <button class="btn btn-primary" id="resetInvo"><i class="fa fa-edit fa-lg"></i>&nbsp;Reset</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="panel panel-primary" style="background-color: #f0f7fd">

                                    <h3 class="panel-title" style="color: black; height: 25px; padding: 5px; font-weight: bold;">Available Jobs</h3>

                                    <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters=".jobDataTble" placeholder="Search Jobs" style="background-color: #f0f0f0;" />

                                    <div class="scrollable" style="height: 200px; overflow-y: auto">
                                        <table class="table table-bordered table-striped table-hover datable jobDataTble">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Job ID</th>
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


                                <div class="panel panel-primary" id="completedInvoSection">
                                    <div class="col-md-6" style="padding-top: 10px;">
                                        <div class="col-md-6">
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-addon">From:</span>
                                                <input type="text" style="background-color: #d9edf7;" id="date_tbl_from" class="datepicker form-control" placeholder="Date" value="<?php echo date('Y-m-d'); ?>" data-date-format="yyyy-mm-dd">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-addon">To:</span>
                                                <input type="text" style="background-color: #d9edf7;" id="date_tbl_to" class="datepicker form-control" value="<?php echo date('Y-m-d'); ?>" data-date-format="yyyy-mm-dd">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-danger" id="table_refresh_btn" type="button"><i class="fa fa-refresh"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Completed Invoices</h3>

                                        <div class="pull-right">
                                            <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                                <i class="glyphicon glyphicon-filter"></i>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="panel-body filterTableSearch">
                                        <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters=".copletedJobs"/>
                                    </div>
                                    <div class="scrollable" style="height: 300px; overflow-y: auto">
                                        <table class="table table-bordered table-striped table-hover datable copletedJobs">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Invoice No.</th>
                                                    <th>Customer</th>
                                                    <th>Date</th>
                                                    <th>Total Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                        <input type="hidden" id="system_id">
                                    </div>
                                </div>

                                <div class="hidden" id="underItems">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title" id="itemTblSelected">Available Items</h3>
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
                                            <table class="table table-bordered table-striped table-hover datable itemLastStsus">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>                                                                
                                                        <th>Description</th>
                                                        <th>Ordered QTY</th>
                                                        <th>Delivered QTY</th>
                                                        <th>Total Amount</th>
                                                        <th>Total Discount</th>
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
                getPayTypeCombo();
                getBanks();
                getInvoID();
                getCompletedInvoices();
                customer_ComboBox(null, $('.branchComboBox').val(), function() {
                    getUserRelatedJobs();
                });
            });
            $('select').chosen({width: "100%"});

            $('#date').datepicker();

            $('.payType').change(function() {
                var payType = $(this).val();
                if (payType == '1') {
                    $('#cashAmountsection').removeClass("hidden");
                    $('#chequeAmountSection').addClass("hidden");
                    $('#cheqNoSection').addClass("hidden");
                    $('#bankSection').addClass("hidden");
                } else {
                    $('#cashAmountsection').addClass("hidden");
                    $('#chequeAmountSection').removeClass("hidden");
                    $('#cheqNoSection').removeClass("hidden");
                    $('#bankSection').removeClass("hidden");
                }
            });

            $('#customer').change(function() {
                getUserRelatedJobs();
            });
            $('#table_refresh_btn').click(function() {
                getCompletedInvoices();
            });

            $('#addDiscount').click(function() {
                var cashAmount = $('#cashAmount').val();
                var chequeAmount = $('#chequeAmount').val();
                var discount = $('#discount').val();
                $('#discountTot').val(discount);
                var cashtot = parseFloat(cashAmount) - parseFloat(discount);
                var chequetot = parseFloat(chequeAmount) - parseFloat(discount);
                $('#cashAmount').val(cashtot.toFixed(2));
                $('#chequeAmount').val(chequetot.toFixed(2));
                $('#addDiscount').addClass("hidden");
                $('#removediscount').removeClass("hidden");
            });

            $('#removediscount').click(function() {
                var cashAmount = $('#cashAmount').val();
                var chequeAmount = $('#chequeAmount').val();
                var discount = $('#discount').val();
                $('#discountTot').val('0');
                var cashtot = parseFloat(cashAmount) + parseFloat(discount);
                var chequetot = parseFloat(chequeAmount) + parseFloat(discount);
                $('#cashAmount').val(cashtot.toFixed(2));
                $('#chequeAmount').val(chequetot.toFixed(2));
                $('#addDiscount').removeClass("hidden");
                $('#removediscount').addClass("hidden");
            });

            $('#copleatInvo').click(function() {
                document.getElementById("copleatInvo").disabled = true;
                compleatInvoice();
            });

            $('#customer').change(function() {
                $('#cusID').val($(this).val());
            });

            $('#cashAmount').keyup(function() {
                var typVal = $(this).val();
                var price = $('#price').val();
                if (parseFloat(typVal) > parseFloat(price)) {
                    $('#cashValidatMsg').html('Entered Amount Greater Than to Total Price');
                    $('#copleatInvo').addClass("hidden");
                } else {
                    $('#cashValidatMsg').html('');
                    $('#copleatInvo').removeClass("hidden");
                }
            });
            $('.datepicker').datepicker();

            $(document).ready(function()
            {
                $(document).bind("contextmenu", function(e) {
                    alert('Sorry! right click option disabled in this system');
                    return false;
                });
            });
        });
    </script>
</html>

