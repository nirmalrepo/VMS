function madeCheckBoxString(chkClassName, stringStoreID) {
    var ar = [];
    var es;
    var v;
    if ($(this).is(':checked')) {
        es = $(chkClassName + ':checked');
        es.each(function (index) {
            ar.push($(this).val());
        });
    } else {
        es = $(chkClassName + ':checked');
        es.each(function (index) {
            ar.push($(this).val());
        });
    }
    v = ar.join(',');
    $(stringStoreID).val(v);
}

function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode != 46 && charCode > 31
            && (charCode < 48 || charCode > 57))
        return false;

    return true;
}

function getBaseURL() {
    var url = location.href;  // entire url including querystring - also: window.location.href;
    var baseURL = url.substring(0, url.indexOf('/', 14));


    if (baseURL.indexOf('http://localhost') != -1) {
        // Base Url for localhost
        var url = location.href;  // window.location.href;
        var pathname = location.pathname;  // window.location.pathname;
        var index1 = url.indexOf(pathname);
        var index2 = url.indexOf("/", index1 + 1);
        var baseLocalUrl = url.substr(0, index2);

        return baseLocalUrl + "/";
    }
    else {
        // Root Url for domain name
        return baseURL + "/";
    }

}

function tableSorter(tableName) {
    $(tableName).tablesorter();
}

function delayLoading(callBack, waitingTime) {
    setTimeout(function () {
        callBack();
    }, waitingTime);
}

function submitBulkDataByPost(submitPage, submitData) {
    $('<form action="' + submitPage + '" method="POST"/>')
            .append($(submitData))
            .appendTo($(document.body))
            .submit();
}
function submitSingleDataByPost(submitPage, submitDataName, submitDataValue) {
    $('<form action="' + submitPage + '" method="POST"/>')
            .append($('<input type="hidden" name="' + submitDataName + '" value ="' + submitDataValue + '">'))
            .appendTo($(document.body))
            .submit();
}

function submitSingleDataByPostSpecial(submitPage, submitDataName1, submitDataValue1, submitDataName2, submitDataValue2) {
    $('<form action="' + submitPage + '" method="POST"/>')
            .append($('<input type="hidden" name="' + submitDataName1 + '" value ="' + submitDataValue1 + '">'))
            .append($('<input type="hidden" name="' + submitDataName2 + '" value ="' + submitDataValue2 + '">'))
            .appendTo($(document.body))
            .submit();
}

function submitSingleDataByPostNewTab(submitPage, submitDataName, submitDataValue, submitDataName2, submitDataValue2) {
    $('<form action="' + submitPage + '" method="POST"/>')
            .append($('<input type="hidden" name="' + submitDataName + '" value ="' + submitDataValue + '">'))
            .append($('<input type="hidden" name="' + submitDataName2 + '" value ="' + submitDataValue2 + '">'))
            .appendTo($(document.body))
            .submit();
}

function alertFadeOut() {
    $(".alert").delay(200).fadeOut(2000);
}

function chosenRefresh() {
    $("select").trigger("chosen:updated");
}

function timelyRedirect(url, delay) {
    setTimeout(function () {
        window.location = url;
    }, delay);
}

function refreshBootstrapSwitch() {
    $('.switch')['bootstrapSwitch']();
}

function modalShowEventCallBack(modalData, callback) {
    modalData.modal("show").on('shown.bs.modal', function () {
        callback();
    });
}

function confirmSepecial(heading, question, cancelButtonTxt, okButtonTxt, callback1, callback2) {
    var confirmModal = $('<div class="modal fade">' +
            '<div class="modal-dialog">' +
            '<div class="modal-content">' +
            '<div class="modal-header">' +
            '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
            '<h4 class="modal-title">' + heading + '</h4>' +
            '</div>' +
            '<div class="modal-body">' +
            '<p>' + question + '</p>' +
            '</div>' +
            '<div class="modal-footer">' +
            '<button type="button" class="btn btn-default" data-dismiss="modal" id="cancelbtn">' + cancelButtonTxt + '</button>' +
            '<button type="button" class="btn btn-primary" id="okButton">' + okButtonTxt + '</button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>');
    confirmModal.find('#okButton').click(function (event) {
        callback1();
        confirmModal.modal('hide');
    });
    confirmModal.find('#cancelbtn').click(function (event) {
        callback2();
        confirmModal.modal('hide');
    });
    confirmModal.modal('show');
}

function confirm(heading, question, cancelButtonTxt, okButtonTxt, callback) {
    var confirmModal = $('<div class="modal fade">' +
            '<div class="modal-dialog">' +
            '<div class="modal-content">' +
            '<div class="modal-header">' +
            '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
            '<h4 class="modal-title">' + heading + '</h4>' +
            '</div>' +
            '<div class="modal-body">' +
            '<p>' + question + '</p>' +
            '</div>' +
            '<div class="modal-footer">' +
            '<button type="button" class="btn btn-default" data-dismiss="modal">' + cancelButtonTxt + '</button>' +
            '<button type="button" class="btn btn-primary" id="OkButton">' + okButtonTxt + '</button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>');
    confirmModal.find('#OkButton').click(function (event) {
        callback();
        confirmModal.modal('hide');
    });
    confirmModal.modal('show');
}

function delevered_data_modal(job_id) {

    var aa = '<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +
            '<div class="modal-dialog">' +
            '<div class="modal-content" style="border-color: rgb(4, 30, 216);">' +
            '<div class="modal-header">';
    var head = '';
    '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div class="container">';
    var aabody = '';
    var aa2 = '<div>' +
            '</div>' +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="modal-footer">';
    var footer = '';
    var foo = '';
    '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';
    var aa_totz = 0;
    $.post("views/commenSettingView.php", {action: 'delevered_data_modal', job_id: job_id}, function (e) {
        $.each(e, function (index, qData) {

            if (e === undefined || e.length === 0 || e === null || e === false || e === '') {
                alert('error');
            } else {
                head = '<center><h3 class="modal-title" style="font-family: fantasy; color: #269abc; margin-bottom: 10px;">Delivered History Of Job ID : ' + qData.cc + '</h3></center>';

                aabody += '<h4 class="modal-title" id=""> &radic;  Delivered Date : ' + qData.bb + '</h4>';
                aabody += '<h4 class="modal-title" style="margin-left: 5px;"> &nbsp;  Delivered Qty &nbsp; : ' + qData.aa + '</h4>';
                aa_totz += parseInt(qData.aa);
                aabody += '<br>';
                footer = '<h5 class="modal-title" id=""><b>Total Delivered Qty\'s: ' + aa_totz + '</b></h5>';
                foo = '<h5 class="modal-title" id=""><b>Branch name of customer: ' + qData.brName + '</b></h5>';


            }

        });
        var confirmModal = $(aa + head + aabody + aa2 + footer + foo);
        confirmModal.find('#cancelButton').click(function () {
            confirmModal.modal('hide');
        });
        confirmModal.modal('show');
    }, "json");
}


function logout() {
    alertify.confirm("Are you sure want to log out the system", function (e) {
        if (e) {
            $.post("views/databaseViews.php", {proccess: 'logout'}, function (e) {
                timelyRedirect("dashboard.php", 0);
            });
        }
    });
}


function alertifyMsgDisplay(jsonArray, msgTime, sucess, fail) {
    $.each(jsonArray, function (index, msgData) {
        if (msgData.msgType === 1) {
            alertify.success(msgData.msg, msgTime);
            if (sucess !== undefined) {
                if (typeof sucess === 'function') {
                    sucess();
                }
            }
        } else if (msgData.msgType === 2) {
            alertify.error(msgData.msg, msgTime);
            if (fail !== undefined) {
                if (typeof sucess === 'function') {
                    fail();
                }
            }
        }
    });
}

function starterBgSlideTransition() {
    $('body').backstretch([
        "img/starterSlides/ubuntu_default.png"
    ], {
        duration: 3000, fade: 1000
    });
}
function starterBgSlideTransitionDashboard() {
    $('body').backstretch([
        "img/starterSlides/dark-gray_1.png"
    ], {
        duration: 3000, fade: 1000
    });
}

//////////////////////////////////////////////////////////
function branch_Save() {
    var branch_name = $('#branch_name').val();
    var brnch_address = $('#brnch_address').val();
    var brnch_phone = $('#brnch_phone').val();
    var brnch_email = $('#brnch_email').val();
    var brnch_fax = $('#brnch_fax').val();



    if (branch_name.length === 0 || brnch_phone.length === 0) {
        alert('Pleace fill out correct data..!');
    } else {
        $.post("views/commenSettingView.php", {action: 'branch_Save', branch_name: branch_name, brnch_address: brnch_address,
            brnch_phone: brnch_phone, brnch_email: brnch_email, brnch_fax: brnch_fax}, function (e) {
            alertifyMsgDisplay(e, 2000);
            clear_branch_fields();
            registerd_branch_table();
            $('#phone_msgok').html('');
            $('#e_valok').html('');
            $('#phone_msg').html('');

        }, "json");
    }
}
function update_branches(branch_id) {
    var branch_name = $('#branch_name').val();
    var brnch_address = $('#brnch_address').val();
    var brnch_phone = $('#brnch_phone').val();
    var brnch_email = $('#brnch_email').val();
    var brnch_fax = $('#brnch_fax').val();
    $.post("views/commenSettingView.php", {action: 'update_branches', branch_id: branch_id, branch_name: branch_name, brnch_address: brnch_address,
        brnch_phone: brnch_phone, brnch_email: brnch_email, brnch_fax: brnch_fax}, function (e) {
        alertifyMsgDisplay(e, 2000);
        clear_branch_fields();
        registerd_branch_table();
    }, "json");
}
function customer_registration_save() {
    var cus_name = $('#customer_name').val();
    var cus_reg_no = $('#customer_reg_no').val();
    var cus_address1 = $('#customer_adress1').val();
    var cus_address2 = $('#customer_adress2').val();
    var city = $('#city').val();
    var cont_tel_number = $('#cont_tel_number').val();
    var office_number1 = $('#office_number1').val();
    var office_number2 = $('#office_number2').val();
    var reg_date = $('#reg_Date').val();
    var branchID = $('.branchComboBox').val();
    var titlecombo = $('#titlecombo').val();
    var contactperson = $('#contactperson').val();
    var vat_reg_no = $('#vat_reg_no').val();
    if (parseInt(cus_name) !== 0 && cus_name !== '' && cus_name !== '') {
        $.post("views/commenSettingView.php", {action: 'customersave', branchComboDiv: branchID, cus_name: cus_name, cus_reg_no: cus_reg_no, cus_address1: cus_address1, cus_address2: cus_address2, city: city, cont_tel_number: cont_tel_number, office_number1: office_number1, office_number2: office_number2, reg_date: reg_date, titlecombo: titlecombo, contactperson: contactperson, vat_reg_no: vat_reg_no}, function (e) {
            alertifyMsgDisplay(e, 1000, function () {
                customer_registration_number($('.branchComboBox').val());
                registerd_customer_table();
                clearcustomerdata();
            });
        }, "json");
    } else {
        alertify.error("Error, Please Enter Correct Values", 1000);
    }
}
function clear_branch_fields() {
    $('#branch_name').val('');
    $('#brnch_address').val('');
    $('#brnch_phone').val('');
    $('#brnch_email').val('');
    $('#brnch_fax').val('');
    $('#branch_save_btn_div').show();
    $('#branches_updateBtn').addClass('hidden');
}
function select_branches(branchID) {
    $.post("views/commenSettingView.php", {action: 'select_branches', branchID: branchID}, function (e) {
        $('#branch_name').val(e[0].brName);
        $('#brnch_address').val(e[0].brAddress);
        $('#brnch_phone').val(e[0].brTel);
        $('#brnch_email').val(e[0].brEmail);
        $('#brnch_fax').val(e[0].brFax);
        $('#branch_Update_btn').val(e[0].brID);
        $('#branch_save_btn_div').hide();
        $('#branches_updateBtn').removeClass('hidden');
    }, "json");
}

function delete_branches(branchID) {
    $.post("views/commenSettingView.php", {action: 'delete_branches', branchID: branchID}, function (e) {
        alertifyMsgDisplay(e, 2000);
        registerd_branch_table();
    }, "json");
}

/////////////// BANK DaTA |||||
function hideBankActionBtn() {
    if ($('#bankActionBtn').hasClass('hidden')) {
        $('#bankActionBtn').addClass('hidden');
    }
}
function showBankActionBtn() {
    if ($('#bankActionBtn').hasClass('hidden')) {
        $('#bankActionBtn').removeClass('hidden');
    }
}

function saveBank() {
    $.post("views/commenSettingView.php", {action: 'saveBank', bankName: $('#bankName').val()}, function (e) {
        alertifyMsgDisplay(e, 1000, function () {
            loadBanksTable();
        });
    }, "json");
}

function bankDataSelect(id) {
    $.post("views/commenSettingView.php", {action: 'bankDataSelect', id: id}, function (e) {
        $.each(e, function (index, queryDate) {
            $('#bankName').val(queryDate.bank_name);
            $('#bankID').val(queryDate.id);
        });
    }, "json");
}
function bankDataClear() {
    $('#bankName').val('');
    $('#bankID').val('');
}

function updateBank() {
    var bankName = $('#bankName').val();
    var bankID = $('#bankID').val();
    $.post("views/commenSettingView.php", {action: 'updateBank', bankName: bankName, bankID: bankID}, function (e) {
        loadBanksTable();
        alertifyMsgDisplay(e, 1000);
        bankDataClear();
        hideBankActionBtn();
    }, "json");
}

function deleteBank(id) {
    confirm("Delete Bank", "Are You Sure want to delete this Bank", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'deleteBank', id: id}, function (e) {
            alertifyMsgDisplay(e, 1000);
            loadBanksTable();
        }, "json");
    });
}



//Anuruddha Jayawardana
function deliveryDataSave() {
    var branchComboBox = $('.branchComboBox').val();
    var jobComboBox = $('.jobComboBox').val();
    var delivery_id = $('#delivery_id').val();
    var delivery_qty = $('#delivery_qty').val();
    var delivery_date = $('#delivery_date').val();
    var itemID = $('#itemID').val();
    if (delivery_qty.length === 0 || delivery_date.length === 0) {
        alertify.error('Please fill all required fields..!', 1500);
    } else {
        $.post("views/commenSettingView.php", {action: 'delivery_Save', itemID: itemID, branchComboBox: branchComboBox, jobComboBox: jobComboBox, delivery_id: delivery_id, delivery_qty: delivery_qty, delivery_date: delivery_date}, function (e) {
            alertifyMsgDisplay(e, 2000);
            getJobDescription();
            get_delevery_id($('.branchComboBox').val());
            cleardelivery();
        }, "json");
    }
}
function cleardelivery() {
    $('#delivery_qty').val('');
}

function select_Delivery() {
    var jobItemTblID = $('#jobItemTblID').val();
    $.post("views/commenSettingView.php", {action: 'delvaryselect', deliID: jobItemTblID}, function (e) {
        $.each(e, function (index, qData) {
            branch_ComboBox(qData.brID);
            job_ComboBox(qData.brID, qData.jbID);
            $('#delivery_id').val(qData.delID);
            $('#delivery_qty').val(qData.delQty);
            $('#delivery_date').val(qData.delDt);
            $('#deliv_id').val(qData.aiID);
        });



    }, "json");
}

function get_delevery_id(branID) {
    $.post("views/commenSettingView.php", {action: 'getbranchid', branID: branID}, function (e) {
        $.each(e, function (index, qData) {
            $('#delivery_id').val(qData.delivrID);
        });

    }, "json");
}

function systemdataUpdate() {

    var branchComboBox = $('.branchComboBox').val();
    var jobComboBox = $('.jobComboBox').val();
    var delivery_qty = $('#delivery_qty').val();
    var delivery_date = $('#delivery_date').val();
    var autodeli_id = $('#deliv_id').val();
    $.post("views/commenSettingView.php", {action: 'update_del_data', branchComboBox: branchComboBox,
        jobComboBox: jobComboBox, delivery_qty: delivery_qty, delivery_date: delivery_date, autodeli_id: autodeli_id},
    function (e) {
        alertifyMsgDisplay(e, 2000);
        delivery_table();
        cleardelivery();
    }, "json");
}
function validatedelivary(callback) {
    var branch = $('.branchComboBox').val();
    var job = $('.jobComboBox').val();
    $.post("views/commenSettingView.php", {action: 'delquan_validate', branch: branch, job: job}, function (e) {

        $.each(e, function (index, qData) {
            $('#qtyy_id').val(qData.jbQty);
        });
        if ($.type(callback) === 'function') {
            callback();
        }
    }, "json");
}
//amila
function getJobId(data) {
    $.post("views/commenSettingView.php", {action: 'getjobId', branchID: data}, function (e) {
        $('#jobID').val(e);
    });
}
function save_jobs_fnc() {
    var branchComboBox = $('#branchComboBox').val();
    var jobID = $('#jobID').val();
    var customer = $('#customer').val();
    var po_number = $('#po_number').val();
    var po_date = $('#po_date').val();
    var job_date = $('#date').val();
    $.post("views/commenSettingView.php", {action: 'save_jobs_fnc', branchComboBox: branchComboBox,
        jobID: jobID, customer: customer, job_date: job_date, po_number: po_number, po_date: po_date}, function (e) {
        if (e[0]['msgType'] === 1) {
            alertifyMsgDisplay(e, 2000);
            $('#itam_reg_data').removeClass("hidden");
            $('#main_reg_data').addClass("hidden");
            $('#main_data_table_div').addClass("hidden");
            $('#item_details_table_div').removeClass("hidden");
            $('#start_job_btn').prop("disabled", true);
            clear_jobs_items_form_fields();
            add_items_for_jobs_table();

//            disable main reg details fields
            $('#date').prop("disabled", true);
            $('#po_number').prop("disabled", true);
            $('#po_date').prop("disabled", true);
        } else {
            alertifyMsgDisplay(e, 2000);
            clear_jobs_items_form_fields();
        }
//            job_registration_data_table();
//            getJobId($('#branchComboBox').val());
    }, "json");
}

function add_items_for_jobs() {
    var branchComboBox = $('#branchComboBox').val();
    var description = $('#description').val();
    var qun = $('#qun').val();
    var uPrice = $('#uPrice').val();
    var discount_rate = parseFloat($('#discount').val());
    var job_id = $('#jobID').val();
    if (qun.length === 0 && uPrice.length === 0) {
        alert('Please fill out correct data.')
    } else {

        $.post("views/commenSettingView.php", {action: 'add_items_for_jobs', branchComboBox: branchComboBox, description: description, qun: qun,
            uPrice: uPrice, discount_rate: discount_rate, job_id: job_id}, function (e) {
            alertifyMsgDisplay(e, 2000);
            $('#description').val('');
            $('#qun').val('');
            $('#uPrice').val('');
            $('#discount').val('');
            add_items_for_jobs_table();
        }, "json");
    }
}

function select_job_details(selected_job_id) {
    $.post("views/commenSettingView.php", {action: 'select_job_details', selected_job_id: selected_job_id}, function (e) {
//        alert(e.jbID);
        $('#jobID').val(e.jbID);
        $('#date').val(e.jbDt);
        $('#job_reg_Update_btn').val(e.aiID);
        $('#job_reg_save_btn_div').hide();
        customer_ComboBox(e.cusID, e.brID);
        $('#job_reg_update_btn_div').removeClass('hidden');
        $('#po_number').val(e.poOrID);
        $('#po_date').val(e.poOrDt);
    }, "json");
}
function delete_job_item(sel_itmID) {
    $.post("views/commenSettingView.php", {action: 'delete_job_item', sel_itmID: sel_itmID}, function (e) {
        alertifyMsgDisplay(e, 2000);
        add_items_for_jobs_table();
    }, "json");
}
function update_jobs_fnc(selected_job_id) {
    var branchComboBox = $('#branchComboBox').val();
    var jobID = $('#jobID').val();
    var customer = $('#customer').val();
    var job_date = $('#date').val();

    var po_number = $('#po_number').val();
    var po_date = $('#po_date').val();
    $.post("views/commenSettingView.php", {action: 'update_jobs_fnc', selected_job_id: selected_job_id, branchComboBox: branchComboBox,
        jobID: jobID, customer: customer, job_date: job_date,
        po_date: po_date, po_number: po_number}, function (e) {
        alertifyMsgDisplay(e, 2000);
        clear_jobs_form_fields();
        job_registration_data_table();
    }, "json");
}

function clear_jobs_items_form_fields() {
    $('#description').val('');
    $('#qun').val('');
    $('#uPrice').val('');
    $('#discount').val('');
}
function select_customer(cusid) {
    $.post("views/commenSettingView.php", {action: 'cus_select', cusid: cusid}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            alert('error');
        } else {
            $('#customer_name').val(e[0].cusName);
            $('#customer_reg_no').val(e[0].cusID);
            $('#customer_adress1').val(e[0].cusAddressOne);
            $('#customer_adress2').val(e[0].cusAddressTwo);
            $('#city').val(e[0].cusAddressThree);
            $('#contactperson').val(e[0].cusContactPers);
            $('#cont_tel_number').val(e[0].cusContPerTel);
            $('#office_number1').val(e[0].cusTel);
            $('#office_number2').val(e[0].cusOffTel);
            $('#reg_Date').val(e[0].cusRegDt);
            $('#cushiddenid').val(e[0].aiID);
            $('#vat_reg_no').val(e[0].vatRegNo);
            title_ComboBox(e[0].perTlID);
        }
    }, "json");
}

function delete_customer(del_id) {

    confirm("Delete Data", "Are you sure want to delete data", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'delete_customer', del_id: del_id}, function (e) {

            registerd_customer_table();
            clearcustomerdata();
            alertifyMsgDisplay(e, 2000)


        }, "json");
    });
}




function update_customer() {
    var cus_name = $('#customer_name').val();
    var cus_address1 = $('#customer_adress1').val();
    var cus_address2 = $('#customer_adress2').val();
    var city = $('#city').val();
    var cont_tel_number = $('#cont_tel_number').val();
    var office_number1 = $('#office_number1').val();
    var office_number2 = $('#office_number2').val();
    var reg_date = $('#reg_Date').val();
    var titlecombo = $('#titlecombo').val();
    var contactperson = $('#contactperson').val();
    var vat_reg_no = $('#vat_reg_no').val();
    var cus_hide = $('#cushiddenid').val();
    if (parseInt(cus_name) !== 0 && cus_name !== '' && cus_name !== '') {
        $.post("views/commenSettingView.php", {action: 'updatecustomer', cus_name: cus_name, cus_address1: cus_address1, cus_address2: cus_address2, city: city, cont_tel_number: cont_tel_number, office_number1: office_number1, office_number2: office_number2, reg_date: reg_date, titlecombo: titlecombo, contactperson: contactperson, vat_reg_no: vat_reg_no, cus_hide: cus_hide}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                alertify.error("No Data Found For Update", 1000);
            } else {
                $.each(e, function (index, qData) {
                    alertify.success("successfully updated", 1000);
                    registerd_customer_table();
                    clearcustomerdata();
                });
            }
        }, "json");
    } else {
        alertify.error("Sorry This Data Error Occured When Updating", 1000);
    }
}


function clearcustomerdata() {
    $('#customer_name').val('');
    $('#customer_adress1').val('');
    $('#customer_adress2').val('');
    $('#city').val('');
    $('#cont_tel_number').val('');
    $('#office_number1').val('');
    $('#office_number2').val('');
    $('#reg_Date').val('');
    $('#titlecombo').val('');
    $('#contactperson').val('');
    $('#vat_reg_no').val('');
}

function getInvoID() {
    var branchComboBox = $('.branchComboBox').val();
    $.post("views/commenSettingView.php", {action: 'getInvoID', branID: branchComboBox}, function (e) {
        $('#invoNo').val(e);
    });
}

function setJobDataToInvoice(data) {
    $.post("views/commenSettingView.php", {action: 'setJobDataToINvo', jobID: data}, function (e) {
        $.each(e, function (index, qData) {
            var price = parseFloat(qData.jbUnitPrice) * parseFloat(qData.totqun);
            var discount = parseFloat(price) * parseFloat((qData.jbDiscountRt) / 100);
            $('#jobNo').val(qData.jbID);
            $('#delQTY').val(qData.totqun);
            $('#price').val(price.toFixed(2));
            $('#discount').val(discount);
        });
    }, "json");
}



$('#branch_name').keyup(function () {
    var branch_name = $(this).val();
    check_branch_name(branch_name);
});


function check_branch_name(data) {
    $.post("views/commenSettingView.php", {check_branch_name: 'data', branch_name: data}, function (e) {
        if (e == 0) {
            $('#branch_save_btn_div').slideDown();
            $('#branch_msg').html('');

        } else {
            $('#branch_save_btn_div').slideUp();
            $('#branch_msg').html('<i class="glyphicon glyphicon-warning-sign"></i> Branch Name Currently Exsist In The System');
        }

    });


}


function clearInvoFelds() {
    $('#jobNo').val('');
    $('#date').val();
    $('#systemUser').val();
    $('#systemTime').val();
    $('#delQTY').val('');
    $('#payType').val('');
    $('#chequeAmount').val('');
    $('#cashAmount').val('');
    $('#chequeAmount').val('');
    $('#price').val('');
    $('#bank').val('');
    $('#chequeNo').val('');
    $('#discount').val('');
}

function compleatInvoice() {
    var customerID = $('#customer').val();
    var branchComboBox = $('.branchComboBox').val();
    var jobNo = $('#jobNo').val();
    var invoNo = $('#invoNo').val();
    var date = $('#date').val();
    var systemUser = $('#systemUser').val();
    var systemTime = $('#systemTime').val();
    var payType = $('#payType').val();
    var cashAmount = $('#cashAmount').val();
    var chequeAmount = $('#chequeAmount').val();
    var inv_po_number = $('#inv_po_number').val();
    if (payType == 1) {
        var totalPayebleAmount = $('#cashAmount').val();
    } else {
        var totalPayebleAmount = $('#chequeAmount').val();
    }
    var price = $('#price').val();
    var bank = $('#bank').val();
    var chequeNo = $('#chequeNo').val();
    var discount = $('#discount').val();
    var vat_stasus = $('.vat_radio:checked').val();
//    alert(vat_stasus);
    $.post("views/commenSettingView.php", {action: 'copletInvoice', customerID: customerID,
        totalPayebleAmount: totalPayebleAmount, discount: discount, payType: payType, branchComboBox: branchComboBox, jobNo: jobNo,
        invoNo: invoNo, date: date, systemUser: systemUser, systemTime: systemTime, cashAmount: cashAmount,
        chequeAmount: chequeAmount, price: price, bank: bank, chequeNo: chequeNo, inv_po_number: inv_po_number, vat_stasus: vat_stasus}, function (e) {
        alertifyMsgDisplay(e, 2000);
        updateCountTableUnderInvoice();
        confirmSepecial("Print Invoice", "Are You Want To Print This Invoice", "No", "Yes", function () {
            submitSingleDataByPostSpecial("invoicePrint.php", "invoNo", $('#invoNo').val(), "branchID", $('.branchComboBox').val());
        }, function () {
            getUserRelatedJobs();
            clearInvoFelds();
            getInvoID();
        });
    }, "json");
}

function updateCountTableUnderInvoice() {
    var branchComboBox = $('.branchComboBox').val();
    var invoNo = $('#invoNo').val();
    var jobNo = $('#jobNo').val();
    $.post("views/commenSettingView.php", {action: 'updateCountTableUnderInvo', branchComboBox: branchComboBox, invoNo: invoNo, jobNo: jobNo}, function (e) {

    });
}

function getJobDescription() {
    var jobItemTblID = $('#jobItemTblID').val();
    var branchID = $('#branchComboBox').val();
    var jobID = $('.jobComboBox').val();
    $.post("views/commenSettingView.php", {action: 'getJobDescription', branchID: branchID, jobID: jobID, slectedItem: jobItemTblID}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            $('#jobDesc').val('Description Not Found')
        } else {
            $('#jobDesc').val(e[0]['jbDescription']);
            $('#orderdQty').val('Ordered Qty. : ' + e[0]['jbItemQty']);
            if (e[0]['totdeed'] == null) {
                $('#DleverdQty').val('Currently Delivered Qty. : 0');
            } else {
                $('#DleverdQty').val('Currently Delivered Qty. : ' + e[0]['totdeed']);
            }
            $('#itemID').val(e[0]['jbItemId']);
            $('#delveredQty').val(e[0]['totdeed']);
            $('#qtyy_id').val(e[0]['jbItemQty']);

        }
    }, "json");
}
function clear_jobs_form_fields() {
    $('#date').prop("disabled", false);
    $('#po_number').prop("disabled", false);
    $('#po_date').prop("disabled", false);
    $('#po_number').val('');
}

function chsngeVat() {
    var vatval = $('#vatval').val();
    $.post("views/commenSettingView.php", {changevat: 'data', vatval: vatval}, function (e) {
        alertifyMsgDisplay(e, 2000);
        loadvatnbt();
    }, "json");
}

function chsngenbt() {
    var nbtval = $('#nbtval').val();
    $.post("views/commenSettingView.php", {changenbt: 'data', nbtval: nbtval}, function (e) {
        alertifyMsgDisplay(e, 2000);
        loadvatnbt();
    }, "json");
}

//sanjeewa

function clear_vehicle_repair() {
    $('#rp_date').val('');
    $('#rp_date').val('');
    $('#rp_desc').val('');
    $('#rp_place').val('');
    $('#rp_cost').val('');
}


//////////////////////////////////////////////////////////
function vehicleRepSave() {
    var rp_branch = $('#rp_branch').val();
    var rp_vehicle = $('#rp_vehicle').val();
    var rp_date = $('#rp_date').val();
    var rp_desc = $('#rp_desc').val();
    var re_place = $('#rp_place').val();
    var re_cost = $('#rp_cost').val();
    if (rp_branch.length === 0 || rp_branch.length === 0) {
        alert('Pleace fill out correct data..!');
    }
    if ($.trim(rp_date).length == 0) {
        alertify.error("Enter Repair Date!", 3000);
        return;
    }
    if ($.trim(rp_desc).length == 0) {
        alertify.error("Enter Description!", 3000);
        return;
    }
    if ($.trim(re_place).length == 0) {
        alertify.error("Repaired place Required!", 3000);
        return;
    }
    if ($.trim(re_cost).length == 0) {
        alertify.error("Enter a cost!", 3000);
        return;
    }
    else {
        $.post("views/commenSettingView.php", {action: 'vehicle_Save', rp_branch: rp_branch, rp_vehicle: rp_vehicle,
            rp_date: rp_date, re_place: re_place, rp_desc: rp_desc, re_cost: re_cost}, function (e) {
            alertifyMsgDisplay(e, 2000);
            clear_vehicle_repair();
            repair_vehicle_table($('#rp_vehicle').val());

        }, "json");
    }
}

function select_repair_vehicle(rp_id, callback) {
    $.post("views/commenSettingView.php", {action: 'select_vehicle_rep', rp_id: rp_id}, function (e) {
        $('#rp_branch').val(e[0].br_id);
        $('#rp_id').val(e[0].rp_id);
        $('#re_vehicle').val(e[0].vh_id);
        $('#rp_date').val(e[0].rp_date);
        $('#rp_place').val(e[0].rp_place);
        $('#rp_desc').val(e[0].rp_desc);
        $('#rp_cost').val(e[0].rp_cost);
//        $('#branch_Update_btn').val(e[0].brID);
        $('#vehi_reg_save_btn_div').hide();
        $('#vehicle_rep_update_btn_div').removeClass('hidden');
        if ($.type(callback) === 'function') {
            callback();
        }
    }, "json");
}

function update_vehicle_repair(rp_id) {

//    var re_branch = $('#rp_branch').val();
//    var re_vehicle = $('#rp_vehicle').val();
    var rp_date = $('#rp_date').val();
    var rp_desc = $('#rp_desc').val();
    var rp_place = $('#rp_place').val();
    var rp_cost = $('#rp_cost').val();
//    if (rp_branch.length === 0 || rp_branch.length === 0) {
//        alert('Pleace fill out correct data..!');
//    }
    if ($.trim(rp_date).length == 0) {
        alertify.error("Enter Repair Date!", 3000);
        return;
    }
    if ($.trim(rp_desc).length == 0) {
        alertify.error("Enter Description!", 3000);
        return;
    }
    if ($.trim(rp_place).length == 0) {
        alertify.error("Repaired place Required!", 3000);
        return;
    }
    if ($.trim(rp_cost).length == 0) {
        alertify.error("Enter a cost!", 3000);
        return;
    }
    else {

        $.post("views/commenSettingView.php", {action: 'update_vehicle_rep', rp_id: rp_id, rp_date: rp_date,
            rp_desc: rp_desc, rp_place: rp_place, rp_cost: rp_cost}, function (e) {
            alertifyMsgDisplay(e, 2000);
            clear_vehicle_repair();
            repair_vehicle_table($('#rp_vehicle').val());
            $('#vehicle_rep_Update_btn').addClass('hidden');
            $('#job_reg_reset_btn').addClass('hidden');
//            $('#vehi_rep_save_btn').removeClass('hidden');
            $('#vehi_reg_save_btn_div').show();
        }, "json");
    }
}

function delete_vehicles(veID) {
    $.post("views/commenSettingView.php", {action: 'delete_vehicle', veID: veID}, function (e) {
        alertifyMsgDisplay(e, 2000);
        repair_vehicle_table($('#rp_vehicle').val());
    }, "json");
}
function delete_vehicles_repair(veID) {
    $.post("views/commenSettingView.php", {action: 'delete_vehicles_repair', veID: veID}, function (e) {
        alertifyMsgDisplay(e, 2000);
        repair_vehicle_table($('#rp_vehicle').val());
    }, "json");
}


//vehicle dispose

function clear_data_dispose() {
//    $('#disp_date').val('');
    $('#desc').val('');
    $('#sell_amount').val('');
//    $('#fuel_cost').val('');
}
function vehicleDisposeSave() {
    var rp_branch = $('#rp_branch').val();
    var rp_vehicle = $('#rp_vehicle').val();
    var vehicle_type = $('#vehicle_type').val();
    var disp_date = $('#disp_date').val();
    var desc = $('#desc').val();
    var sell_amount = $('#sell_amount').val();
    if (rp_branch.length === 0 || rp_branch.length === 0) {
        alert('Pleace fill out correct data..!');
    } else {
        $.post("views/commenSettingView.php", {action: 'vehicle_dispose', rp_branch: rp_branch, rp_vehicle: rp_vehicle,
            vehicle_type: vehicle_type, disp_date: disp_date, desc: desc, sell_amount: sell_amount}, function (e) {
            alertifyMsgDisplay(e, 2000);
            clear_data_dispose();
            dispose_vehicle_table();

        }, "json");
    }
}

function select_dispose_vehicle(disp_id) {
    $.post("views/commenSettingView.php", {action: 'select_vehicle_dispose', disp_id: disp_id}, function (e) {
        $('#rp_branch').val(e[0].br_id);
        $('#rp_vehicle').val(e[0].vh_id);
        $('#disp_id').val(e[0].disp_id);
        $('#vehicle_type').val(e[0].type);
        $('#disp_date').val(e[0].disp_date);
        $('#desc').val(e[0].desc);
        $('#sell_amount').val(e[0].sell_amt);
//        $('#branch_Update_btn').val(e[0].brID);
        $('#vehi_dispose_save_btn_div').hide();
        $('#vehicle_dispose_update_btn_div').show();
        $('#vehicle_dispose_update_btn_div').removeClass('hidden');
    }, "json");
}

function update_vehicle_dispose(disp_id) {

//    var rp_branch = $('#rp_branch').val();
//    var rp_vehicle = $('#rp_vehicle').val();
    var vehicle_type = $('#vehicle_type').val();
    var disp_date = $('#disp_date').val();
    var desc = $('#desc').val();
    var sell_amount = $('#sell_amount').val();

    $.post("views/commenSettingView.php", {action: 'update_vehicle_des', disp_id: disp_id, vehicle_type: vehicle_type, disp_date: disp_date,
        desc: desc, sell_amount: sell_amount}, function (e) {
        alertifyMsgDisplay(e, 2000);
        clear_data_dispose();
        dispose_vehicle_table($('#vehicle_type').val());
        $('#vehicle_dispose_update_btn_div').hide();
        $('#vehi_dispose_save_btn_div').show();
        $('#job_reg_reset_btn').show();
    }, "json");
}

function delete_vehicles_dispose(disp_id) {
//    alert(disp_id);
    $.post("views/commenSettingView.php", {action: 'delete_vehicles_dispose', disp_id: disp_id}, function (e) {
        alertifyMsgDisplay(e, 2000);
        dispose_vehicle_table($('#vehicle_type').val());
        clear_data_dispose();
    }, "json");
}
//Nirmal

//////////////////////////////////////////////////////////
function vid_val_load(branchVal) {

    $.post("views/commenSettingView.php", {action: 'loadVID', branchVal: branchVal}, function (e) {
        $.each(e, function (index, qData) {
            if (qData.vh_id == '') {
                $('.vid').val('No Data Found');
            } else {
                $('.vid').val(qData.vh_id);
                var brid = $('#branchCombo').val();
                var vid = $('#vid').val();
                var mkdir = brid + '-'.concat(vid);
                view_slide(mkdir);
            }
        });
    }, "json");
}
function dr_id_val_load(branchVal) {
    $.post("views/commenSettingView.php", {action: 'loadDID', branchVal: branchVal}, function (e) {
        $.each(e, function (index, qData) {
            if (qData.driv_id == '') {
                $('.dr_id').val('No Data Found');
            } else {
                $('.dr_id').val(qData.driv_id);
            }
        });
    }, "json");
}
function vid_val_load_for_repair(branchVal, regID, cb) {

    $.post("views/commenSettingView.php", {action: 'loadVID_for_repair', branchVal: branchVal, regID: regID}, function (e) {
        $.each(e, function (index, qData) {
            if (qData.vh_id == '') {
                $('.vid').val('No Data Found');
            } else {
                $('.vid').val(qData.vh_id);
//                var brid = $('#branchCombo').val();
//                var vid = $('#vid').val();
//                var mkdir = brid + '-'.concat(vid);
//                view_slide(mkdir);
            }
            if ($.type(cb) === 'function') {
                cb();
            }
        });
    }, "json");
}

function save_fuel_management_data() {
    var branchcombo = $('.branchComboBox').val();
    var vehicleCombo = $('.vehicleComboBox').val();
    var rp_date = $('#rp_date').val();
//    var relate_vehicle = $('#relate_vehicle').val();
    var qty_fuel = $('#qty_fuel').val();
    var fuel_cost = $('#fuel_cost').val();
    if (parseInt(fuel_cost) !== 0 && fuel_cost !== '' && fuel_cost !== '') {
        $.post("views/commenSettingView.php", {action: 'fuel_mnmnt_save', branchcombo: branchcombo, vehicleCombo: vehicleCombo, rp_date: rp_date, qty_fuel: qty_fuel, fuel_cost: fuel_cost}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                alertify.error("Save Failed", 1000);
            } else {
                fuel_management_table_load();
                alertify.success("successfully Saved", 1000);
                clear_data();
            }
        }, "json");
    } else {
        alertify.error("Error, Please Enter Correct Values", 1000);
    }
}

function select_fuel_info_data(fuel_id) {
    $.post("views/commenSettingView.php", {action: 'set_fuel_info', fuel_id: fuel_id}, function (e) {
        $.each(e, function (index, qData) {
            $('.branchComboBox').val(qData.br_id);
            $('.vehicleComboBox').val(qData.vh_id);
            $('#rp_date').val(qData.fuel_date);
            $('#qty_fuel').val(qData.qty_fuel);
            $('#fuel_cost').val(qData.fuel_cost);
            $('#hidden_fuel').val(qData.fuel_id);
        });
        showFuelActionBtn();
    }, "json");
}


function dlete_fuel_info_data(fuel_del_id) {

    confirm("Delete Data", "Are you sure want to delete data", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'delete_fuel', fuel_del_id: fuel_del_id}, function (e) {
            fuel_management_table_load();
            alertifyMsgDisplay(e, 2000)
            clear_data();

        }, "json");
    });
}
function showFuelActionBtn() {
    if ($('#job_reg_update_btn_div').hasClass('hidden')) {
        $('#job_reg_update_btn_div').removeClass('hidden');
    }
}
function hideFuelActionBtn() {
    if (!$('#job_reg_update_btn_div').hasClass('hidden')) {
        $('#job_reg_update_btn_div').addClass('hidden');
    }
}

function update_fuel_info_data() {
    var hidden_fuel = $('#hidden_fuel').val();
    var branchcombo = $('.branchComboBox').val();
    var vehicleCombo = $('.vehicleComboBox').val();
    var rp_date = $('#rp_date').val();
//    var relate_vehicle = $('#relate_vehicle').val();
    var qty_fuel = $('#qty_fuel').val();
    var fuel_cost = $('#fuel_cost').val();
    if (fuel_cost !== '') {
        $.post("views/commenSettingView.php", {action: 'fuel_mnmnt_update', branchcombo: branchcombo, vehicleCombo: vehicleCombo, rp_date: rp_date, qty_fuel: qty_fuel, fuel_cost: fuel_cost, hidden_fuel: hidden_fuel}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                alertify.error("No Data Found For Update", 1000);
            } else {
                fuel_management_table_load();
                clear_data();
                hideFuelActionBtn();
                alertify.success("successfully updated", 1000);

            }
        }, "json");
    } else {
        alertify.error("Sorry This Data Error Occured When Updating", 1000);
    }
}


function clear_data() {
    $('#hidden_fuel').val('');
    $('#rp_date').val('');
    $('#qty_fuel').val('');
    $('#fuel_cost').val('');
}//Nirmal

//////////////////////////////////////////////////////////
//function save_vehicle_reg() {
//    var branchCombo = $('#branchCombo').val();
//    var typeCombo = $('#typeCombo').val();
//    var purCombo = $('#purCombo').val();
//    var manuCombo = $('#manuCombo').val();
//    var conCombo = $('#conCombo').val();
//    var brandCombo = $('#brandCombo').val();
//    var insCombo = $('#insCombo').val();
//    var statusCombo = $('#statusCombo').val();
//    var vid = $('#vid').val();
//    var regNo = $('#regNo').val();
//    var reg_Date = $('#reg_Date').val();
//    var volume = $('#volume').val();
//    var procure = $('#procure').val();
//    var fuelComb = $('#fuelComb').val();
//    var weight = $('#weight').val();
//    var engineC = $('#engineC').val();
//    var manuY = $('#manuY').val();
//    var fuelCa = $('#fuelCa').val();
//    var valueRs = $('#valueRs').val();
//    var colour = $('#colour').val();
//    var driverName = $('#driverName').val();
//    var insDate = $('#insDate').val();
//
//    $.post("views/commenSettingView.php", {action: 'save_vehicle_reg',
//        branchCombo: branchCombo,
//        typeCombo: typeCombo,
//        purCombo: purCombo,
//        manuCombo: manuCombo,
//        conCombo: conCombo,
//        brandCombo: brandCombo,
//        insCombo: insCombo,
//        statusCombo: statusCombo,
//        vid: vid,
//        regNo: regNo,
//        reg_Date: reg_Date,
//        volume: volume,
//        procure: procure,
//        fuelComb: fuelComb,
//        weight: weight,
//        engineC: engineC,
//        manuY: manuY,
//        fuelCa: fuelCa,
//        valueRs: valueRs,
//        colour: colour,
//        driverName: driverName,
//        insDate: insDate}, function (e) {
//        alertifyMsgDisplay(e, 1000, function () {
//
//        });
//    }, "json");
//
//
//}