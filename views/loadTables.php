<?php

require_once '../config/dbc.php';
require_once '../class/database.php';
require_once '../class/systemSetting.php';
$dbClass = new database();
$system = new setting();

if (array_key_exists("table", $_POST)) {
    if ($_POST['table'] == '') {
        echo $system->prepareSelectQueryForJSON("");
    }
//        viraj
    if ($_POST['table'] == 'registerd_branch_table') {
        echo $system->prepareSelectQueryForJSON("SELECT
in_branch.brID,
in_branch.brName,
in_branch.brTel,
in_branch.brFax,
in_branch.brAddress
FROM `in_branch`
ORDER BY in_branch.brID DESC");
    }
    if ($_POST['table'] == 'custmer_vice_orders_report_table') {
        echo $system->prepareSelectQueryForJSON("SELECT
in_job.aiID,
in_job.jbID,
in_job.jbDesc,
in_job.jbQty,
in_job.jbUnitPrice,
in_job.jbDiscountRt,
in_job.jbDt,
in_job.jbStatus,
in_customer.cusName,
in_job.brID
FROM
in_job
INNER JOIN in_customer ON in_job.cusID = in_customer.cusID AND in_job.brID = in_customer.brID
WHERE
in_job.cusID = '{$_POST['customer_id']}'
    AND
in_job.brID = '{$_POST['brancch_id']}'
ORDER BY
in_job.aiID DESC");
    }
    if ($_POST['table'] == 'job_registration_data_table') {
        echo $system->prepareSelectQueryForJSON("SELECT
in_job.aiID,
in_job.brID,
in_job.jbID,
in_job.cusID,
in_job.jbDt,
in_customer.cusName
FROM
in_job
INNER JOIN in_customer ON in_job.cusID = in_customer.cusID AND in_job.brID = in_customer.brID
WHERE in_job.jbStatus = '0' AND in_job.brID = '{$_POST['branch_id']}'
AND
in_job.cusID = '{$_POST['custmer_ID']}'
ORDER BY in_job.aiID DESC");
    }///////////// banks
    if ($_POST['table'] == 'job_registration_dataForDeleivary_table') {
        echo $system->prepareSelectQueryForJSON("SELECT
in_job.aiID,
in_job.jbID,
in_job.jbDt
FROM
in_job
WHERE
in_job.jbStatus = '0' AND in_job.brID = '{$_POST['branch_id']}' AND in_job.cusID = '{$_POST['custmer_ID']}'
ORDER BY in_job.aiID DESC");
    }///////////// banks
    elseif ($_POST['table'] == 'loadBanksTable') {
        echo $system->prepareSelectQueryForJSON("SELECT
in_banks.id,
in_banks.bank_name
FROM `in_banks`
ORDER BY
in_banks.id DESC");
    }
//    samrulz
    elseif ($_POST['table'] == 'registerd_customer_table') {
        echo $system->prepareSelectQueryForJSON("SELECT
in_customer.cusName,
in_customer.cusTel,
in_customer.cusID,
in_customer.aiID
FROM
in_customer
INNER JOIN in_branch ON in_customer.brID = in_branch.brID
WHERE
in_branch.brID = '{$_POST['branchComboDiv']}'
ORDER BY in_customer.aiID DESC");
    }
//anuruddha
    elseif ($_POST['table'] == 'delivery_table') {
        echo $system->prepareSelectQueryForJSON("SELECT
in_jobitemdata.jbID,
in_jobitemdata.jbDescription,
in_jobitemdata.jbItemQty,
in_jobitemdata.jbItemunitPrice,
in_jobitemdata.jbDiscountRate,
in_job.brID,
in_jobitemdata.aid
FROM
in_jobitemdata
INNER JOIN in_job ON in_jobitemdata.jbID = in_job.jbID
WHERE
in_jobitemdata.jbID = '{$_POST['job_id']}' AND
in_job.brID = '{$_POST['branch_id']}' 
ORDER BY in_jobitemdata.aid DESC");
    } elseif ($_POST['table'] == 'jobsTbl') {
        echo $system->prepareSelectQueryForJSON("SELECT
in_job.jbID,
in_job.jbDt,
in_job.aiID
FROM
in_job
WHERE
in_job.jbStatus = '0' AND in_job.cusID = '{$_POST['customer']}' AND in_job.brID = '{$_POST['branchID']}'"
                . "GROUP BY in_job.jbID");
    } elseif ($_POST['table'] == 'customer_detailz') {
        echo $system->prepareSelectQueryForJSON("SELECT
in_customer.cusName,
in_customer.cusContactPers,
in_customer.cusTel,
in_customer.cusRegDt,
in_customer.cusID,
in_customer.cusAddressOne,
in_customer.cusAddressTwo,
in_customer.cusAddressThree
FROM
in_customer
WHERE
in_customer.brID = '{$_POST['bran']}'");
    } elseif ($_POST['table'] == 'getcompletedInvo') {
        echo $system->prepareSelectQueryForJSON("SELECT
in_invoice.billID,
in_customer.cusName,
in_invoice.billDt,
in_invoice.totalPayable,
in_invoice.aiID
FROM
in_invoice
INNER JOIN in_customer ON in_invoice.billCusID = in_customer.cusID
WHERE in_invoice.brID = '{$_POST['branchID']}'
AND
in_invoice.billDt BETWEEN '{$_POST['date_from']}' AND '{$_POST['date_to']}'
ORDER BY in_invoice.aiID DESC");
    } elseif ($_POST['table'] == 'date_range_vice_income') {
        echo $system->prepareSelectQueryForJSON("SELECT
in_invoice.jbID,
in_invoice.totalPayable,
in_invoice.billDt,
in_customer.cusName,
in_invoice.totalCashPay,
in_invoice.totalChequePay,
in_pay_type.pay_type_name
FROM
in_invoice
INNER JOIN in_customer ON in_invoice.billCusID = in_customer.cusID AND in_invoice.brID = in_customer.brID
INNER JOIN in_pay_type ON in_invoice.payType = in_pay_type.pay_type_id
WHERE
in_invoice.billDt BETWEEN '{$_POST['date_from']}' AND '{$_POST['date_to']}'");
    } elseif ($_POST['table'] == 'customer_date_range_vice_income') {
        echo $system->prepareSelectQueryForJSON("SELECT
in_invoice.jbID,
in_invoice.totalPayable,
in_invoice.billDt,
in_invoice.totalCashPay,
in_invoice.totalChequePay,
in_pay_type.pay_type_name
FROM
in_invoice
INNER JOIN in_pay_type ON in_invoice.payType = in_pay_type.pay_type_id
WHERE
in_invoice.billDt BETWEEN '{$_POST['date_from']}' AND '{$_POST['date_to']}' AND
in_invoice.billCusID = '{$_POST['custID']}'");
    } elseif ($_POST['table'] == 'getdataToDelivary') {
        $system->prepareSelectQueryForJSON("SELECT
in_job.jbID,
in_job.aiID,
in_job.jbDesc,
in_job.jbQty,
SUM(in_delivery.delQty) delQty,
in_job.cusID
FROM
in_job
INNER JOIN in_delivery ON in_delivery.jbID = in_job.jbID AND in_job.brID = in_delivery.brID
 WHERE in_job.aiID = '{$_POST['tblID']}'");
    } elseif ($_POST['table'] == 'add_items_for_jobs_table') {
        $system->prepareSelectQueryForJSON("SELECT
in_jobitemdata.aid,
in_jobitemdata.jbID,
in_jobitemdata.jbItemId,
in_jobitemdata.jbDescription,
in_jobitemdata.jbItemQty,
in_jobitemdata.jbItemunitPrice,
in_jobitemdata.jbDiscountRate
FROM `in_jobitemdata`
WHERE
in_jobitemdata.jbID = '{$_POST['job_id']}'");
    } elseif ($_POST['table'] == 'jobLastStstus') {
        $system->prepareSelectQueryForJSON("SELECT
in_job.jbID,
in_job.jbDt,
in_job.aiID,
in_jobitemdata.jbItemQty,
in_jobitemdata.jbDescription,
SUM(in_delivery.delQty) AS totDellQty,
in_jobitemdata.jbItemunitPrice,
in_jobitemdata.jbDiscountRate
FROM
in_job
INNER JOIN in_jobitemdata ON in_jobitemdata.jbID = in_job.jbID AND in_job.brID = in_jobitemdata.jbbrId
INNER JOIN in_delivery ON in_jobitemdata.jbbrId = in_delivery.brID 
AND in_jobitemdata.jbID = in_delivery.jbID 
AND in_jobitemdata.jbItemId = in_delivery.jbItemId
WHERE
in_job.aiID = '{$_POST['jobTblID']}' AND
in_job.brID = '{$_POST['branchID']}' AND
in_job.cusID = '{$_POST['customer']}' GROUP BY in_jobitemdata.jbItemId");
    } elseif ($_POST['table'] == 'vatnbt') {
        $system->prepareSelectQueryForJSON("SELECT
in_vatnbt.vat,
in_vatnbt.nbt
FROM `in_vatnbt`");

        //sanjeewa
    } elseif ($_POST['table'] == 'repair_vehicle_table') {
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
vhrepair.vh_id = '{$_POST['ve_id']}' AND vhrepair.br_id= '{$_POST['br_id']}'");
    } elseif ($_POST['table'] == 'fuel_management_table') {
        $query = "SELECT
vhfuelinfo.fuel_cost,
vhfuelinfo.fuel_date,
vhfuelinfo.qty_fuel,
vhfuelinfo.fuel_id,
vhfuelinfo.br_id,
vhfuelinfo.vh_id
FROM
vhfuelinfo
WHERE
vhfuelinfo.br_id = '{$_POST['br_id']}' 
AND
vhfuelinfo.vh_id = '{$_POST['ve_id']}'";
        $system->prepareSelectQueryForJSON($query);
    } elseif ($_POST['table'] == 'dispose_vehicle_table') {
        $system->prepareSelectQueryForJSON("SELECT
vhdispose.disp_id,
vhdispose.br_id,
vhdispose.vh_id,
vhdispose.type,
vhdispose.disp_date,
vhdispose.`desc`,
vhdispose.sell_amt
FROM `vhdispose`
WHERE
vhdispose.br_id = '{$_POST['br_id']}'
AND
vhdispose.vh_id = '{$_POST['ve_id']}'");
    } elseif ($_POST['table'] == 'fuel_management_table_report') {
        $query = "SELECT
        vhfuelinfo.fuel_cost,
        vhfuelinfo.fuel_date,
        vhfuelinfo.qty_fuel,
        vhfuelinfo.fuel_id,
        vhfuelinfo.br_id,
        vhfuelinfo.vh_id
        FROM
        vhfuelinfo
        WHERE
        vhfuelinfo.fuel_date 
        BETWEEN 
        '{$_POST['fromDate']}' 
        AND 
        '{$_POST['toDate']}' AND vhfuelinfo.br_id = '{$_POST['br_id']}' AND vhfuelinfo.vh_id ='{$_POST['ve_id']}' ";
        $system->prepareSelectQueryForJSON($query);
    } elseif ($_POST['table'] == 'fuel_management_detail_report') {
        $query = "SELECT
        SUM(vhfuelinfo.fuel_cost) AS fuel_cost,
        vhfuelinfo.fuel_date,
        SUM(vhfuelinfo.qty_fuel) AS qty_fuel,
        vhfuelinfo.fuel_id,
        vhfuelinfo.br_id,
        vhfuelinfo.vh_id,
        vehicle.vh_reg_no
        FROM
        vhfuelinfo
        INNER JOIN vehicle ON vhfuelinfo.br_id = vehicle.br_id AND vhfuelinfo.vh_id = vehicle.vh_id
        WHERE
        vhfuelinfo.fuel_date 
        BETWEEN 
        '{$_POST['fromDate']}' 
        AND 
        '{$_POST['toDate']}' AND vhfuelinfo.br_id = '{$_POST['br_id']}'
            GROUP BY
        vehicle.vh_reg_no";
        $system->prepareSelectQueryForJSON($query);
    }
    /////////////Nirmal//////////////
    elseif ($_POST['table'] == 'registerd_vehicle_table') {
        $system->prepareSelectQueryForJSON("SELECT
vehicle.br_id,
vehicle.vh_id, 
CONCAT_WS('-',vehicle.br_id,vehicle.vh_id) AS s_id,
vehicle.vh_reg_no,
vehicle.vh_mnu_year,
vehicle.vh_value,
vehicle.vh_type_id,
vehicle.vh_brand_id,
vhtype.type_name,
vhbrand.brand_name
FROM
vehicle
INNER JOIN vhtype ON vehicle.vh_type_id = vhtype.type_id
INNER JOIN vhbrand ON vehicle.vh_brand_id = vhbrand.brand_id
WHERE
vehicle.br_id = '{$_POST['branchVal']}'
ORDER BY
vehicle.vh_id DESC");
    } elseif ($_POST['table'] == 'registerd_driver_table') {
        $system->prepareSelectQueryForJSON("SELECT
vhdriver.driv_fname,
vhdriver.driv_lname,
vhdriver.driv_gender,
vhdriver.driv_desc,
vhdriver.driv_brid,
vhdriver.driv_id,
CONCAT_WS('-',vhdriver.driv_brid,vhdriver.driv_id) AS sd_id,
vhdriver.driv_nic,
vhdriver.driv_address,
vhdriver.driv_drlcnno
FROM
vhdriver
WHERE
vhdriver.driv_brid='{$_POST['branchVal']}'
ORDER BY
vhdriver.driv_id DESC");
    } elseif ($_POST['table'] == 'driver_assign_tabele') {
        $system->prepareSelectQueryForJSON("SELECT
vhdriver.driv_fname,
vhdriver.driv_lname,
vehicle.vh_reg_no,
vhvehicaldriverinfo.vdr_start_date,
vhvehicaldriverinfo.vdr_driver_status
FROM
vhvehicaldriverinfo
INNER JOIN vehicle ON vhvehicaldriverinfo.vdr_brid = vehicle.br_id AND vhvehicaldriverinfo.vdr_vhid = vehicle.vh_id
INNER JOIN vhdriver ON vhvehicaldriverinfo.vdr_brid = vhdriver.driv_brid AND vhvehicaldriverinfo.vdr_drivid = vhdriver.driv_id
WHERE
vhvehicaldriverinfo.vdr_brid='{$_POST['branchVal']}'
ORDER BY
vhdriver.driv_id DESC");
    } elseif ($_POST['table'] == 'modal_table') {
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
vehicle.vh_status,
branch.br_name,
vhtype.type_name,
vhpurpose.pur_name,
vhmnucountry.mcntry_name,
vhcondition.condition_name,
vhbrand.brand_name,
vhinsucompany.insuc_name
FROM
vehicle
INNER JOIN branch ON vehicle.br_id = branch.br_id
INNER JOIN vhtype ON vehicle.vh_type_id = vhtype.type_id
INNER JOIN vhpurpose ON vehicle.vh_pur_id = vhpurpose.pur_id
INNER JOIN vhmnucountry ON vehicle.vh_mcntry_id = vhmnucountry.mcntry_id
INNER JOIN vhcondition ON vehicle.vh_condition_id = vhcondition.condition_id
INNER JOIN vhbrand ON vehicle.vh_brand_id = vhbrand.brand_id
INNER JOIN vhinsucompany ON vehicle.vh_insuc_id = vhinsucompany.insuc_id
WHERE
CONCAT_WS('-',vehicle.br_id,vehicle.vh_id)='{$_POST['sid']}'");
    } elseif ($_POST['table'] == 'modal_table_drive') {
        $system->prepareSelectQueryForJSON("SELECT
branch.br_name,
vhdriver.driv_id,
vhdriver.driv_fname,
vhdriver.driv_lname,
vhdriver.driv_brid
FROM
vhdriver
INNER JOIN branch ON vhdriver.driv_brid = branch.br_id
WHERE
CONCAT_WS('-',vhdriver.driv_brid,vhdriver.driv_id)='{$_POST['sid']}'");
    } else if ($_POST['table'] == 'generate_re_forms') {
        // print_r($_POST);
        $branchCombo = mysql_real_escape_string($_POST['branchCombo']);
        $regCombo = mysql_real_escape_string($_POST['regCombo']);
        $options = intval(mysql_real_escape_string($_POST['options']));

        /*
         * 1 = branch
         * 2 = reg.no.
         */
        switch ($options) {
            case 2: {
                    echo $system->prepareSelectQueryForJSON("SELECT
vehicle.vh_reg_no,
vhrepair.rp_id,
vhrepair.br_id,
vhrepair.vh_id,
vhrepair.rp_date,
vhrepair.rp_place,
vhrepair.rp_desc,
vhrepair.rp_cost
FROM
vehicle
INNER JOIN vhrepair ON vhrepair.br_id = vehicle.br_id AND vhrepair.vh_id = vehicle.vh_id
WHERE
vehicle.br_id= '{$branchCombo}' AND
vehicle.vh_reg_no= '{$regCombo}'");
                }
                break;
            case 1: {
                    echo $system->prepareSelectQueryForJSON("SELECT
vehicle.vh_reg_no,
vhrepair.rp_id,
vhrepair.br_id,
vhrepair.vh_id,
vhrepair.rp_date,
vhrepair.rp_place,
vhrepair.rp_desc,
vhrepair.rp_cost
FROM
vehicle
INNER JOIN vhrepair ON vhrepair.br_id = vehicle.br_id AND vhrepair.vh_id = vehicle.vh_id
WHERE
vehicle.br_id= '{$branchCombo}'");
                }
                break;
        }
    } else if ($_POST['table'] == 'modal_dispose_table') {
        $system->prepareSelectQueryForJSON("SELECT
vehicle.vh_reg_no,
branch.br_name,
vhdispose.disp_id,
vhdispose.br_id,
vhdispose.vh_id,
vhdispose.type,
vhdispose.disp_date,
vhdispose.`desc`,
vhdispose.sell_amt
FROM
vehicle
INNER JOIN vhdispose ON vhdispose.br_id = vehicle.br_id AND vhdispose.vh_id = vehicle.vh_id
INNER JOIN branch ON vehicle.br_id = branch.br_id
WHERE
vhdispose.disp_id='{$_POST['did']}'");
    } else if ($_POST['table'] == 'modal_repair_table') {
        // print_r($_POST);
        $system->prepareSelectQueryForJSON("SELECT
vehicle.vh_reg_no,
branch.br_name,
vhrepair.rp_id,
vhrepair.br_id,
vhrepair.vh_id,
vhrepair.rp_date,
vhrepair.rp_place,
vhrepair.rp_desc,
vhrepair.rp_cost
FROM
vehicle
INNER JOIN branch ON vehicle.br_id = branch.br_id
INNER JOIN vhrepair ON vhrepair.br_id = vehicle.br_id AND vhrepair.vh_id = vehicle.vh_id
WHERE
vhrepair.rp_id='{$_POST['rid']}'");
    } else if ($_POST['table'] == 'generate_de_forms') {
        // print_r($_POST);
        $branchCombo = mysql_real_escape_string($_POST['branchCombo']);
        $regCombo = mysql_real_escape_string($_POST['regCombo']);
        $options = intval(mysql_real_escape_string($_POST['options']));

        /*
         * 1 = branch
         * 2 = reg.no.
         */
        switch ($options) {
            case 2: {
                    echo $system->prepareSelectQueryForJSON("SELECT
vhdispose.disp_id,
vhdispose.br_id,
vhdispose.vh_id,
vhdispose.type,
vhdispose.disp_date,
vhdispose.`desc`,
vhdispose.sell_amt,
vehicle.vh_reg_no
FROM
vhdispose
INNER JOIN vehicle ON vhdispose.br_id = vehicle.br_id AND vhdispose.vh_id = vehicle.vh_id
WHERE
vhdispose.br_id = '{$branchCombo}' AND
vehicle.vh_reg_no= '{$regCombo}'");
                }
                break;
            case 1: {
                    echo $system->prepareSelectQueryForJSON("SELECT
vhdispose.disp_id,
vhdispose.br_id,
vhdispose.vh_id,
vhdispose.type,
vhdispose.disp_date,
vhdispose.`desc`,
vhdispose.sell_amt,
vehicle.vh_reg_no
FROM
vhdispose
INNER JOIN vehicle ON vhdispose.br_id = vehicle.br_id AND vhdispose.vh_id = vehicle.vh_id
WHERE
vhdispose.br_id = '{$branchCombo}'");
                }
                break;
        }
    }
}



