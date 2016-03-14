<?php
require_once './include/MainConfig.php';
include './config/dbc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Banks</title> 
        <meta charset="UTF-8">
        <?php require_once './include/systemHeader.php'; ?>        
    </head>
    <body>
        <div id="wrap">
            <?php require_once './include/navBar.php'; ?>
            <div class="container">               
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h2>Vat And NBT</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-horizontal">
                                    <input type="hidden" id="bankID">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">Vat</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="vatval" class="form-control" placeholder="VAT" required>  
                                            <button class="btn btn-success" id="changevat"><i class="fa fa-save fa-lg"></i>&nbsp;Change VAT</button>   
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">NBT</label>
                                        <div class="col-lg-4">
                                            <input type="text" id="nbtval" class="form-control" placeholder="NBT" required>  
                                            <button class="btn btn-success" id="changeNbt"><i class="fa fa-save fa-lg"></i>&nbsp;Change NBT</button>   
                                        </div>
                                    </div>
                                </div>                 
                            </div>
                            <div class="col-lg-7">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Available Values</h3>
                                    </div>
                                    <div class="scrollable" style="height: 100px; overflow-y: auto">
                                        <table class="table table-bordered table-striped table-hover vatnbttbl" id="">
                                            <thead>
                                                <tr>
                                                    <th>VAT</th>
                                                    <th>NBT</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
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
            $('#logout').click(function() {
                logout();
            });
            loadvatnbt();

            $('#changevat').click(function() {
                chsngeVat();
            });

            $('#changeNbt').click(function() {
                chsngenbt();
            });
        });
    </script>
</html>




