<?php

MainConfig::connectDB();

function getInitialCashbookData($paymentID) {
    $cashbookData = array(
        "bankID" => '',
        "cashbookBalance" => 0
    );
    $query = "SELECT
ac_expence_payment.exp_bank_account_id,
ac_bank_accounts.account_balance
FROM
ac_expence_payment
INNER JOIN ac_bank_accounts ON ac_expence_payment.exp_bank_account_id = ac_bank_accounts.account_id
WHERE
ac_expence_payment.exp_payment_id = '$paymentID' LIMIT 1";

    $result = mysql_query($query);
    $row = mysql_fetch_row($result);

    $cashbookData['bankID'] = $row[0];
    $cashbookData['cashbookBalance'] = $row[1];

    return $cashbookData;
}

function getReqiredTables($paymentID) {
    $reqiredTables = array();
    $query = "SELECT
ac_payment_type_details.exp_payment_type_id
FROM
ac_payment_type_details
WHERE
ac_payment_type_details.exp_payment_id = '{$paymentID}'";
    $result = mysql_query($query);
    while ($row = mysql_fetch_assoc($result)) {
        $reqiredTables[] = $row;
    }
    return $reqiredTables;
}

function getVoteData($paymentID) {
    $voteData = array();
    $query = "SELECT
ac_expence_payment_votes.exp_vote_id,
ac_expence_payment_votes.exp_cash_amount,
ac_expence_payment_votes.exp_cross_amount
FROM
ac_expence_payment_votes
INNER JOIN ac_payment_type_details ON ac_expence_payment_votes.exp_payment_type_id = ac_payment_type_details.exp_type_detail_id
WHERE
ac_payment_type_details.exp_payment_id = '$paymentID'";

    $result = mysql_query($query);

    while ($row = mysql_fetch_assoc($result)) {
        $voteData[$row['exp_vote_id']] = array(
            "cash" => $row['exp_cash_amount'], "cross" => $row['exp_cross_amount']
        );
    }

    return $voteData;
}

function getAdvanceData($paymentID) {
    $advanceData = array();
    $query = "SELECT
ac_expence_payment_advanced.exp_advance_cash_amount,
ac_expence_payment_advanced.exp_advance_cross_amount
FROM
ac_expence_payment_advanced
INNER JOIN ac_payment_type_details ON ac_expence_payment_advanced.exp_payment_type_id = ac_payment_type_details.exp_type_detail_id
WHERE
ac_payment_type_details.exp_payment_id = '$paymentID'";

    $result = mysql_query($query);
    while ($row = mysql_fetch_assoc($result)) {
        $advanceData[] = array(
            "cash" => $row['exp_advance_cash_amount'], "cross" => $row['exp_advance_cross_amount']
        );
    }
    return $advanceData;
}

function getLoanData($paymentID) {
    $loanData = array();
    $query = "SELECT
ac_expence_employee_loan.exp_loan_amount,
ac_expence_employee_loan.exp_loan_cross_amount
FROM
ac_expence_employee_loan
INNER JOIN ac_payment_type_details ON ac_expence_employee_loan.exp_payment_detail_id = ac_payment_type_details.exp_type_detail_id
WHERE
ac_payment_type_details.exp_payment_id = '$paymentID'";
    $result = mysql_query($query);
    while ($row = mysql_fetch_assoc($result)) {
        $loanData[] = array(
            "cash" => $row['exp_loan_amount'], "cross" => $row['exp_loan_cross_amount']
        );
    }
    return $loanData;
}

function getDepositData($paymentID) {
    $depositData = array();
    $query = "SELECT
ac_expence_deposit.amount,
ac_expence_deposit.`cross`
FROM
ac_expence_deposit
INNER JOIN ac_payment_type_details ON ac_expence_deposit.inc_expence_type_details_id = ac_payment_type_details.exp_type_detail_id
WHERE
ac_payment_type_details.exp_payment_id = '$paymentID'";
    $result = mysql_query($query);
    while ($row = mysql_fetch_assoc($result)) {
        $depositData[] = array(
            "cash" => $row['amount'], "cross" => $row['cross']
        );
    }
    return $depositData;
}

function getExpSettlementData($paymentID){
    $expSettlementData = array();
    
    $query = "SELECT
ac_expense_settlement.settle_amount,
ac_expense_settlement.settle_cross
FROM
ac_payment_type_details
INNER JOIN ac_expense_settlement ON ac_expense_settlement.exp_type_detail_id = ac_payment_type_details.exp_type_detail_id
WHERE
ac_payment_type_details.exp_payment_id = '$paymentID'";
    
    
    $result = mysql_query($query);
    while ($row = mysql_fetch_assoc($result)) {
        $expSettlementData[] = array(
            "cash" => $row['settle_amount'], "cross" => $row['settle_cross']
        );
    }
    return $expSettlementData;
}

function initializeVoucherInsert($paymentID, $chequeNo, $chequeDate, $chequeBankID) {

    //get Reqired tables
    $reqiredTables = getReqiredTables($paymentID);

    //get initial cashbook balance
    $initialCashbookData = getInitialCashbookData($paymentID);

    //data needed to finalstep table insert is gathered in this array
    $voucherData = array(
        "paymentID" => $paymentID,
        "voucherTotalCash" => 0,
        "voucherTotalCross" => 0,
        "financeType" => 2,
        "chequeNo" => $chequeNo,
        "chequeDate" => $chequeDate,
        "chequeBankID" => $chequeBankID,
        "cashPay" => 0,
        "initialCashbookBalance" => $initialCashbookData['cashbookBalance'],
        "cashbookBankID" => $initialCashbookData['bankID'],
        "totalAmountToReduceFromCashbook" => 0
    );

    //vote id with vote cash & cross are loaded in this array
    $voteData = array();

    //advance cross & cash values are stored in this array
    $advanceData = array();

    
    //final step: settlement cash values are stored in this array
    $expSettlement = array();
    
    foreach ($reqiredTables as $value) {
        switch ($value['exp_payment_type_id']) {
            case 1:
                //filling voteData array
                $voteData = getVoteData($paymentID);

                //filling voucherData array
                foreach ($voteData as $key => $value) {
                    $voucherData['voucherTotalCash'] += $value['cash'];
                    $voucherData['voucherTotalCross'] += $value['cross'];
                    $voucherData['totalAmountToReduceFromCashbook'] += $value['cash'];
                }
                break;

            case 2:
                //filling advanceData array
                $advanceData = getAdvanceData($paymentID);

                //filling voucherData array
                foreach ($advanceData as $key => $value) {
                    $total = ($value['cash'] + $value['cross']);
                    $voucherData['voucherTotalCash'] += $value['cash'];
                    $voucherData['voucherTotalCross'] += $value['cross'];
                    $voucherData['totalAmountToReduceFromCashbook'] += $total;
                }
                break;

            case 3:
                //filling loanData array
                $loanData = getLoanData($paymentID);

                //filling voucherData array
                foreach ($loanData as $key => $value) {
                    $total = $value['cash'];
                    $voucherData['voucherTotalCash'] += $value['cash'];
                    $voucherData['voucherTotalCross'] += $value['cross'];
                    $voucherData['totalAmountToReduceFromCashbook'] += $total;
                }
                break;

            case 4:
                //filling expSettlement array
                $expSettlement = getExpSettlementData($paymentID);

                //filling voucherData array
                foreach ($expSettlement as $key => $value) {
                    $total = $value['cash'];
                    $voucherData['voucherTotalCash'] += $value['cash'];
                    $voucherData['voucherTotalCross'] += $value['cross'];
                    $voucherData['totalAmountToReduceFromCashbook'] += $total;
                }
                break;

            case 5:
                //filling depositData array
                $depositData = getDepositData($paymentID);

                //filling voucherData array
                foreach ($depositData as $key => $value) {
                    $total = $value['cash'];
                    $voucherData['voucherTotalCash'] += $value['cash'];
                    $voucherData['voucherTotalCross'] += $value['cross'];
                    $voucherData['totalAmountToReduceFromCashbook'] += $total;
                }
                break;
        }

        /**
         * important 
         * $voucherData['totalAmountToReduceFromCashbook'] uses here
         * 
         * 
         */
    }

    handleVoucherInsert($voteData, $voucherData);
}

function handleVoucherInsert($voteData, $voucherData) {

    mysql_query("SET AUTOCOMMIT=0");
    mysql_query("START TRANSACTION;");

    $voteBalanceUpdateFail = 0;
    $cashbookBalanceUpdateFail = 0;
    $finalStepInsertFail = 0;

    //update vote Allocation
    foreach ($voteData as $key => $value) {
        $voteTotal = ($value['cash'] + $value['cross']);
        $query = "INSERT INTO `accountsystem`.`ac_expence_vote_details` (`exp_vote_id`, `exp_vote_balance`) VALUES ('{$key}', (exp_vote_balance - '{$voteTotal}'))
ON DUPLICATE KEY 
UPDATE exp_vote_balance = '{$voteTotal}'";
        $done = mysql_query($query);
        if (!$done) {
            $voteBalanceUpdateFail++;
            $message = "Problem in Updating Vote Balance..!";
        }
    }

    //update cashbook balance
    $query = "UPDATE `accountsystem`.`ac_bank_accounts` SET `account_balance`= ( account_balance - '{$voucherData['totalAmountToReduceFromCashbook']}') WHERE (`account_id`='{$voucherData['cashbookBankID']}');";
    $done = mysql_query($query);
    if (!$done) {
        $cashbookBalanceUpdateFail++;
        $message = "Problem in Updating Cashbook Balance..!";
    }

    //insert to finalstep table
    $finalCashbookBalance = $voucherData['initialCashbookBalance'] - $voucherData['totalAmountToReduceFromCashbook'];
    $query = "INSERT INTO `accountsystem`.`ac_payment_final_step` (`exp_payment_id`, `exp_total_cash`, `exp_total_cross`, `exp_finance_type_id`, `exp_cheque_no`, `exp_cheque_date`, `exp_cheque_bank_id`, `exp_cash_pay`, `exp_cheque_pay`, `exp_initial_cashbook_balance`, `exp_final_cashbook_balance`) VALUES ('{$voucherData['paymentID']}', '{$voucherData['voucherTotalCash']}', '{$voucherData['voucherTotalCross']}', '{$voucherData['financeType']}', '{$voucherData['chequeNo']}', '{$voucherData['chequeDate']}', '{$voucherData['chequeBankID']}', '{$voucherData['cashPay']}', '{$voucherData['totalAmountToReduceFromCashbook']}', '{$voucherData['initialCashbookBalance']}', '{$finalCashbookBalance}')";
    $done = mysql_query($query);
    if (!$done) {
        $finalStepInsertFail++;
        $message = "Problem in Voucher Save..!";
    }


    if ($voteBalanceUpdateFail == 0 && $cashbookBalanceUpdateFail == 0 && $finalStepInsertFail == 0) {
        $message = "Voucher Successfully Completed..!";
        echo json_encode(array(array("msgType" => 1, "msg" => $message)));
        mysql_query("COMMIT");
    } else {
        echo json_encode(array(array("msgType" => 2, "msg" => $message)));
        mysql_query("ROLLBACK");
    }
//    mysql_query("ROLLBACK");
    mysql_query("SET AUTOCOMMIT=1");
}

function initializeVoucherDelete($paymentID) {
    //get Reqired tables
    $reqiredTables = getReqiredTables($paymentID);

    //get initial cashbook balance
    $initialCashbookData = getInitialCashbookData($paymentID);

    //data needed to deleteVoucher is gathered in this array
    $voucherData = array(
        "paymentID" => $paymentID,
        "voucherTotalCash" => 0,
        "voucherTotalCross" => 0,
        "initialCashbookBalance" => $initialCashbookData['cashbookBalance'],
        "cashbookBankID" => $initialCashbookData['bankID'],
        "totalAmountToAddToCashbook" => 0
    );

    //vote id with vote cash & cross are loaded in this array
    $voteData = array();

    //advance cross & cash values are stored in this array
    $advanceData = array();

    foreach ($reqiredTables as $value) {
        switch ($value['exp_payment_type_id']) {
            case 1:
                //filling voteData array
                $voteData = getVoteData($paymentID);

                //filling voucherData array
                foreach ($voteData as $key => $value) {
                    $voucherData['voucherTotalCash'] += $value['cash'];
                    $voucherData['voucherTotalCross'] += $value['cross'];
                    $voucherData['totalAmountToAddToCashbook'] += $value['cash'];
                }
                break;

            case 2:
                //filling advanceData array
                $advanceData = getAdvanceData($paymentID);

                //filling voucherData array
                foreach ($advanceData as $key => $value) {
                    $total = ($value['cash'] + $value['cross']);
                    $voucherData['voucherTotalCash'] += $value['cash'];
                    $voucherData['voucherTotalCross'] += $value['cross'];
                    $voucherData['totalAmountToAddToCashbook'] += $total;
                }
                break;

            case 3:
                $loanData = getLoanData($paymentID);
                foreach ($loanData as $key => $value) {
                    $total = ($value['cash'] + $value['cross']);
                    $voucherData['voucherTotalCash'] += $value['cash'];
                    $voucherData['voucherTotalCross'] += $value['cross'];
                    $voucherData['totalAmountToAddToCashbook'] += $total;
                }
                break;

            case 5:
                //filling depositData array
                $depositData = getDepositData($paymentID);

                //filling voucherData array
                foreach ($depositData as $key => $value) {
                    $total = $value['cash'];
                    $voucherData['voucherTotalCash'] += $value['cash'];
                    $voucherData['totalAmountToAddToCashbook'] += $total;
                }
                break;
        }

        /**
         * important 
         * $voucherData['totalAmountToAddToCashbook'] uses here
         * 
         * 
         */
    }

    handleVoucherDelete($voteData, $voucherData);
}

function handleVoucherDelete($voteData, $voucherData) {
    $voteBalanceUpdateFail = 0;
    $cashbookBalanceUpdateFail = 0;
    $deleteFail = 0;

    mysql_query("SET AUTOCOMMIT=0");
    mysql_query("START TRANSACTION;");


    //update vote Allocation
    foreach ($voteData as $key => $value) {
        $voteTotal = ($value['cash'] + $value['cross']);
        $query = "INSERT INTO `accountsystem`.`ac_expence_vote_details` (`exp_vote_id`, `exp_vote_balance`) VALUES ('{$key}', (exp_vote_balance + '{$voteTotal}'))
ON DUPLICATE KEY 
UPDATE exp_vote_balance = '{$voteTotal}'";
        $done = mysql_query($query);
        if (!$done) {
            $voteBalanceUpdateFail++;
            $message = "Problem in Updating Vote Balance..!";
        }
    }

    //update cashbook balance
    $query = "UPDATE `accountsystem`.`ac_bank_accounts` SET `account_balance`= ( account_balance + '{$voucherData['totalAmountToAddToCashbook']}') WHERE (`account_id`='{$voucherData['cashbookBankID']}');";
    $done = mysql_query($query);
    if (!$done) {
        $cashbookBalanceUpdateFail++;
        $message = "Problem in Updating Cashbook Balance..!";
    }


// delete voucher > deleting from ac_expence_payment removes the whole record
    if ($voteBalanceUpdateFail == 0 && $cashbookBalanceUpdateFail == 0) {
        $doneDelete = mysql_query("DELETE FROM `ac_expence_payment` WHERE (`exp_payment_id`='{$voucherData['paymentID']}')");
        if (!$doneDelete) {
            $deleteFail++;
            $message = "Problem in Deleting Voucher..!";
        }
    }


    if ($voteBalanceUpdateFail == 0 && $cashbookBalanceUpdateFail == 0 && $deleteFail == 0) {
        $message = "Voucher Successfully Deleted..!";
        echo json_encode(array(array("msgType" => 1, "msg" => $message)));
        mysql_query("COMMIT");
    } else {
        echo json_encode(array(array("msgType" => 2, "msg" => $message)));
        mysql_query("ROLLBACK");
    }


    mysql_query("SET AUTOCOMMIT=1");
}

function getIncomeJunkData() {
    $data = array();
    $query = "SELECT inc_tblFull.inc_receipt_id FROM
(SELECT
ac_income_receipt.inc_receipt_id
FROM
ac_income_receipt) AS inc_tblFull
LEFT JOIN
(SELECT
ac_income_receipt_final_step.inc_receipt_id
FROM
ac_income_receipt_final_step) AS inc_tblReal
ON
inc_tblFull.inc_receipt_id = inc_tblReal.inc_receipt_id
WHERE inc_tblReal.inc_receipt_id IS NULL";
    $result = mysql_query($query);
    while ($row = mysql_fetch_array($result)) {
        $data[] = $row['inc_receipt_id'];
    }
    return $data;
}

function getExpenseJunkData() {
    $data = array();
    $query = "SELECT exp_tblFull.exp_payment_id FROM
(SELECT
ac_expence_payment.exp_payment_id
FROM
ac_expence_payment) AS exp_tblFull
LEFT JOIN
(SELECT
ac_payment_final_step.exp_payment_id
FROM
ac_payment_final_step) AS exp_tblReal
ON
exp_tblFull.exp_payment_id = exp_tblReal.exp_payment_id
WHERE exp_tblReal.exp_payment_id IS NULL";
    $result = mysql_query($query);
    while ($row = mysql_fetch_array($result)) {
        $data[] = $row['exp_payment_id'];
    }
    return $data;
}

function optimizeDatabase() {
    $incomeJunkData = getIncomeJunkData();
    $expenseJunkData = getExpenseJunkData();


    $totalJunkDeleteCount = 0;
    $totalJunkFailCount = 0;

    mysql_query("SET AUTOCOMMIT=0");
    mysql_query("START TRANSACTION;");

    foreach ($expenseJunkData as $key => $value) {
        $query = "DELETE FROM `ac_expence_payment` WHERE (`exp_payment_id`=$value);";
        $done = mysql_query($query);
        if (!$done) {
            $totalJunkFailCount++;
        } elseif ($done) {
            $totalJunkDeleteCount ++;
        }
    }


    foreach ($incomeJunkData as $key => $value) {
//        echo $value."   ";
        $query = "DELETE FROM `ac_income_receipt` WHERE (`inc_receipt_id`=$value);";
        $done = mysql_query($query);
        if (!$done) {
            $totalJunkFailCount++;
        } elseif ($done) {
            $totalJunkDeleteCount ++;
        }
    }

    

    $message = "Optimization Completd : $totalJunkDeleteCount Unwanted Record(s) Deleted";


    echo json_encode(array(array("msgType" => 1, "msg" => $message)));
    mysql_query("COMMIT");
    mysql_query("SET AUTOCOMMIT=1");
}
