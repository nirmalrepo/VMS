<?php

function initializeReceiptDelete($paymentID, $bankAccountID) {
    $reqiredTables = array();
    //get Required Tables
    $result = mysql_query("SELECT
ac_receipt_type_details.inc_receipt_type_id,
ac_receipt_type_details.inc_receipt_id
FROM
ac_receipt_type_details
WHERE ac_receipt_type_details.inc_receipt_id = '{$paymentID}'")or die(mysql_error());
    while ($row = mysql_fetch_assoc($result)) {
        $reqiredTables[] = $row;
    }
    $voteTotalArray = array();
    $amountToReduceFromCashbook = 0;
    //gathering reqired data from each table
    foreach ($reqiredTables as $key => $value) {
        switch ($value['inc_receipt_type_id']) {
            case 1:
                //vote table
                $query = "SELECT
ac_income_receipt_votes.inc_vote_id,
(ac_income_receipt_votes.inc_cash_amount + ac_income_receipt_votes.inc_cross_amount ) AS receiptTotal,
ac_income_receipt_votes.inc_cash_amount
FROM
ac_income_receipt_votes
INNER JOIN ac_receipt_type_details ON ac_income_receipt_votes.inc_receipt_type_id = ac_receipt_type_details.inc_type_details_id
WHERE
ac_receipt_type_details.inc_receipt_id = '{$paymentID}'";
                $result = mysql_query($query);
                while ($row = mysql_fetch_assoc($result)) {
                    $voteID = $row['inc_vote_id'];
                    $voteTotalArray[$voteID] = $row['receiptTotal'];
                    $amountToReduceFromCashbook += $row['inc_cash_amount'];
                }



                break;
            case 2:
                // advance table
                $query = "SELECT
ac_expence_payment_advanced.exp_advance_cash_amount
FROM
ac_payment_type_details
INNER JOIN ac_expence_payment_advanced ON ac_expence_payment_advanced.exp_payment_type_id = ac_payment_type_details.exp_type_detail_id
WHERE
ac_payment_type_details.exp_payment_id = '{$paymentID}'";
                $result = mysql_query($query);
                while ($row = mysql_fetch_assoc($result)) {
                    $amountToReduceFromCashbook += $row['exp_advance_cash_amount'];
                }



                break;
            case 5:
                  $query = "SELECT
sum(ac_income_deposit.inc_deposit_amount) AS deposit_cash_tot
FROM
ac_income_deposit
WHERE
ac_income_deposit.inc_repeipt_id = '{$paymentID}'";
                $result = mysql_query($query);
                while ($row = mysql_fetch_assoc($result)) {
                    $amountToReduceFromCashbook += $row['deposit_cash_tot'];
                }
        } // end of switch
    } // end of for each

    handleReceiptDelete($paymentID, $bankAccountID, $voteTotalArray, $amountToReduceFromCashbook);
}

// end of initializeVoucherDelete()

function handleReceiptDelete($paymentID, $bankAccountID, $voteTotalArray, $amountToReduceFromCashbook) {
    $voteBalanceFail = 0;
    $voteBalanceSuccess = 0;
    $cashBookFail = 0;
    $cashBookSuccess = 0;
    $deleteFail = 0;
    $deleteSuccess = 0;


    mysql_query("SET AUTOCOMMIT=0");
    mysql_query("start transaction;");

//  update voteBalance
    foreach ($voteTotalArray as $key => $value) {
        $done = mysql_query("UPDATE `accountsystem`.`ac_income_vote_details` SET `inc_vote_balance`= (inc_vote_balance - $value) WHERE `inc_vote_id`='$key';");
        if (!$done) {
            $voteBalanceFail++;
        } else {
            $voteBalanceSuccess ++;
        }
    }

    // updateCashbook Balance
    $doneCashbookUpdate = mysql_query("UPDATE `accountsystem`.`ac_bank_accounts` SET `account_balance`= ( account_balance - '$amountToReduceFromCashbook') WHERE (`account_id`='$bankAccountID');");
    if (!$doneCashbookUpdate) {
        $cashBookFail++;
    } else {
        $cashBookSuccess ++;
    }


// delete voucher > deleting from ac_expence_payment removes the whole record
    if ($voteBalanceFail == 0 && $cashBookFail == 0) {
        $doneDelete = mysql_query("DELETE FROM `ac_income_receipt` WHERE (`inc_receipt_id`='$paymentID')");
        if (!$doneDelete) {
            $deleteFail++;
        } else {
            $deleteSuccess ++;
        }
    }





    if ($voteBalanceFail == 0 && $cashBookFail == 0 && $deleteFail == 0) {
        echo json_encode(1);
        mysql_query("COMMIT");
    } else {
        echo json_encode(0);
        mysql_query("ROLLBACK");
    }

//    mysql_query("ROLLBACK");
//    mysql_query("COMMIT");



    mysql_query("SET AUTOCOMMIT=1");
}
