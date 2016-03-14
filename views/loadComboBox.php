<?php

require_once '../config/dbc.php';
require_once '../class/database.php';
require_once '../class/systemSetting.php';
$dbClass = new database();
$system = new setting();

if (array_key_exists("comboBox", $_POST)) {
    if ($_POST['comboBox'] == 'branchComboBox') {
        $system->prepareSelectQueryForJSON("SELECT
in_branch.brID,
in_branch.brName
FROM
in_branch
GROUP BY
in_branch.brID
ORDER BY
in_branch.brID ASC");
    } else if ($_POST['comboBox'] == 'customerCombo') {
        $system->prepareSelectQueryForJSON("SELECT
in_customer.cusName,
in_customer.cusID
FROM
in_customer
WHERE
in_customer.brID = '{$_POST['branch_id']}'
ORDER BY in_customer.aiID ASC");
    } if ($_POST['comboBox'] == 'customer_count') {
        $system->prepareSelectQueryForJSON("SELECT 
(in_common_dt.cusCount) + 1 AS cuscounts 
FROM 
in_common_dt 
INNER JOIN in_branch ON in_common_dt.brID = in_branch.brID 
WHERE in_branch.brID = '{$_POST['branch_id']}'");
    } elseif ($_POST['comboBox'] == 'jobComboBox') {
        $system->prepareSelectQueryForJSON("SELECT
in_job.jbID
FROM `in_job`
WHERE
in_job.brID = '{$_POST['branchID']}' AND
in_job.jbStatus = 0");
    } elseif ($_POST['comboBox'] == 'getbanks') {
        $system->prepareSelectQueryForJSON("SELECT
in_banks.id,
in_banks.bank_name
FROM
in_banks");
    } elseif ($_POST['comboBox'] == 'paytyps') {
        $system->prepareSelectQueryForJSON("SELECT
in_pay_type.pay_type_id,
in_pay_type.pay_type_name
FROM
in_pay_type");
    } elseif ($_POST['comboBox'] == 'titlecomboComboBox') {
        $system->prepareSelectQueryForJSON("SELECT
in_pertitle.pertlID,
in_pertitle.perTlName
FROM
in_pertitle
GROUP BY
in_pertitle.pertlID");
    } else if ($_POST['comboBox'] == 'branchesComboBox') {
        $system->prepareSelectQueryForJSON("SELECT
            branch.br_name,
            branch.br_id
            FROM
            branch");
    } else if ($_POST['comboBox'] == 'vehicleComboBox') {
        $system->prepareSelectQueryForJSON("SELECT 
            DISTINCT
            branch.br_name,
            vehicle.vh_reg_no,
            vehicle.vh_id
            FROM
            vehicle
            INNER JOIN branch ON vehicle.br_id = branch.br_id
            WHERE
            vehicle.br_id = '{$_POST['type_id']}'");
    } else if ($_POST['comboBox'] == 'reg_no_combo_box_driver') {
        $system->prepareSelectQueryForJSON("SELECT DISTINCT
vehicle.vh_reg_no, 
vehicle.vh_id
FROM
vehicle
INNER JOIN vhdriver ON vehicle.br_id = vhdriver.driv_brid
WHERE
vhdriver.driv_brid = '{$_POST['type_id']}'");
    } else if ($_POST['comboBox'] == 'driver_combo_box') {
        $system->prepareSelectQueryForJSON("SELECT
DISTINCT
vhdriver.driv_brid,
vhdriver.driv_id,
vhdriver.driv_fname,
vhdriver.driv_lname,
CONCAT_WS(' ',vhdriver.driv_fname,vhdriver.driv_lname) AS driv_name
FROM
vhdriver
WHERE
vhdriver.driv_brid = '{$_POST['type_id']}'");
    } else if ($_POST['comboBox'] == 'reg_combo_load') {
        $system->prepareSelectQueryForJSON("SELECT
DISTINCT
vehicle.vh_reg_no,
vehicle.vh_id
FROM
vehicle
INNER JOIN vhdriver ON vhdriver.driv_brid = vehicle.br_id
WHERE
vhdriver.driv_brid='{$_POST['branch']}'");
    } elseif ($_POST['comboBox'] == 'branchcomboComboBox') {
        $system->prepareSelectQueryForJSON("SELECT
branch.br_id,
branch.br_name
FROM
branch
ORDER BY
branch.br_id ASC
");
    } elseif ($_POST['comboBox'] == 'branchcomboComboBoxDriver') {
        $system->prepareSelectQueryForJSON("SELECT
DISTINCT
vhdriver.driv_brid,
branch.br_name
FROM
vhdriver
INNER JOIN branch ON vhdriver.driv_brid = branch.br_id
ORDER BY
vhdriver.driv_brid ASC
");
    } elseif ($_POST['comboBox'] == 'typecomboComboBox') {
        $system->prepareSelectQueryForJSON("SELECT
vhtype.type_id,
vhtype.type_name
FROM
vhtype
GROUP BY
vhtype.type_id");
    } elseif ($_POST['comboBox'] == 'regcomboComboBox') {
        $system->prepareSelectQueryForJSON("SELECT
vehicle.br_id,
vehicle.vh_reg_no
FROM
vehicle
WHERE
vehicle.br_id='{$_POST['selected']}'
");
    } elseif ($_POST['comboBox'] == 'purposecomboComboBox') {
        $system->prepareSelectQueryForJSON("SELECT
vhpurpose.pur_id,
vhpurpose.pur_name
FROM
vhpurpose
ORDER BY
vhpurpose.pur_id ASC
");
    } elseif ($_POST['comboBox'] == 'manucomboComboBox') {
        $system->prepareSelectQueryForJSON("SELECT
vhmnucountry.mcntry_id,
vhmnucountry.mcntry_name
FROM
vhmnucountry
ORDER BY
vhmnucountry.mcntry_id ASC
");
    } elseif ($_POST['comboBox'] == 'conditioncomboComboBox') {
        $system->prepareSelectQueryForJSON("SELECT
vhcondition.condition_id,
vhcondition.condition_name
FROM
vhcondition
ORDER BY
vhcondition.condition_id ASC

");
    } elseif ($_POST['comboBox'] == 'brandcomboComboBox') {
        $system->prepareSelectQueryForJSON("SELECT
vhbrand.brand_id,
vhbrand.brand_name
FROM
vhbrand
ORDER BY
vhbrand.brand_id ASC


");
    } elseif ($_POST['comboBox'] == 'companycomboComboBox') {
        $system->prepareSelectQueryForJSON("SELECT
vhinsucompany.insuc_id,
vhinsucompany.insuc_name
FROM
vhinsucompany
ORDER BY
vhinsucompany.insuc_id ASC


");
    }
}
