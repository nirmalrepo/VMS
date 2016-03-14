<div class="navbar navbar-default navbar-fixed-top hidden-print" role="navigation">

    <div class="row">
        <div class="navbar-header">            
            <a class="navbar-brand" href="dashboard.php" style="padding-left: 25px;"><strong>VMS</strong></a>
            <ul class="nav navbar-nav navbar-right">                
                <li><a href="#">Welcome <?php echo $_SESSION['user_name'] ?></a></li>  
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-11">
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">

                    <li class="active" style="padding-left: 10px;"><a href="dashboard.php" class="btn btn-primary"><i class="fa fa-lg fa-home"></i>&nbsp;&nbsp;Home</a></li>                 
                    <?php
                    $data = array();
                    $quary = "SELECT
                          in_usrprvlg.usrID,
                          in_sysprvlg.usrPrvMnuName,
                          in_sysprvlg.usrPrvMnuIcon,
                          in_sysprvlg.usrPrvMnuPath,
                          in_usrprvlg.usrPrvCode
                          FROM
                          in_sysprvlg
                          INNER JOIN in_usrprvlg ON in_usrprvlg.usrPrvCode = in_sysprvlg.prvCode
                          WHERE in_usrprvlg.usrID = '{$_SESSION['user_id']}'";
                    MainConfig::connectDB();
                    $getLogeduser = mysql_query($quary)or die(mysql_error());
                    MainConfig::closeDB();
                    if (!empty($getLogeduser)) {
                        while ($row = mysql_fetch_assoc($getLogeduser)) {
                            $data[] = $row;
                        }
                        foreach ($data AS $aa) {
                            echo '<li class="active stylecss"><a href="' . $baseURL . '/' . $aa['usrPrvMnuPath'] . '">' . $aa['usrPrvMnuName'] . '</a></li>         ';
                        }
                    }
                    ?>  
                </ul>
            </div>
        </div>
        <div class="col-lg-1">
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right">
                    <li class="active pull-right" style="padding-right: 10px;"><button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">
                            Logout
                        </button></li>    
                </ul>
            </div>
        </div>
    </div>
</div>
<!--Model-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="opacity: 0.8;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="color: #000"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"><b>Logout</b></h4>
            </div>
            <div class="modal-body">
                <b>Do you want to continue?</b>
            </div>
            <div class="modal-footer">

                <a href="logouts.php" id="logout"> <button type="button" class="btn btn-success">YES</button></a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
            </div>
        </div>
    </div>
</div>

