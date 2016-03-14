<?php
//echo $_POST['invoNo'];
//echo '<br/>';
//echo $_POST['branchID'];
include './class/systemSetting.php';
$system = new setting();
if (isset($_POST['invoNo'])) {
    $data = $system->prepareSelectQuery("SELECT
in_invoice.brID,
in_invoice.billID,
in_invoice.billDt,
in_invoice.totalPayable,
in_invoice.jbID,
in_invoice.totalDiscoutAmt,
in_job.poOrID,
in_invoice.billProductionID,
in_customer.vatRegNo,
in_customer.cusName,
in_customer.cusAddressOne,
in_customer.cusAddressTwo,
in_customer.cusAddressThree,
in_vatnbt.vat,
in_vatnbt.nbt_val,
in_invoice.vat_status
FROM
in_invoice
INNER JOIN in_job ON in_invoice.jbID = in_job.jbID AND in_invoice.brID = in_job.brID
INNER JOIN in_customer ON in_invoice.billCusID = in_customer.cusID AND in_invoice.brID = in_customer.brID ,
in_vatnbt
WHERE
in_invoice.billID = '{$_POST['invoNo']}'");
    $cusAddressOne = $data[0]['cusAddressOne'];
    $cusAddressTwo = $data[0]['cusAddressTwo'];
    $cusAddressThree = $data[0]['cusAddressThree'];
    $cusName = $data[0]['cusName'];
    $yourOrNo = $data[0]['poOrID'];
    $productOrNo = $data[0]['billProductionID'];
    $vatNo = $data[0]['vatRegNo'];
    $branch = $data[0]['brID'];
    $invoNo = $data[0]['billID'];
    $invoDate = $data[0]['billDt'];
    $invoTotPayeble = $data[0]['totalPayable'];
    $invojbID = $data[0]['jbID'];
    $ecploadData = explode('.', $invoTotPayeble);
    $tot01 = $ecploadData[0];
    $tot02 = $ecploadData[1];
    $vat_rate = $data[0]['vat'];
//    with tax added details
    $vat_status = $data[0]['vat_status'];
    if ($vat_status == 1) {
        $inv_head = 'TAX ';
    } else {
        $inv_head = '';
    }

    $jobItem = $system->prepareSelectQuery("SELECT
in_jobitemdata.jbDescription,
in_jobitemdata.jbItemunitPrice,
SUM(in_delivery.delQty) AS dellQTy
FROM
in_jobitemdata
INNER JOIN in_delivery ON in_jobitemdata.jbbrId = in_delivery.brID 
AND in_jobitemdata.jbID = in_delivery.jbID 
AND in_jobitemdata.jbItemId = in_delivery.jbItemId
WHERE
in_jobitemdata.jbID = '{$invojbID}'"
            . "GROUP BY in_jobitemdata.jbItemId");

    $gedDelIds = $system->prepareSelectQuery("SELECT
in_delivery.delID,
in_delivery.delQty,
in_delivery.delDt
FROM
in_delivery
INNER JOIN in_invoice ON in_invoice.brID = in_delivery.brID AND in_invoice.jbID = in_delivery.jbID
WHERE in_invoice.brID = '{$branch}' AND in_invoice.billID = '{$invoNo}'");
    $delId = $gedDelIds[0]['delID'];
    $delId = $gedDelIds[0]['delQty'];
    $delId = $gedDelIds[0]['delDt'];
}
?>
<html>
    <head>
        <title></title>
        <style>
            .wrapword{
                white-space: -moz-pre-wrap !important;  /* Mozilla, since 1999 */
                white-space: -pre-wrap;      /* Opera 4-6 */
                white-space: -o-pre-wrap;    /* Opera 7 */
                white-space: pre-wrap;       /* css-3 */
                word-wrap: break-word;       /* Internet Explorer 5.5+ */
                word-break: break-all;
                white-space: normal;
            }

            @media Print {
                .hidePrint{
                    display: none;
                }
                table{
                    font-family: inherit;
                }
            }
        </style>
    </head>
    <body>
        <div class="hidePrint">
            <a href="invoiceDetails.php"><button type="button" style="width: 3cm; background-color: #a6e1ec; height: 1cm;" >Back</button></a>
            <button type="button" onclick="window.print()" style="width: 3cm; background-color: #5897fb; height: 1cm;" >Print</button>
        </div>
        <table style="width: 17cm;">
            <tr>
                <td style="width: 12cm; text-align: left; vertical-align: bottom; padding-left: 1cm;"><h2>Abans Graphics Privet Limited</h2></td>
                <td style="width: 5cm;"><h3><u><?php echo $inv_head; ?> INVOICE</u></h3></td>
            </tr>
        </table>
        <table style="width: 17cm; margin-top: -20px;">
            <tr>
                <td style="font-size: 12px; padding-left: 1.7cm;">161/3, Cotta Road, Rajagiriya. Tel : 4854370 Fax : 2865083 E-mail : abansgraphics@gmail.com</td>
            </tr>
        </table>
        <table style="width: 17cm;">
            <tr>
                <td style="font-size: 12px; padding-left: 1.5cm; font-weight: bold; width: 8cm;">Customer Name And Address : <br> <?php echo $cusName; ?><br><?php echo $cusAddressOne; ?><br><?php echo $cusAddressTwo; ?><br><?php echo $cusAddressThree; ?></td>
                <td style="font-size: 18px; padding-left: 4cm; font-weight: bold; width: 9cm; vertical-align: top;">No. :&nbsp;<?php echo '000' . $invoNo; ?></td>
            </tr>
        </table>
        <table style="width: 17cm; margin-top: 0cm;">
            <tr>
                <td style="font-size: 15px; padding-left: 11cm;">Date :&nbsp;<?php echo $invoDate; ?> </td>
            </tr>
        </table>
        <hr style="width: 17cm;">
        <table border="0" style="border-style: solid; width: 16cm; margin-top: 0cm; alignment-adjust: middle; margin-left: 1cm;">
            <thead>
                <tr>
                    <th rowspan="2" style="width: 7cm; text-align: center; vertical-align: top;">DESCRIPTION</th>
                    <th rowspan="2" style="width: 3cm; text-align: right; vertical-align: top;">QTY</th>
                    <th rowspan="" colspan="2" style="width: 3cm; text-align: right;">RATE</th>
                    <th style="width: 4cm; text-align: right;" colspan="2">AMOUNT</th>
                </tr>
                <tr>
                    <th style="width: 2.2cm; text-align: right;">Rs.</th>
                    <th style="width: 0.8cm; text-align: right;">cts</th>
                    <th style="width: 2.8cm; text-align: right;">Rs.</th>
                    <th style="width: 1.1cm; text-align: right;">cts</th>
                </tr>
            </thead>
        </table>
        <hr style="width: 17cm;">
            <table border="0" style="width: 16cm; margin-top: 0cm; alignment-adjust: middle; margin-left: 1cm;">
                <tbody>
                    <?php
                    if (!empty($jobItem)) {
                        foreach ($jobItem AS $aa) {
                            $rateAmount = explode('.', $aa['jbItemunitPrice']);
                            $r1 = $rateAmount[0];
                            $r2 = $rateAmount[1];
                            $amount = $aa['dellQTy'] * $aa['jbItemunitPrice'];
                            $toex = number_format($amount, 2, '.', '');
                            $totAmountEx = explode('.', $toex);
                            $tot1 = $totAmountEx[0];
                            $tot2 = $totAmountEx[1];
                            echo '<tr>
                        <td style="width: 7cm;" class="wrapword">' . $aa['jbDescription'] . '</td>
                        <td style="width: 3cm; text-align: right;">' . $aa['dellQTy'] . '</td>
                        <td style="width: 2.2cm; text-align: right;">' . $r1 . '</td>
                        <td style="width: 0.8cm; text-align: right;">' . $r2 . '</td>
                        <td style="width: 2.8cm; text-align: right;">' . $tot1 . '</td>
                        <td style="width: 1.1cm; text-align: right;">' . $tot2 . '</td>
                        </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        <hr style="width: 17cm;">
        <table border="0" style="width: 16cm; margin-left: 1cm; margin-top: 0cm;">
            <?php
            if ($vat_status == 1) {
                $vat_amount = ($invoTotPayeble / 100) * $vat_rate;

                $vat_amount_flt = number_format($vat_amount, 2, '.', '');
                $vat_expl = explode('.', $vat_amount_flt);
                $vat_1 = $vat_expl[0];
                $vat_2 = $vat_expl[1];


                $nbt_amount = $invoTotPayeble * $data[0]['nbt_val'];

                $nbt_amount_flt = number_format($nbt_amount, 2, '.', '');
                $nbt_expl = explode('.', $nbt_amount_flt);
                $nbt_1 = $nbt_expl[0];
                $nbt_2 = $nbt_expl[1];



                $invoice_vl = $invoTotPayeble + $vat_amount + $nbt_amount;

                $invoice_expl = number_format($invoice_vl, 2, '.', '');
                $invo_amount_expl = explode('.', $invoice_expl);
                $invoice_amount_1 = $invo_amount_expl[0];
                $invoice_amount_2 = $invo_amount_expl[1];

                echo "<tr>
                <td style=\"width: 11.5cm; text-align: right; padding-right: 1cm;\">Sales Value</td>
                <td style=\"width: 2.8cm; height: 0.5cm; text-align: right;\">" . $tot01 . "</td>
                <td style=\"width: 1cm; height: 0.5cm; text-align: right;\">." . $tot02 . "</td>
            </tr>";
                echo "<tr>
                <td style=\"width: 11.5cm; text-align: right; padding-right: 1cm; vertical-align: top;\">VAT</td>
                <td style=\"width: 2.8cm; height: 0.5cm; text-align: right; vertical-align: top;\">" . $vat_1 . "</td>
                <td style=\"width: 1cm; height: 0.5cm;  text-align: right; vertical-align: top;\">." . $vat_2 . "</td>
            </tr>";
                echo "<tr>
                <td style=\"width: 11.5cm; text-align: right; padding-right: 1cm; vertical-align: top;\">NBT</td>
                <td style=\"width: 2.8cm; height: 0.5cm; text-align: right;vertical-align: top;\">" . $nbt_1 . "</td>
                <td style=\"width: 1cm; height: 0.5cm;  text-align: right; vertical-align: top;\">." . $nbt_2 . "</td>
            </tr>";

                $invoice_value_1 = $invoice_amount_1;
                $invoice_value_2 = $invoice_amount_2;
            } else {
                $invoice_value_1 = $tot01;
                $invoice_value_2 = $tot02;
            }
            ?>
            <tr style="">
                <td style="padding-top: 8px; width: 11.5cm; text-align: right; padding-right: 1cm; vertical-align: top;">INVOICE VALUE</td>
                <td style="padding-top: 8px; width: 2.8cm; border-bottom: double; height: 0.5cm; text-align: right;vertical-align: top;"><?php echo $invoice_value_1; ?></td>
                <td style="padding-top: 8px;width: 1cm; border-bottom: double; height: 0.5cm;  text-align: right; vertical-align: top;">.<?php echo $invoice_value_2; ?></td>
            </tr>
        </table>
        <hr style="width: 17cm;">
        <table style="width: 16cm; margin-left: 1cm; margin-top: 0cm;">
            <tr>
                <td colspan="3" style="text-align: left; font-size: 9pt;" >YOUR ORDER No.&nbsp;<?php echo $yourOrNo; ?></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: left; font-size: 9pt;">PRODUCTION ORDER No.&nbsp;<?php echo $productOrNo; ?></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: left; font-size: 9pt;">JOB No.&nbsp;<?php echo $invojbID; ?></td>
            </tr>   
            <tr>
                <td colspan="3" style="text-align: left; font-size: 9pt;">DELIVERY ORDER Nos. :<div style="width: 7cm; margin-left: 150px; margin-top: -15px;"><?php
                        if (!empty($gedDelIds)) {
                            foreach ($gedDelIds AS $bb) {
                                echo '&nbsp;<u>' . $bb['delID'] . '</u>&nbsp;/&nbsp;' . $bb['delDt'] . '&nbsp;/&nbsp;Qty :' . $bb['delQty'] . '<br>';
                            }
                        }
                        ?></div></td>
            </tr>
            <tr>
                <td style="text-align: left; font-size: 9pt;"><b>VAT REGISTRATION No.&nbsp;<?php echo $vatNo; ?></b></td>
                <td style="width: 7cm;"></td>
                <td style="font-size: 9pt;">.................................<br>Authorized Signature</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: left; font-size: 9pt;">CHEQUES TO BE MADE PAYABLE TO "<b> ABANS GRAPHICS (PVT) LTD. </b>"</td>
            </tr>
        </table>
    </body>
</html>
