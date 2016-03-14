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
                            <h3>Register New Branch</h3>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-horizontal">
                                    <input type="hidden" id="system_id">

                                    <div class="form-group">
                                        <label for="branch_name" class="col-lg-4 control-label">Branch Name:</label>
                                        <div class="col-lg-6">
                                            <input style="background-color: #d9edf7; font-weight: bold;" type="text" id="branch_name" class="form-control" placeholder="" required>
                                            <h6 style="color: red; font-weight: bold; margin-left: 5px;" id="branch_msg"></h6>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="brnch_address" class="col-lg-4 control-label">Address:</label>
                                        <div class="col-lg-6">

                                            <textarea id="brnch_address" class="form-control" rows="4" style="resize: none;" placeholder="" ></textarea>
                                        </div>
                                    </div>
                                    
                                    
<!--                                    <div class="form-group">
                                        <label for="brnch_phone" class="col-lg-4 control-label">Tel:</label>
                                        <div class="col-lg-6">
                                            <input type="text"  id="brnch_phone" class="form-control" maxlength="10" placeholder="ex: 011xxxxxxx" onkeypress="return isNumberKey(event)">
                                            <h6 style="color: red; font-weight: bold; margin-left: 5px;" id="phone_msg"></h6>
                                            <h6 style="color: green; font-weight: bold; margin-left: 5px;" id="phone_msgok"></h6>
                                        </div>
                                    </div>-->

                                    
                                    <div class="email_val form-group ">
                                        <label for="brnch_phone" class="col-lg-4 control-label">Tel:</label>
                                        <div class="col-lg-6">
                                            <div class="input-group col-lg-12">
                                            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                            <input type="text"  id="brnch_phone" class="form-control" maxlength="10" placeholder="ex: 011xxxxxxx" onkeypress="return isNumberKey(event)">
                                            </div>
                                            <h6 style="color: red; font-weight: bold; margin-left: 5px;" id="phone_msg"></h6>
                                            <h6 style="color: green; font-weight: bold; margin-left: 5px;" id="phone_msgok"></h6>
                                        </div>
                                        </div>
                                        
                                        
                                        
                                    <div class="email_val form-group ">
                                        <label for="brnch_email" class="col-lg-4 control-label">Email:</label>
                                        <div class="col-lg-6">
                                            <div class="input-group col-lg-12">
                                            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                            <input type="text" id="brnch_email" class="form-control" placeholder="Ex: example@gmail.com">
                                            </div>
                                            <h6 style="color: red; font-weight: bold; margin-left: 5px;" id="e_val"></h6>
                                            <h6 style="color: green; font-weight: bold; margin-left: 5px;" id="e_valok"></h6>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="email_val form-group ">
                                         <label for="brnch_fax" class="col-lg-4 control-label">Fax:</label>
                                        <div class="col-lg-6">
                                            <div class="input-group col-lg-12">
                                            <div class="input-group-addon"><i class="glyphicon glyphicon-print"></i></div>
                                            <input type="text" id="brnch_fax" onkeypress="return isNumberKey(event)" pattern="/^[0-9]+$/" class="form-control" maxlength="10"  placeholder="ex: 011xxxxxxx">
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    
                                    
<!--                                    <div class="form-group">
                                        <label for="brnch_fax" class="col-lg-4 control-label">Fax:</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="brnch_fax" onkeypress="return isNumberKey(event)" pattern="/^[0-9]+$/" class="form-control" maxlength="10"  placeholder="ex: 011xxxxxxx">
                                        </div>
                                    </div>-->

                                    <div class="form-group">
                                        <div class="col-lg-offset-4 col-lg-10">

                                            <span  id="branch_save_btn_div" class="">
                                                <button class="btn btn-success" id="Branch_save_btn"><i class="fa fa-save fa-lg"></i>&nbsp;Save</button>
                                            </span>

                                            <span  id="branches_updateBtn" class="hidden">
                                                <button class="btn btn-warning" id="branch_Update_btn"><i class="fa fa-edit fa-lg"></i>&nbsp;Update</button>
                                                <button class="btn btn-info" id="branch_clr_btn"><i class="fa fa-refresh fa-lg"></i>&nbsp;Clear</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Registered Branches</h3>


                                        <div class="pull-right">
                                            <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                                <i class="glyphicon glyphicon-filter"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="panel-body filterTableSearch">
                                        <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters=".registerd_branch_table"/>
                                    </div>
                                    <div class="scrollable" style="height: 300px; overflow-y: auto">
                                        <table class="table table-bordered table-striped table-hover datable registerd_branch_table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Branch Name</th>
                                                    <th>Phone</th>
                                                    <th></th>
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
            $('#logout').click(function() {
                logout();
            });

            $(window).load(function() {
                registerd_branch_table();
            });

            $('select').chosen({width: "100%"});

            $('#Branch_save_btn').click(function() {
                branch_Save();
            });


//phone number validation
            $('#brnch_phone').on('keyup', function() {
                var phoneval = $(this).val().length;
                if (phoneval == '0') {
                    $('#phone_msg').html('');
                    $('#Branch_save_btn').removeClass('hidden');
                    $('#phone_msgok').html('<i class="glyphicon glyphicon-ok-sign"></i> without phone number you can save this.');
                } else if (phoneval == '10') {
                    $('#Branch_save_btn').removeClass('hidden');
                    $('#phone_msg').html('');
                    $('#phone_msgok').html('<i class="glyphicon glyphicon-ok-sign"></i> valid Phone Number.');
                } else {
                    $('#Branch_save_btn').addClass('hidden');
                    $('#phone_msgok').html('');
                    $('#phone_msg').html('<i class="glyphicon glyphicon-warning-sign"></i> Sorry... Invalid Phone Number');
                }
            });



            $('#branch_clr_btn').click(function() {
                clear_branch_fields();
            });
            $('#branch_Update_btn').click(function() {
                update_branches($(this).val());
            });

            $('#bankUpdate').click(function() {
                bankUpdate();
            });

//////////E-mail Validation
            $('#brnch_email').on('keyup', function() {
                if ($(this).val() !== "") {
                    var valid = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(this.value) && this.value.length;
                    if (valid) {

                        $('.email_val').removeClass('has-error');
                        $('#e_val').html('');
                        $('#e_valok').html('<i class="glyphicon glyphicon-ok-sign"></i> E-Mail address is valid.');
                        $('#Branch_save_btn').removeClass('hidden');
                    } else {
                        $('.email_val').addClass('has-error');
                        $('#e_valok').html('');
                        $('#e_val').html('<i class="glyphicon glyphicon-warning-sign"></i> E-Mail address is not valid.');
                        $('#Branch_save_btn').addClass('hidden');
                    }

                } else {
                    $('.email_val').removeClass('has-error');
                    $('#e_val').html('');
                    $('#e_valok').html('<i class="glyphicon glyphicon-ok-sign"></i> without E-mail you can save this. ');
                    $('#Branch_save_btn').removeClass('hidden');
                }
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

