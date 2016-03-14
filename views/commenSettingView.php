<?php

require_once '../class/ap_funtions.php';
require_once '../config/dbc.php';
require_once '../class/database.php';
require_once '../class/systemSetting.php';
require_once '../class/functionsByKIT.php';
$system = new setting();
$database = new database();
if (array_key_exists("action", $_POST)) {
    if ($_POST['action'] == 'branch_Save') {
        $branch_auto_inc_id = $system->getNextAutoIncrementID("in_branch");
        if (!empty($branch_auto_inc_id)) {
            $branch_name = $_POST['branch_name'];
            $brnch_address = $_POST['brnch_address'];
            $save_branch_main_data = $system->prepareCommandQuerySpecial("INSERT INTO `in_branch` (`brName`, `brAddress`, `brTel`, `brEmail`, `brFax`) VALUES ('{$branch_name}','{$brnch_address}','{$_POST['brnch_phone']}','{$_POST['brnch_email']}','{$_POST['brnch_fax']}')");
            if ($save_branch_main_data) {
                $svae_related_table = $system->prepareCommandQueryForAlertify("INSERT INTO `in_common_dt` (`brID`, `cusCount`, `jbCount`, `delCount`, `billCount`) VALUES ('{$branch_auto_inc_id}', 0, 0, 0, 0)", "Successfully saved data..!", "Sorry culd not save data..!");
            } else {
                echo json_encode(array(array("msgType" => 2, "msg" => "Error")));
            }
        } else {
            echo json_encode(array(array("msgType" => 2, "msg" => "Error")));
        }
    } elseif ($_POST['action'] == 'delivery_Save') {
        $dilivery_main_data = $system->prepareCommandQuerySpecial("INSERT INTO `invoicesys`.`in_delivery` (`brID`, `jbID`, `jbItemId`, `delID`, `delQty`, `delDt`) VALUES ('{$_POST['branchComboBox']}','{$_POST['jobComboBox']}','{$_POST['itemID']}','{$_POST['delivery_id']}','{$_POST['delivery_qty']}','{$_POST['delivery_date']}')");
        if ($dilivery_main_data) {
            $system->prepareCommandQueryForAlertify("UPDATE `in_common_dt` SET `delCount`= '{$_POST['delivery_id']}' WHERE (`brID` = '{$_POST['branchComboBox']}')", "Successfully saved data..!", "Sorry culd not save data..!");
        } else {
            echo json_encode(array(array("msgType" => 2, "msg" => "Sorry culd not save data..!")));
        }
    } elseif ($_POST['action'] == 'select_branches') {
        $system->prepareSelectQueryForJSON("SELECT
in_branch.brID,
in_branch.brName,
in_branch.brTel,
in_branch.brFax,
in_branch.brAddress,
in_branch.brEmail
FROM `in_branch`
WHERE
in_branch.brID = '{$_POST['branchID']}'");
    } elseif ($_POST['action'] == 'delevered_data_modal') {
        $system->prepareSelectQueryForJSON("SELECT
in_delivery.delQty AS aa,
in_delivery.delDt AS bb,
in_delivery.jbID AS cc,
in_branch.brName
FROM
in_job
INNER JOIN in_delivery ON in_delivery.jbID = in_job.jbID AND in_job.brID = in_delivery.brID
INNER JOIN in_branch ON in_job.brID = in_branch.brID
WHERE
in_job.aiID = '{$_POST['job_id']}'");
    } elseif ($_POST['action'] == 'delvaryselect') {
        $system->prepareSelectQueryForJSON("SELECT
in_delivery.aiID,
in_delivery.brID,
in_delivery.jbID,
in_delivery.delID,
in_delivery.delQty,
in_delivery.delDt
FROM `in_delivery`
WHERE
in_delivery.aiID = '{$_POST['deliID']}'");
    } elseif ($_POST['action'] == 'getbranchid') {
        $system->prepareSelectQueryForJSON("SELECT
(in_common_dt.delCount) + 1 AS delivrID
FROM
in_common_dt
INNER JOIN in_branch ON in_common_dt.brID = in_branch.brID
WHERE
in_branch.brID = '{$_POST['branID']}'");
    } elseif ($_POST['action'] == 'update_del_data') {
        $dilivery_data = $system->prepareCommandQuerySpecial("INSERT INTO `delivaryupdatalog` (`logSysUserId`, `logJobId`, `logDelId`, `logQty`, `logDate`) VALUES ('{$_POST['branchComboBox']}','{$_POST['jobComboBox']}','{$_POST['autodeli_id']}','{$_POST['delivery_qty']}',CURDATE())");
        if ($dilivery_data) {
            $system->prepareCommandQueryForAlertify("UPDATE `in_delivery` SET `brID`= '{$_POST['branchComboBox']}' ,`jbID`= '{$_POST['jobComboBox']}' ,`delQty`= '{$_POST['delivery_qty']}' ,`delDt`= '{$_POST['delivery_date']}' WHERE (`aiID` = '{$_POST['autodeli_id']}')", "Successfully update data..!", "Sorry culd not update data..!");
        } else {
            echo json_encode(array(array("msgType" => 2, "msg" => "Sorry culd not update data..!")));
        }
    } else if ($_POST['action'] == 'customersave') {
        $cus_name = mysql_real_escape_string($_POST['cus_name']);
        $cus_address1 = mysql_real_escape_string($_POST['cus_address1']);
        $cus_address2 = mysql_real_escape_string($_POST['cus_address2']);
        $cus_address3 = mysql_real_escape_string($_POST['city']);
        $cusdata = $system->prepareCommandQuerySpecial("INSERT INTO `in_customer` (`brID`, `cusID`, `perTlID`, `cusName`, `cusAddressOne`, `cusAddressTwo`, `cusAddressThree`, `cusContactPers`, `cusTel`, `cusContPerTel`, `cusOffTel`, `cusRegDt`, `vatRegNo`) VALUES ('{$_POST['branchComboDiv']}','{$_POST['cus_reg_no']}','{$_POST['titlecombo']}','{$cus_name}','{$cus_address1}','{$cus_address2}','{$cus_address3}','{$_POST['contactperson']}','{$_POST['office_number1']}','{$_POST['cont_tel_number']}','{$_POST['office_number2']}','{$_POST['reg_date']}','{$_POST['vat_reg_no']}')");
        if ($cusdata) {
            $sve_comman_table = $system->prepareCommandQueryForAlertify("UPDATE `in_common_dt` SET `cusCount`='{$_POST['cus_reg_no']}' WHERE (`brID`='{$_POST['branchComboDiv']}')", " Successfully Saved", "Sorry ..! Counld Not Be Saved ");
        } else {
            echo json_encode(array(array("msgType" => 2, "msg" => "Error")));
        }
    } elseif ($_POST['action'] == 'delete_branches') {
        $data = $system->prepareSelectQuery("SELECT
        in_common_dt.cusCount,
        in_common_dt.brID
        FROM
        in_common_dt
        WHERE in_common_dt.brID = '{$_POST['branchID']}'");
        if ($data) {
            if ($data[0]['cusCount'] > 0) {
                echo json_encode(array(array("msgType" => 2, "msg" => "System Data Available Under The This Branch")));
            } else {
                $system->prepareCommandQuerySpecial("DELETE FROM `in_common_dt` WHERE (`brID`='{$_POST['branchID']}')");
                $system->prepareCommandQueryForAlertify("DELETE FROM `in_branch` WHERE in_branch.brID  = '{$_POST['branchID']}'", "Successfully deleted data..!", "Sorry culd not delete data..!");
            }
        }
    } elseif ($_POST['action'] == 'getjobId') {
        $data = $system->prepareSelectQuery("SELECT
in_common_dt.brID,
(in_common_dt.jbCount) + 1 AS newCount
FROM
in_common_dt WHERE in_common_dt.brID = '{$_POST['branchID']}'");
        echo $data[0]['newCount'];
    } elseif ($_POST['action'] == 'update_branches') {
        $system->prepareCommandQueryForAlertify("UPDATE `in_branch` SET `brName`='{$_POST['branch_name']}', `brAddress`='{$_POST['brnch_address']}', `brTel`='{$_POST['brnch_phone']}', `brEmail`='{$_POST['brnch_email']}', `brFax`='{$_POST['brnch_fax']}' WHERE (`brID`='{$_POST['branch_id']}')", "Successfuly update..!", "Error..!");
    }
    ////////////// bank
    else if ($_POST['action'] == 'saveBank') {
        $bankName = mysql_real_escape_string($_POST['bankName']);
        $system->prepareCommandQueryForAlertify("INSERT INTO `invoicesys`.`in_banks` (`bank_name`) VALUES ('{$bankName}');
", "Successfully Saved Bank", "Sorry ! Could not be Save Bank");
    } else if ($_POST['action'] == 'bankDataSelect') {
        $system->prepareSelectQueryForJSON("SELECT
in_banks.id,
in_banks.bank_name
FROM `in_banks`
WHERE
in_banks.id = '{$_POST['id']}'");
    } else if ($_POST['action'] == 'updateBank') {
        $bankName = mysql_real_escape_string($_POST['bankName']);
        $system->prepareCommandQueryForAlertify("UPDATE `in_banks` SET `bank_name`='{$bankName}' WHERE (`id`='{$_POST['bankID']}');
", "Successfully Updated Bank Data", "Sorry ! Could Not Be Updated Bank Data");
    } else if ($_POST['action'] == 'deleteBank') {
        $system->prepareCommandQueryForAlertify("DELETE FROM `in_banks` WHERE `id` = '{$_POST['id']}'", "Successfully Deleted Bank Data", "Sorry Could Not Be Deleted");
    } elseif ($_POST['action'] == 'save_jobs_fnc') {
        $save_jobs = $system->prepareCommandQuerySpecial("INSERT INTO `in_job` (`brID`, `jbID`, `cusID`, `poOrID`, `poOrDt`, `jbDt`, `jbStatus`) "
                . "VALUES ('{$_POST['branchComboBox']}','{$_POST['jobID']}','{$_POST['customer']}','{$_POST['po_number']}','{$_POST['po_date']}','{$_POST['job_date']}','0')");
        if ($save_jobs) {
            $system->prepareCommandQueryForAlertify("UPDATE `in_common_dt` SET `jbCount`=`jbCount` + 1 WHERE (`brID`='{$_POST['branchComboBox']}')", "Start New Job...!", "Error..!");
        } else {
            echo json_encode(array(array("msgType" => 2, "msg" => "Error")));
        }
    } elseif ($_POST['action'] == 'select_job_details') {
        $system->prepareSelectQueryForJSONSingleData("SELECT
in_job.aiID,
in_job.brID,
in_job.jbID,
in_job.cusID,
in_job.jbDt,
in_job.poOrID,
in_job.poOrDt
FROM
in_job
WHERE
in_job.aiID = '{$_POST['selected_job_id']}'");
    } elseif ($_POST['action'] == 'update_jobs_fnc') {
        $system->prepareCommandQueryForAlertify("UPDATE `in_job` SET `brID`='{$_POST['branchComboBox']}', `jbID`='{$_POST['jobID']}', `cusID`='{$_POST['customer']}',`poOrID`='{$_POST['po_number']}', `poOrDt`='{$_POST['po_date']}',"
                . " `jbDt`='{$_POST['job_date']}' WHERE (`aiID`='{$_POST['selected_job_id']}')", "Successfully update data..!", "Error..!");
    } elseif ($_POST['action'] == 'cus_select') {

        $system->prepareSelectQueryForJSON("SELECT
in_customer.cusName,
in_customer.cusTel,
in_customer.cusID,
in_customer.brID,
in_customer.cusContactPers,
in_customer.cusRegDt,
in_customer.aiID,
in_customer.cusAddressOne,
in_customer.cusAddressTwo,
in_customer.cusAddressThree,
in_customer.cusContPerTel,
in_customer.cusOffTel,
in_customer.vatRegNo,
in_customer.perTlID
FROM
	in_customer
INNER JOIN in_branch ON in_customer.brID = in_branch.brID
WHERE
in_customer.aiID = '{$_POST['cusid']}'");
    }
    /////////////////////////NIrmal/////////////////////////
    elseif ($_POST['action'] == 'vehicle_select') {

        $system->prepareSelectQueryForJSON("SELECT
                vehicle.br_id,
                vehicle.vh_id,
                vehicle.vh_reg_no,
                vehicle.vh_reg_date,
                vehicle.vh_volumn,
                vehicle.vh_procure,
                vehicle.vh_fual_comb,
                vehicle.vh_weight,
                vehicle.vh_engine_cap,
                vehicle.vh_mnu_year,
                vehicle.vh_fuel_cap,
                vehicle.vh_value,
                vehicle.vh_color,
                vehicle.vh_driver_name,
                vehicle.vh_insu_date,
                vehicle.vh_type_id,
                vehicle.vh_brand_id,
                vehicle.vh_mcntry_id,
                vehicle.vh_pur_id,
                vehicle.vh_condition_id,
                vehicle.vh_insuc_id,
                vehicle.vh_status
                FROM
                vehicle
                WHERE
                CONCAT_WS('-',vehicle.br_id,vehicle.vh_id)='{$_POST['sid']}'  
                ORDER BY
vehicle.br_id ASC");
    } elseif ($_POST['action'] == 'driver_select') {

        $system->prepareSelectQueryForJSON("SELECT
vhdriver.driv_brid,
vhdriver.driv_id,
vhdriver.driv_fname,
vhdriver.driv_lname,
vhdriver.driv_gender,
vhdriver.driv_desc,
vhdriver.driv_nic,
vhdriver.driv_address,
vhdriver.driv_drlcnno
FROM
vhdriver
WHERE
CONCAT_WS('-',vhdriver.driv_brid,vhdriver.driv_id)='{$_POST['sid']}'  
                ORDER BY
vhdriver.driv_brid ASC");
    } elseif ($_POST['action'] == 'update_vehicle_reg') {

        $system->prepareCommandQueryForAlertify("UPDATE `vehicle`
SET 
 `vh_reg_no` = '{$_POST['regNo']}',
 `vh_reg_date` = '{$_POST['reg_Date']}',
 `vh_volumn` = '{$_POST['volume']}',
 `vh_procure` = '{$_POST['procure']}',
 `vh_fual_comb` = '{$_POST['fuelComb']}',
 `vh_weight` = '{$_POST['weight']}',
 `vh_engine_cap` = '{$_POST['engineC']}',
 `vh_mnu_year` = '{$_POST['manuY']}',
 `vh_fuel_cap` = '{$_POST['fuelCa']}',
 `vh_value` = '{$_POST['valueRs']}',
 `vh_color` = '{$_POST['colour']}',
 `vh_driver_name` = '{$_POST['driverName']}',
 `vh_insu_date` = '{$_POST['insDate']}',
 `vh_type_id` = '{$_POST['typeCombo']}',
 `vh_brand_id` = '{$_POST['brandCombo']}',
 `vh_mcntry_id` = '{$_POST['manuCombo']}',
 `vh_pur_id` = '{$_POST['purCombo']}',
 `vh_condition_id` = '{$_POST['conCombo']}',
 `vh_insuc_id` = '{$_POST['insCombo']}',
 `vh_status` = '{$_POST['statusCombo']}'
WHERE
	(`br_id` = '{$_POST['branchCombo']}')
AND (`vh_id` = '{$_POST['vid']}');
", "Program Successfully Updated", "Sorry ..! Counld Not Be Saved Programmes");
    } elseif ($_POST['action'] == 'updatecustomer') {
        $system->prepareCommandQueryForAlertify("UPDATE `in_customer` SET `perTlID`='{$_POST['titlecombo']}',`cusName`='{$_POST['cus_name']}',`cusAddressOne`='{$_POST['cus_address1']}',"
                . "`cusAddressTwo`='{$_POST['cus_address2']}',`cusAddressThree`='{$_POST['city']}',`cusContactPers`='{$_POST['contactperson']}',`cusTel`='{$_POST['office_number1']}',"
                . "`cusContPerTel`='{$_POST['cont_tel_number']}',`cusOffTel`='{$_POST['office_number2']}',`cusRegDt`='{$_POST['reg_date']}',`vatRegNo`='{$_POST['vat_reg_no']}'  WHERE (`aiID`='{$_POST['cus_hide']}')", "Program Successfully Updated", "Sorry ..! Counld Not Be Saved Programmes");
    } elseif ($_POST['action'] == 'delete_customer') {
        $system->prepareCommandQueryForAlertify("DELETE FROM `in_customer` WHERE `aiID` = '{$_POST['del_id']}'", "Successfully Deleted", "Sorry..! Could Not Be Deleted");
    }
    ///////////////////Nirmal////////////////
    elseif ($_POST['action'] == 'delete_vehicles') {
        $system->prepareCommandQueryForAlertify("DELETE 
            FROM 
            `vehicle` 
            WHERE 
            CONCAT_WS('-',vehicle.br_id,vehicle.vh_id) ='{$_POST['sid']}'", "Successfully Deleted", "Sorry..! Could Not Be Deleted");
    } elseif ($_POST['action'] == 'delete_vehicles_repair') {
        $system->prepareCommandQueryForAlertify("DELETE FROM `vhrepair` WHERE `rp_id` ='{$_POST['veID']}'", "Successfully Deleted", "Sorry..! Could Not Be Deleted");
    } elseif ($_POST['action'] == 'delquan_validate') {
        $system->prepareSelectQueryForJSON("SELECT
in_job.jbQty,
in_job.jbID,
in_job.brID
FROM
in_job
WHERE
in_job.jbID = '{$_POST['job']}' AND
in_job.brID = '{$_POST['branch']}'");
    } elseif ($_POST['action'] == 'getInvoID') {
        $data = $system->prepareSelectQuery("SELECT
in_common_dt.brID,
(in_common_dt.billCount) + 1 AS billCount
FROM
in_common_dt
 WHERE in_common_dt.brID = '{$_POST['branID']}'");
        echo $data[0]['billCount'];
    } elseif ($_POST['action'] == 'setJobDataToINvo') {
        $data = $system->prepareSelectQueryForJSON("SELECT
in_job.aiID,
SUM(in_delivery.delQty) AS totqun,
in_job.jbUnitPrice,
in_job.jbDiscountRt,
in_job.jbID
FROM
in_job
INNER JOIN in_delivery ON in_delivery.jbID = in_job.jbID WHERE in_job.aiID = '{$_POST['jobID']}'");
    } elseif ($_POST['action'] == 'copletInvoice') {
        $data = $system->prepareCommandQueryForAlertify("INSERT INTO `in_invoice` (`brID`, `jbID`, `billID`, `billDt`, `billCusID`, `billProductionID`, `billIssuSysUsr`, `billIssuTime`, `totalBillAmt`, `totalDiscoutAmt`, `payType`, `totalPayable`, `totalCashPay`, `totalChequePay`, `bnkID`, `chkNo`, `vat_status`)"
                . " VALUES ('{$_POST['branchComboBox']}', '{$_POST['jobNo']}', '{$_POST['invoNo']}', '{$_POST['date']}', '{$_POST['customerID']}', '{$_POST['inv_po_number']}', '{$_POST['systemUser']}', '{$_POST['systemTime']}', '{$_POST['price']}', '{$_POST['discount']}', '{$_POST['payType']}',"
                . " '{$_POST['totalPayebleAmount']}', '{$_POST['cashAmount']}', '{$_POST['chequeAmount']}', '{$_POST['bank']}', '{$_POST['chequeNo']}', '{$_POST['vat_stasus']}')", "Successfully Completed Invoice..!", "Sorry Culd Not Completed Invoice..!");
    } elseif ($_POST['action'] == 'updateCountTableUnderInvo') {
        $data1 = $system->prepareCommandQuerySpecial("UPDATE `invoicesys`.`in_common_dt` SET `billCount`='{$_POST['invoNo']}' WHERE (`brID`='{$_POST['branchComboBox']}');");
        $data2 = $system->prepareCommandQuerySpecial("UPDATE `invoicesys`.`in_job` SET `jbStatus`='1' WHERE (`brID`='{$_POST['branchComboBox']}' AND `jbID` = '{$_POST['jobNo']}');");
    } elseif ($_POST['action'] == 'getJobDescription') {
        $data1 = $system->prepareSelectQueryForJSON("SELECT
SUM(in_delivery.delQty) AS totdeed,
in_jobitemdata.jbDescription,
in_jobitemdata.jbItemQty,
in_jobitemdata.jbItemunitPrice,
in_jobitemdata.jbDiscountRate,
in_jobitemdata.aid,
in_jobitemdata.jbItemId
FROM
in_jobitemdata
LEFT JOIN in_delivery ON in_jobitemdata.jbbrId = in_delivery.brID
AND in_jobitemdata.jbID = in_delivery.jbID
AND in_jobitemdata.jbItemId = in_delivery.jbItemId
WHERE in_jobitemdata.jbbrId = '{$_POST['branchID']}' AND in_jobitemdata.jbID = '{$_POST['jobID']}' AND in_jobitemdata.aid = '{$_POST['slectedItem']}'");
    } elseif ($_POST['action'] == 'add_items_for_jobs') {
        $itm_id_to_add = $system->prepareSelectQuery("SELECT
COUNT(in_jobitemdata.jbItemId)+1 AS cuttrntItemID
FROM `in_jobitemdata`
WHERE
in_jobitemdata.jbID = '{$_POST['job_id']}'");
        $description = mysql_real_escape_string($_POST['description']);
        $system->prepareCommandQueryForAlertify("INSERT INTO `in_jobitemdata` (`jbbrId`, `jbID`, `jbItemId`, `jbDescription`, `jbItemQty`, `jbItemunitPrice`, `jbDiscountRate`, `jbItemStatus`) "
                . "VALUES ('{$_POST['branchComboBox']}','{$_POST['job_id']}', '{$itm_id_to_add[0]['cuttrntItemID']}', '{$description}', '{$_POST['qun']}', '{$_POST['uPrice']}', '{$_POST['discount_rate']}', '0')", "Item saved success..!", "Error");
    } elseif ($_POST['action'] == 'delete_job_item') {
        $system->prepareCommandQueryForAlertify("DELETE 
FROM `in_jobitemdata`
WHERE
in_jobitemdata.aid = '{$_POST['sel_itmID']}'", "Successfully deleted data", "Error deleting..");
    }
    //////////////vehicle repair-Nirmal
    elseif ($_POST['action'] == 'loadVID') {
        $system->prepareSelectQueryForJSON("SELECT

MAX(vehicle.vh_id) + 1 As vh_id
FROM
vehicle
WHERE
vehicle.br_id='{$_POST['branchVal']}'");
    } elseif ($_POST['action'] == 'loadDID') {
        $system->prepareSelectQueryForJSON("SELECT
MAX(vhdriver.driv_id) + 1 AS driv_id
FROM
vhdriver
WHERE
vhdriver.driv_brid='{$_POST['branchVal']}'");
    } elseif ($_POST['action'] == 'loadVID_for_repair') {
        $system->prepareSelectQueryForJSON("SELECT
vehicle.br_id,
vehicle.vh_id,
vehicle.vh_reg_no
FROM
vehicle
WHERE
vehicle.br_id='{$_POST['branchVal']}' AND
vehicle.vh_reg_no='{$_POST['regID']}'");
    } elseif ($_POST['action'] == 'save_vehicle_reg') {
        $system->prepareCommandQueryForAlertify("INSERT INTO `vehicle` (`br_id`, 
            `vh_id`, 
            `vh_reg_no`, 
            `vh_reg_date`, 
            `vh_volumn`, 
            `vh_procure`, 
            `vh_fual_comb`, 
            `vh_weight`, 
            `vh_engine_cap`, 
            `vh_mnu_year`, 
            `vh_fuel_cap`, 
            `vh_value`, 
            `vh_color`, 
            `vh_driver_name`, 
            `vh_insu_date`, 
            `vh_type_id`, 
            `vh_brand_id`, 
            `vh_mcntry_id`, 
            `vh_pur_id`, 
            `vh_condition_id`, 
            `vh_insuc_id`, `vh_status`) VALUES ('{$_POST['branchCombo']}','{$_POST['vid']}', '{$_POST['regNo']}', '{$_POST['reg_Date']}', '{$_POST['volume']}', '{$_POST['procure']}', '{$_POST['fuelComb']}', '{$_POST['weight']}', '{$_POST['engineC']}', '{$_POST['manuY']}', '{$_POST['fuelCa']}', '{$_POST['valueRs']}', '{$_POST['colour']}', '{$_POST['driverName']}', '{$_POST['insDate']}', '{$_POST['typeCombo']}', '{$_POST['brandCombo']}', '{$_POST['manuCombo']}', '{$_POST['purCombo']}', '{$_POST['conCombo']}', '{$_POST['insCombo']}', '{$_POST['statusCombo']}');
", 'Added Successfully', 'Error in inserting');
        session_start();
        unset($_SESSION['dirname']);
    }
}if (array_key_exists('check_branch_name', $_POST)) {
    $get_branch_names = mysql_query("SELECT
in_branch.brName
FROM
in_branch
WHERE
in_branch.brName = '{$_POST['branch_name']}'");
    if (!empty($get_branch_names)) {
        $count = mysql_num_rows($get_branch_names);
    }
    echo $count;
}
//sanjeewa

if ($_POST['action'] == 'vehicle_Save') {
//   $system->prepareCommandQueryForAlertify("INSERT INTO `vhrepair` (`br_id`, `vh_id`, `rp_date`, `rp_place`, `rp_desc`, `rp_cost`) VALUES ('{$_POST['re_branch']}', '{$_POST['re_vehicle']}', '{$_POST['re_date']}', '{$_POST['re_place']}', '{$_POST['rp_desc']}', '{$_POST['re_cost']}')", "Successfully Saved Vehicle Repaires", "Sorry Counld Not Be Saved Vehicle Repaires");
    $system->prepareCommandQueryForAlertify("INSERT INTO `vhrepair` (`br_id`, `vh_id`, `rp_date`, `rp_place`, `rp_desc`, `rp_cost`) VALUES ('{$_POST['rp_branch']}', '{$_POST['rp_vehicle']}', '{$_POST['rp_date']}', '{$_POST['re_place']}', '{$_POST['rp_desc']}', '{$_POST['re_cost']}')", "Successfully Saved Vehicle Repaires", "Sorry Counld Not Be Saved Vehicle Repaires");
} elseif ($_POST['action'] == 'driver_Save') {
//   $system->prepareCommandQueryForAlertify("INSERT INTO `vhrepair` (`br_id`, `vh_id`, `rp_date`, `rp_place`, `rp_desc`, `rp_cost`) VALUES ('{$_POST['re_branch']}', '{$_POST['re_vehicle']}', '{$_POST['re_date']}', '{$_POST['re_place']}', '{$_POST['rp_desc']}', '{$_POST['re_cost']}')", "Successfully Saved Vehicle Repaires", "Sorry Counld Not Be Saved Vehicle Repaires");
    $system->prepareCommandQueryForAlertify("INSERT INTO `vhdriver` (`driv_brid`, `driv_id`, `driv_fname`, `driv_lname`, `driv_gender`, `driv_desc`, `driv_nic`, `driv_address`, `driv_drlcnno`) VALUES ('{$_POST['branchCombo']}', '{$_POST['dr_id']}', '{$_POST['dr_fname']}', '{$_POST['dr_lname']}', '{$_POST['genderCom']}', '{$_POST['desc_rip']}', '{$_POST['dr_nic']}', '{$_POST['dr_add']}', '{$_POST['li_no']}')", "Successfully Saved", "Sorry Counld Not Be Saved");
} elseif ($_POST['action'] == 'save_driver_reg_assign') {
//   $system->prepareCommandQueryForAlertify("INSERT INTO `vhrepair` (`br_id`, `vh_id`, `rp_date`, `rp_place`, `rp_desc`, `rp_cost`) VALUES ('{$_POST['re_branch']}', '{$_POST['re_vehicle']}', '{$_POST['re_date']}', '{$_POST['re_place']}', '{$_POST['rp_desc']}', '{$_POST['re_cost']}')", "Successfully Saved Vehicle Repaires", "Sorry Counld Not Be Saved Vehicle Repaires");
    $system->prepareCommandQueryForAlertify("INSERT INTO `vhvehicaldriverinfo` (`vdr_brid`, `vdr_drivid`, `vdr_vhid`, `vdr_start_date`, `vdr_driver_status`) VALUES ('{$_POST['branchCombo1']}', '{$_POST['driverNameComboBox1']}', '{$_POST['driverComboBox1']}', '{$_POST['startDate']}', '{$_POST['status']}')", "Successfully Saved", "Sorry Counld Not Be Saved");
} elseif ($_POST['action'] == 'driver_duty_assign_save') {
//   $system->prepareCommandQueryForAlertify("INSERT INTO `vhrepair` (`br_id`, `vh_id`, `rp_date`, `rp_place`, `rp_desc`, `rp_cost`) VALUES ('{$_POST['re_branch']}', '{$_POST['re_vehicle']}', '{$_POST['re_date']}', '{$_POST['re_place']}', '{$_POST['rp_desc']}', '{$_POST['re_cost']}')", "Successfully Saved Vehicle Repaires", "Sorry Counld Not Be Saved Vehicle Repaires");
    $system->prepareCommandQueryForAlertify("INSERT INTO `vhmngsys`.`vhvehicaldriverinfo` (`vdr_brid`, `vdr_drivid`, `vdr_vhid`, `vdr_start_date`, `vdr_end_date`) VALUES ('{$_POST['branch_id']}', '{$_POST['driver_id']}','{$_POST['driverComboBox']}','{$_POST['startDate']}','{$_POST['endDate']}')", "Successfully Saved", "Sorry Counld Not Be Saved");
} elseif ($_POST['action'] == 'update_vehicle_rep') {
    $system->prepareCommandQueryForAlertify("UPDATE `vhrepair` SET `rp_date`='{$_POST['rp_date']}', `rp_place`='{$_POST['rp_place']}', `rp_desc`='{$_POST['rp_desc']}', `rp_cost`='{$_POST['rp_cost']}' WHERE (`rp_id`='{$_POST['rp_id']}')", "Successfuly update..!", "Error..!");
//        echo "UPDATE `vhrepair` SET `rp_date`='{$_POST['rp_date']}', `rp_place`='{$_POST['rp_place']}', `rp_desc`='{$_POST['rp_desc']}', `rp_cost`='{$_POST['rp_cost']}' WHERE (`rp_id`='{$_POST['rp_id']}')", "Successfuly update..!", "Error..!";
} elseif ($_POST['action'] == 'delete_vehicle') {
    $system->prepareCommandQueryForAlertify("DELETE FROM `vhrepair` WHERE `rp_id` = '{$_POST['veID']}'", "Successfully Deleted", "Sorry..! Could Not Be Deleted");
}

// vehicle dipose
if ($_POST['action'] == 'vehicle_dispose') {
    $system->prepareCommandQueryForAlertify("INSERT INTO `vhdispose` (`br_id`, `vh_id`, `type`, `disp_date`, `desc`, `sell_amt`) VALUES ('{$_POST['rp_branch']}', '{$_POST['rp_vehicle']}', '{$_POST['vehicle_type']}', '{$_POST['disp_date']}', '{$_POST['desc']}', '{$_POST['sell_amount']}')", "Successfully Saved Vehicle Dispose", "Sorry Counld Not Be Saved Vehicle Dispose");
//   echo "INSERT INTO `vhdispose` (`br_id`, `vh_id`, `type`, `disp_date`, `desc`, `sell_amt`) VALUES ('{$_POST['rp_branch']}', '{$_POST['rp_vehicle']}', '{$_POST['vehicle_type']}', '{$_POST['disp_date']}', '{$_POST['desc']}', '{$_POST['sell_amount']}')", "Successfully Saved Vehicle Dispose", "Sorry Counld Not Be Saved Vehicle Repaires";
} elseif ($_POST['action'] == 'update_vehicle_des') {
    $system->prepareCommandQueryForAlertify("UPDATE `vhdispose` SET `type`='{$_POST['vehicle_type']}', `disp_date`='{$_POST['disp_date']}', `desc`='{$_POST['desc']}', `sell_amt`='{$_POST['sell_amount']}' WHERE (`disp_id`='{$_POST['disp_id']}')", "Successfuly update..!", "Error..!");
//        echo "UPDATE `vhrepair` SET `rp_date`='{$_POST['rp_date']}', `rp_place`='{$_POST['rp_place']}', `rp_desc`='{$_POST['rp_desc']}', `rp_cost`='{$_POST['rp_cost']}' WHERE (`rp_id`='{$_POST['rp_id']}')", "Successfuly update..!", "Error..!";
} elseif ($_POST['action'] == 'delete_vehicles_dispose') {
    $system->prepareCommandQueryForAlertify("DELETE FROM `vhdispose` WHERE `disp_id` = '{$_POST['disp_id']}'", "Successfully Deleted", "Sorry..! Could Not Be Deleted");
//    echo "DELETE FROM `vhdispose` WHERE `disp_id` = '{$_POST['disp_id']}'", "Successfully Deleted", "Sorry..! Could Not Be Deleted";
}

//samrulz creations
//samrulz creations
if ($_POST['action'] == 'fuel_mnmnt_save') {
    $system->prepareCommandQueryForAlertify("INSERT INTO `vhmngsys`.`vhfuelinfo` (`br_id`, `vh_id`, `qty_fuel`, `fuel_date`, `fuel_cost`) VALUES ('{$_POST['branchcombo']}','{$_POST['vehicleCombo']}','{$_POST['qty_fuel']}','{$_POST['rp_date']}','{$_POST['fuel_cost']}');", "Successfully Saved", "Sorry ! Could not be Save");
} elseif ($_POST['action'] == 'select_vehicle_rep') {
    $system->prepareSelectQueryForJSON("SELECT
vhrepair.br_id,
vhrepair.rp_date,
vhrepair.rp_place,
vhrepair.rp_desc,
vhrepair.rp_cost,
vhrepair.rp_id,
vhrepair.vh_id
FROM `vhrepair`
WHERE
vhrepair.rp_id = '{$_POST['rp_id']}'");
} elseif ($_POST['action'] == 'select_vehicle_dispose') {
    $system->prepareSelectQueryForJSON("SELECT
vhdispose.disp_id,
vhdispose.vh_id,
vhdispose.type,
vhdispose.disp_date,
vhdispose.`desc`,
vhdispose.sell_amt,
vhdispose.br_id
FROM `vhdispose`
WHERE
vhdispose.disp_id = '{$_POST['disp_id']}'");
}
if ($_POST['action'] == 'set_fuel_info') {
    $system->prepareSelectQueryForJSON("SELECT
vhfuelinfo.fuel_cost,
vhfuelinfo.fuel_date,
vhfuelinfo.qty_fuel,
vhfuelinfo.fuel_id,
vhfuelinfo.br_id,
vhfuelinfo.vh_id
FROM
vhfuelinfo
WHERE
vhfuelinfo.fuel_id = '{$_POST['fuel_id']}'");
}
if ($_POST['action'] == 'delete_fuel') {
    $system->prepareCommandQueryForAlertify("DELETE FROM `vhfuelinfo` WHERE `fuel_id` = '{$_POST['fuel_del_id']}'", "Successfully Deleted Data", "Sorry Could Not Be Deleted");
}

if ($_POST['action'] == 'fuel_mnmnt_update') {
    $system->prepareCommandQueryForAlertify("UPDATE `vhfuelinfo` SET `br_id`='{$_POST['branchcombo']}', `vh_id`='{$_POST['vehicleCombo']}', `qty_fuel`='{$_POST['qty_fuel']}', `fuel_date`='{$_POST['rp_date']}', `fuel_cost`='{$_POST['fuel_cost']}' WHERE (`fuel_id`='{$_POST['hidden_fuel']}')", "Successfuly update..!", "Error..!");
}
if ($_POST['action'] == 'search_reg_no') {
    $data = $system->prepareSelectQuery("SELECT
COUNT(vehicle.vh_reg_no) AS tot
FROM
vehicle
WHERE
vehicle.vh_reg_no = '{$_POST['data_for_search']}'");
    if ($data[0]['tot'] > 0) {
        echo json_encode(array("msgType" => 1, "msg" => "Already Exist"));
    } else {
        echo json_encode(array("msgType" => 2));
    }
}
if ($_POST['action'] == 'check_sesstion') {
    session_start();
    if (isset($_SESSION['dirname'])) {
        echo 1;
    } else {
        echo 0;
    }
}
if ($_POST['action'] == 'check_sesstions') {
    session_start();
    if (isset($_SESSION['dirname'])) {
        echo 1;
    } else {
        echo 0;
    }
}