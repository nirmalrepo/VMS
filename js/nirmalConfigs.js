function save_vehicle_reg(cb) {
    var branchCombo = $('#branchCombo').val();
    var typeCombo = $('#typeCombo').val();
    var purCombo = $('#purCombo').val();
    var manuCombo = $('#manuCombo').val();
    var conCombo = $('#conCombo').val();
    var brandCombo = $('#brandCombo').val();
    var insCombo = $('#insCombo').val();
    var statusCombo = $('#statusCombo').val();
    var vid = $('#vid').val();
    var regNo = $('#regNo').val();
    var reg_Date = $('#reg_Date').val();
    var volume = $('#volume').val();
    var procure = $('#procure').val();
    var fuelComb = $('#fuelComb').val();
    var weight = $('#weight').val();
    var engineC = $('#engineC').val();
    var manuY = $('#manuY').val();
    var fuelCa = $('#fuelCa').val();
    var valueRs = $('#valueRs').val();
    var colour = $('#colour').val();
    var driverName = $('#driverName').val();
    var insDate = $('#insDate').val();
////    alert(regNo);
    if ($.trim(regNo).length == 0) {
        alertify.error("Enter Reg.No!", 3000);
        return;
    }
    if ($.trim(reg_Date).length == 0) {
        alertify.error("Enter Reg.Date!", 3000);
        return;
    }
    if ($.trim(procure).length == 0) {
        alertify.error("Enter Procure", 3000);
        return;
    }
    if ($.trim(manuY).length == 0) {
        alertify.error("Enter Manufacture Year!", 3000);
        return;
    }
    if ($.trim(valueRs).length == 0) {
        alertify.error("Enter Value!", 3000);
        return;
    }
    if ($.trim(insDate).length == 0) {
        alertify.error("Enter Insurance Date!", 3000);
        return;
    }

    $.post("views/commenSettingView.php", {action: "check_sesstions"}, function (e) {
        if (e == 1) {
            $.post("views/commenSettingView.php", {action: 'save_vehicle_reg',
                branchCombo: branchCombo,
                typeCombo: typeCombo,
                purCombo: purCombo,
                manuCombo: manuCombo,
                conCombo: conCombo,
                brandCombo: brandCombo,
                insCombo: insCombo,
                statusCombo: statusCombo,
                vid: vid,
                regNo: regNo,
                reg_Date: reg_Date,
                volume: volume,
                procure: procure,
                fuelComb: fuelComb,
                weight: weight,
                engineC: engineC,
                manuY: manuY,
                fuelCa: fuelCa,
                valueRs: valueRs,
                colour: colour,
                driverName: driverName,
                insDate: insDate}, function (e) {
                alertifyMsgDisplay(e, 3000, function () {
                    if ($.type(cb) === 'function') {
                        cb();
                    }
                });
            }, "json");
        } else {
            alertify.set({labels: {
                    ok: "Yes",
                    cancel: "No"
                }});
            alertify.confirm("Continue without uploading images?", function (e) {
                if (e) {
                    $.post("views/commenSettingView.php", {action: 'save_vehicle_reg',
                        branchCombo: branchCombo,
                        typeCombo: typeCombo,
                        purCombo: purCombo,
                        manuCombo: manuCombo,
                        conCombo: conCombo,
                        brandCombo: brandCombo,
                        insCombo: insCombo,
                        statusCombo: statusCombo,
                        vid: vid,
                        regNo: regNo,
                        reg_Date: reg_Date,
                        volume: volume,
                        procure: procure,
                        fuelComb: fuelComb,
                        weight: weight,
                        engineC: engineC,
                        manuY: manuY,
                        fuelCa: fuelCa,
                        valueRs: valueRs,
                        colour: colour,
                        driverName: driverName,
                        insDate: insDate}, function (e) {
                        alertifyMsgDisplay(e, 3000, function () {
                            if ($.type(cb) === 'function') {
                                cb();
                            }
                        });
                    }, "json");
                }
                else {

                }
            });
        }
    });
}

function save_driver_reg(cb) {
    var branchCombo = $('#branchCombo').val();
    var dr_id = $('#dr_id').val();
    var dr_fname = $('#dr_fname').val();
    var dr_lname = $('#dr_lname').val();
    var genderCom = $('#genderCom').val();
    var dr_nic = $('#dr_nic').val();
    var dr_add = $('#dr_add').val();
    var li_no = $('#li_no').val();
    var desc_rip = $('#desc_rip').val();
    $.post("views/commenSettingView.php", {action: 'driver_Save', branchCombo: branchCombo, dr_id: dr_id,
        dr_fname: dr_fname, dr_lname: dr_lname, genderCom: genderCom, dr_nic: dr_nic, dr_add: dr_add, li_no: li_no, desc_rip: desc_rip}, function (e) {
        alertifyMsgDisplay(e, 2000);
        if ($.type(cb) === 'function') {
            cb();
        }
    }, "json");
}
function save_driver_reg_assign(cb) {
    if ($('#active').is(':checked')) {
        var status = $('#active').val();
    } else {
        var status = 2;
    }
    var branchCombo1 = $('#branchCombo1').val();
    var driverComboBox1 = $('#driverComboBox1').val();
    var driverNameComboBox1 = $('#driverNameComboBox1').val();
    var startDate = $('#startDate').val();

    $.post("views/commenSettingView.php", {action: 'save_driver_reg_assign', branchCombo1: branchCombo1, driverComboBox1: driverComboBox1,
        driverNameComboBox1: driverNameComboBox1, startDate: startDate, status: status}, function (e) {
        alertifyMsgDisplay(e, 2000);
        if ($.type(cb) === 'function') {
            cb();
        }
    }, "json");
}
///////////////////////Table load////////////////////////////////
function reload_page() {
    location.reload();
}

function vehicle_registration_tabele(branchVal, cb) {
    var tableData = '';
    $.post("views/loadTables.php", {table: "registerd_vehicle_table", branchVal: branchVal}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr><th colspan="5" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
            $('.vehicle_save_Table tbody').html('').append(tableData);
        } else {
            $.each(e, function (index, qData) {
                index++;
                tableData += '<tr>';
                tableData += '<td>' + index + '</td>';
                tableData += '<td>' + qData.type_name + '</td>';
                tableData += '<td>' + qData.brand_name + '</td>';
                tableData += '<td>' + qData.vh_reg_no + '</td>';
                tableData += '<td>' + qData.vh_mnu_year + '</td>';
                tableData += '<td>' + qData.vh_value + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary select_customer" value="' + qData.s_id + '" id="select_customer1"><i class="fa fa-plus-square fa-lg"></i></button>'
                        + '<button class="btn btn-danger delete_customer" value="' + qData.s_id + '"><i class="fa fa-trash-o fa-lg"></i></button>' + '<button class="btn btn-success report"id="report" value="' + qData.s_id + '" data-toggle="modal" data-target="#model2"><i class="fa fa-file fa-lg"></i>&nbsp;View Report</button></div></td>';
                tableData += '</tr>';
            });
            $('.vehicle_save_Table tbody').html('').append(tableData);
            tableSorter();
            $('.select_customer').click(function () {
                select_vehicle($(this).val());
                $('#cust_reg_ActionBtn').removeClass('hidden');
                $('#reset_cust').removeClass('hidden');
                $('#customerregSaveActionBtn').addClass('hidden');
                $('#cust_reg_Update').removeClass('hidden');
            });
            $('.delete_customer').click(function () {
                delete_vehicle($(this).val(), function () {
                    vehicle_registration_tabele(branchVal);
                    empty_machine_repair_data();
                });
            });
            $('.report').click(function () {
                var value = $(this).val();
                data_to_modal($(this).val(), function () {
                    model_view_slide(value);
                });
            });
        }
        if ($.type(cb) === 'function') {
            cb();
        }
    }, "json");
}
function vehicle_registration_tabele_report(branchVal, cb) {
    var tableData = '';
    $.post("views/loadTables.php", {table: "registerd_vehicle_table", branchVal: branchVal}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr><th colspan="5" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
            $('.vehicle_save_Table tbody').html('').append(tableData);
        } else {
            $.each(e, function (index, qData) {
                index++;
                tableData += '<tr>';
                tableData += '<td>' + index + '</td>';
                tableData += '<td>' + qData.type_name + '</td>';
                tableData += '<td>' + qData.brand_name + '</td>';
                tableData += '<td>' + qData.vh_reg_no + '</td>';
                tableData += '<td>' + qData.vh_mnu_year + '</td>';
                tableData += '<td>' + qData.vh_value + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary select_customer hidden" value="' + qData.s_id + '" id="select_customer1"><i class="fa fa-plus-square fa-lg"></i></button>'
                        + '<button class="btn btn-danger delete_customer hidden" value="' + qData.s_id + '"><i class="fa fa-trash-o fa-lg"></i></button>' + '<button class="btn btn-success report"id="report" value="' + qData.s_id + '" data-toggle="modal" data-target="#model2"><i class="fa fa-file fa-lg"></i>&nbsp;View Report</button></div></td>';
                tableData += '</tr>';
            });
            $('.vehicle_save_Table tbody').html('').append(tableData);
            tableSorter();
            $('.select_customer').click(function () {
                select_vehicle($(this).val());
                $('#cust_reg_ActionBtn').removeClass('hidden');
                $('#reset_cust').removeClass('hidden');
                $('#customerregSaveActionBtn').addClass('hidden');
                $('#cust_reg_Update').removeClass('hidden');
            });
            $('.delete_customer').click(function () {
                delete_vehicle($(this).val(), function () {
                    vehicle_registration_tabele(branchVal);
                    empty_machine_repair_data();
                });
            });
            $('.report').click(function () {
                var value = $(this).val();
                data_to_modal($(this).val(), function () {
                    model_view_slide(value);
                });
            });
        }
        if ($.type(cb) === 'function') {
            cb();
        }
    }, "json");
}
function driver_registration_tabele(branchVal, cb) {
    var tableData = '';
    $.post("views/loadTables.php", {table: "registerd_driver_table", branchVal: branchVal}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr><th colspan="5" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
            $('.driver_data_table tbody').html('').append(tableData);
        } else {
            $.each(e, function (index, qData) {
                index++;
                tableData += '<tr>';
                tableData += '<td>' + index + '</td>';
                tableData += '<td>' + qData.driv_fname + '</td>';
                tableData += '<td>' + qData.driv_lname + '</td>';
//                tableData += '<td>' + qData.driv_gender + '</td>';
                tableData += '<td>' + qData.driv_nic + '</td>';
                tableData += '<td>' + qData.driv_drlcnno + '</td>';
                tableData += '<td><div class="btn-group "><button class="btn btn-primary select_customer" value="' + qData.sd_id + '"><i class="fa fa-plus-square fa-lg"></i></button>'
                        + '<button class="btn btn-danger delete_customer" value="' + qData.sd_id + '"><i class="fa fa-trash-o fa-lg"></i></button>' + '<button class="btn btn-success report hidden"id="report" value="' + qData.sd_id + '" data-toggle="modal" data-target="#model2"><i class="fa fa-tasks fa-lg"></i>&nbsp;Assign</button></div></td>';
                tableData += '</tr>';
            });
            $('.driver_data_table tbody').html('').append(tableData);
            tableSorter();
            $('.select_customer').click(function () {
                $('.dri_reg_Save').addClass('hidden');
                $('.dri_reg_Update').removeClass('hidden');
                $('.dri_reset_hi').removeClass('hidden');
                select_driver($(this).val());
            });
            $('.delete_customer').click(function () {
                delete_vehicle($(this).val(), function () {
                    vehicle_registration_tabele(branchVal);
                });
            });
            $('.report').click(function () {
                var value = $(this).val();
                data_to_modal_drive(value, function () {
                    reg_combo_load(false);
                });
            });
        }
        if ($.type(cb) === 'function') {
            cb();
        }
    }, "json");
}
function driver_assign_tabele(branchVal, cb) {
    var tableData = '';
    $.post("views/loadTables.php", {table: "driver_assign_tabele", branchVal: branchVal}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr><th colspan="5" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
            $('.driver_data_assign_table tbody').html('').append(tableData);
        } else {
            $.each(e, function (index, qData) {
                index++;
                tableData += '<tr>';
                tableData += '<td>' + index + '</td>';
                tableData += '<td>' + qData.driv_fname + '</td>';
                tableData += '<td>' + qData.driv_lname + '</td>';
                tableData += '<td>' + qData.vh_reg_no + '</td>';
                tableData += '<td>' + qData.vdr_start_date + '</td>';
                if (qData.vdr_driver_status == 1) {

                    tableData += '<td style="background-color: rgb(114, 208, 114) !important;">Active</td>';
                }
                else if (qData.vdr_driver_status == 2) {
                    tableData += '<td style="background-color: rgb(76, 237, 237) !important;">Idle</td>';
                }
                tableData += '</tr>';
            });
            $('.driver_data_assign_table tbody').html('').append(tableData);
            tableSorter();
        }
        if ($.type(cb) === 'function') {
            cb();
        }
    }, "json");
}
function reg_combo_load(selected) {
    var branch = ($('#branchCombo').val());
    var comboData = '';
    $.post("views/loadComboBox.php", {comboBox: 'reg_combo_load', branch: branch}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0" class="vehiclereg"> -- No Data Found -- </option>';
            $('.driverComboBox').html('').append(comboData);
            chosenRefresh();
        } else {
            $.each(e, function (index, qData) {
                if (selected !== undefined || e !== null || e.length !== 0) {
                    if (parseInt(selected) === parseInt(qData.vh_id)) {
                        comboData += '<option value="" selected>' + qData.vh_reg_no + '</option>';
                    } else {
                        comboData += '<option value="' + qData.vh_id + '">' + qData.vh_reg_no + '</option>';
                    }
                } else {
                    comboData += '<option value="' + qData.vh_id + '">' + qData.vh_reg_no + '</option>';
                }
            });
            $('.driverComboBox').html('').append(comboData);
            chosenRefresh();
        }
    }, "json");
}
function select_vehicle(sid) {
    $.post("views/commenSettingView.php", {action: 'vehicle_select', sid: sid}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            alert('error');
        } else {
//            alert(e[0].vh_status);
            console.log(e[0].vh_status);
            $('#branchCombo').val(e[0].br_id);
            $('#typeCombo').val(e[0].vh_type_id);
            $('#purCombo').val(e[0].vh_pur_id);
            $('#manuCombo').val(e[0].vh_mcntry_id);
            $('#conCombo').val(e[0].vh_condition_id);
            $('#brandCombo').val(e[0].vh_brand_id);
            $('#insCombo').val(e[0].vh_insuc_id);
            $('#statusCombo option').eq(e[0].vh_status).attr('selected', 'selected');
            $('#vid').val(e[0].vh_id);
            $('#regNo').val(e[0].vh_reg_no);
            $('#reg_Date').val(e[0].vh_reg_date);
            $('#volume').val(e[0].vh_volumn);
            $('#procure').val(e[0].vh_procure);
            $('#fuelComb').val(e[0].vh_fual_comb);
            $('#weight').val(e[0].vh_weight);
            $('#engineC').val(e[0].vh_engine_cap);
            $('#manuY').val(e[0].vh_mnu_year);
            $('#fuelCa').val(e[0].vh_fuel_cap);
            $('#valueRs').val(e[0].vh_value);
            $('#colour').val(e[0].vh_color);
            $('#driverName').val(e[0].vh_driver_name);
            $('#insDate').val(e[0].vh_insu_date);
            $('#branchCombo').prop('disabled', true);
            $('#branchCombo').attr('disabled', true);
            scrollToElement('html');
            $('#iconColor').css("background-color", e[0].vh_color);
            var brid = $('#branchCombo').val();
            var vid = $('#vid').val();
            var mkdir = brid + '-'.concat(vid);
            view_slide(mkdir);
            chosenRefresh();
        }
    }, "json");
}
//function select_vehicle(sid) {
//    $.post("views/commenSettingView.php", {action: 'vehicle_select', sid: sid}, function (e) {
//        if (e === undefined || e.length === 0 || e === null) {
//            alert('error');
//        } else {
//            $('#branchCombo').val(e[0].br_id);
//            $('#typeCombo').val(e[0].vh_type_id);
//            $('#purCombo').val(e[0].vh_pur_id);
//            $('#manuCombo').val(e[0].vh_mcntry_id);
//            $('#conCombo').val(e[0].vh_condition_id);
//            $('#brandCombo').val(e[0].vh_brand_id);
//            $('#insCombo').val(e[0].vh_insuc_id);
//            $('#statusCombo').val(e[0].cusTel);
//            $('#vid').val(e[0].vh_id);
//            $('#regNo').val(e[0].vh_reg_no);
//            $('#reg_Date').val(e[0].vh_reg_date);
//            $('#volume').val(e[0].vh_volumn);
//            $('#procure').val(e[0].vh_procure);
//            $('#fuelComb').val(e[0].vh_fual_comb);
//            $('#weight').val(e[0].vh_weight);
//            $('#engineC').val(e[0].vh_engine_cap);
//            $('#manuY').val(e[0].vh_mnu_year);
//            $('#fuelCa').val(e[0].vh_fuel_cap);
//            $('#valueRs').val(e[0].vh_value);
//            $('#colour').val(e[0].vh_color);
//            $('#driverName').val(e[0].vh_driver_name);
//            $('#insDate').val(e[0].vh_insu_date);
//            $('#branchCombo').prop('disabled', true);
//            $('#branchCombo').attr('disabled', true);
//            scrollToElement('html');
//            $('#iconColor').css("background-color", e[0].vh_color);
//            var brid = $('#branchCombo').val();
//            var vid = $('#vid').val();
//            var mkdir = brid + '-'.concat(vid);
//            view_slide(mkdir);
//            chosenRefresh();
//        }
//    }, "json");
//}
function select_driver(sid) {
    $.post("views/commenSettingView.php", {action: 'driver_select', sid: sid}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            alert('error');
        } else {
            $('#branchCombo').val(e[0].driv_brid);
            $('#dr_id').val(e[0].driv_id);
            $('#dr_fname').val(e[0].driv_fname);
            $('#dr_lname').val(e[0].driv_lname);
            $('#genderCom').val(e[0].driv_gender);
            $('#dr_nic').val(e[0].driv_nic);
            $('#dr_add').val(e[0].driv_address);
            $('#li_no').val(e[0].driv_drlcnno);
            $('#desc_rip').val(e[0].driv_desc);
            $('#branchCombo').prop('disabled', true);
            $('#branchCombo').attr('disabled', true);
            scrollToElement('html');
//            $('#iconColor').css("background-color", e[0].vh_color);
//            var brid = $('#branchCombo').val();
//            var vid = $('#vid').val();
//            var mkdir = brid + '-'.concat(vid);
//            view_slide(mkdir);
            chosenRefresh();
        }
    }, "json");
}

function delete_vehicle(sid, cb) {
    confirm("Delete Data", "Are you sure want to delete data", "No", "Yes", function () {
        $.post("views/commenSettingView.php", {action: 'delete_vehicles', sid: sid}, function (e) {
            alertifyMsgDisplay(e, 2000, function () {
                if ($.type(cb) === 'function') {
                    cb();
                }
            });
        }, "json");
    });
}
function check_directry(chk_dir, cb) {
    $.post('upload.php', {check_directry: 'check_directry', chk_dir: chk_dir}, function (e) {

        if (e == 3) {
            if ($.type(cb) === 'function') {
                cb();
            }
        }
        else if (e == 2) {
            alertify.set({labels: {
                    ok: "Yes",
                    cancel: "No"
                }});
            alertify.confirm("Continue without uploading images?", function (e) {
                if (e) {
                    if ($.type(cb) === 'function') {
                        cb();
                    }
                } else {
                }
            });
        }
    }, 'json');
}


function update_vehicle_reg(cb) {
    var branchCombo = $('#branchCombo').val();
    var typeCombo = $('#typeCombo').val();
    var purCombo = $('#purCombo').val();
    var manuCombo = $('#manuCombo').val();
    var conCombo = $('#conCombo').val();
    var brandCombo = $('#brandCombo').val();
    var insCombo = $('#insCombo').val();
    var statusCombo = $('#statusCombo').val();
    var vid = $('#vid').val();
    var regNo = $('#regNo').val();
    var reg_Date = $('#reg_Date').val();
    var volume = $('#volume').val();
    var procure = $('#procure').val();
    var fuelComb = $('#fuelComb').val();
    var weight = $('#weight').val();
    var engineC = $('#engineC').val();
    var manuY = $('#manuY').val();
    var fuelCa = $('#fuelCa').val();
    var valueRs = $('#valueRs').val();
    var colour = $('#colour').val();
    var driverName = $('#driverName').val();
    var insDate = $('#insDate').val();

    $.post("views/commenSettingView.php", {action: 'update_vehicle_reg',
        branchCombo: branchCombo,
        typeCombo: typeCombo,
        purCombo: purCombo,
        manuCombo: manuCombo,
        conCombo: conCombo,
        brandCombo: brandCombo,
        insCombo: insCombo,
        statusCombo: statusCombo,
        vid: vid,
        regNo: regNo,
        reg_Date: reg_Date,
        volume: volume,
        procure: procure,
        fuelComb: fuelComb,
        weight: weight,
        engineC: engineC,
        manuY: manuY,
        fuelCa: fuelCa,
        valueRs: valueRs,
        colour: colour,
        driverName: driverName,
        insDate: insDate}, function (e) {
        alertifyMsgDisplay(e, 1000, function () {
            if ($.type(cb) === 'function') {
                cb();
            }
        });

    }, "json");
}
function data_to_modal(sid, cb) {
    var tableData = '';
    $.post("views/loadTables.php", {table: "modal_table", sid: sid}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr><th colspan="5" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
            $('.modal_table tbody').html('').append(tableData);
        } else {
            $.each(e, function (index, qData) {
                index++;
                tableData += '<tr><td class="bold">1. Branch</td><td>' + qData.br_name + '</td><td class="bold">11. Procure</td><td>' + qData.vh_procure + '</td></tr>';
                tableData += '<tr><td class="bold">2. Type</td><td>' + qData.type_name + '</td><td class="bold">12. Fuel Combustion(Km)</td><td>' + qData.vh_fual_comb + '</td></tr>';
                tableData += '<tr><td class="bold">3. Purpose</td><td>' + qData.pur_name + '</td><td class="bold">13. Weight(Kg</td><td>' + qData.vh_weight + '</td></tr>';
                tableData += '<tr><td class="bold">4. Manufacture Country</td><td>' + qData.mcntry_name + '</td><td class="bold">14. En.Cap.(CC-Km/L)</td><td>' + qData.vh_engine_cap + '</td></tr>';
                tableData += '<tr class="hidden"><td class="bold">5. Condition</td><td>' + qData.condition_name + '</td><td class="bold">15. Manufacture Year</td><td>' + qData.vh_mnu_year + '</td></tr>';
                tableData += '<tr class=""><td class="bold">5. Brand</td><td>' + qData.brand_name + '</td><td class="bold">16. Fuel Capacity(L)</td><td class="bold">' + qData.vh_fuel_cap + '</td></tr>';
                tableData += '<tr><td class="bold">6. Insurance Company</td><td>' + qData.insuc_name + '</td><td class="bold">17. Value(Rs.)</td><td class="bold">' + qData.vh_value + '</td></tr>';
                if (qData.vh_status == 0) {

                    tableData += '<tr><td class="bold">7. Status</td><td>Active</td>';
                } else {
                    tableData += '<tr><td class="bold">7. Status</td><td>Inactive</td>';

                }
                tableData += '<td class="bold">18. Colour</td><td style="background-color:' + qData.vh_color + '">' + qData.vh_color + '</td></tr>';
                tableData += '<tr><td class="bold">8. Reg.No.</td><td>' + qData.vh_reg_no + '</td><td class="bold">19. Insurance Date</td><td>' + qData.vh_insu_date + '</td></tr>';
                tableData += '<tr><td class="bold">9. Reg. Date</td><td>' + qData.vh_reg_date + '</td></tr>';
                tableData += '<tr><td class="bold">10. Volume</td><td>' + qData.vh_volumn + '</td></tr>';
            });
            $('.modal_table tbody').html('').append(tableData);
            tableSorter();
        }
        if ($.type(cb) === 'function') {
            cb();
        }
    }, "json");
}
function data_to_modal_drive(sid, cb) {
    var tableData = '';
    var name = '';
    $.post("views/loadTables.php", {table: "modal_table_drive", sid: sid}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += 'Undefined';
            $('#branch_for_model').html('').append(tableData);
        } else {
            $.each(e, function (index, qData) {
                index++;
                name += '<p id="driv_name" data-fname="' + qData.driv_fname + '" data-lname="' + qData.driv_lname + '">Driver\'s Name: ' + qData.driv_fname + '&nbsp' + qData.driv_lname + '</p>'
                tableData += '<p data-branchid="' + qData.driv_brid + '" id="mbranch_id">' + qData.br_name + ' Branch</p>';
                tableData += '<p id="driver_id" class="hidden" data-driveid="' + qData.driv_id + '">' + qData.driv_id + '</p>';
            });
            $('#row1').html('').append(name);
            $('#branch_for_model').html('').append(tableData);
//            tableSorter();
        }
        if ($.type(cb) === 'function') {
            cb();
        }
    }, "json");
}
function driver_duty_assign_save() {
    var branch_id = $('#mbranch_id').data('branchid');
    var driver_id = $('#driver_id').data('driveid');
    var driverComboBox = $('#driverComboBox').val();
    var startDate = $('#startDate').val();
    var endDate = $('#endDate').val();
    $.post("views/commenSettingView.php", {action: 'driver_duty_assign_save', branch_id: branch_id, driver_id: driver_id, driverComboBox: driverComboBox,
        startDate: startDate, endDate: endDate}, function (e) {
        alertifyMsgDisplay(e, 2000);
    }, "json");
}
function reg_no_load(selected) {
    var comboData = '';
    $.post("views/loadComboBox.php", {comboBox: 'regcomboComboBox', selected: selected}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0"> -- No Data Found -- </option>';
            $('.regCombo').html('').append(comboData);
            chosenRefresh();
        } else {
            $.each(e, function (index, qData) {
                if (selected !== undefined || e !== null || e.length !== 0) {
                    if (parseInt(selected) === parseInt(qData.br_id)) {
                        comboData += '<option value="' + qData.vh_reg_no + '" selected>' + qData.vh_reg_no + '</option>';
                    } else {
                        comboData += '<option value="' + qData.vh_reg_no + '">' + qData.vh_reg_no + '</option>';
                    }
                } else {
                    comboData += '<option value="' + qData.vh_reg_no + '">' + qData.vh_reg_no + '</option>';
                }
            });
            $('.regCombo').html('').append(comboData);
            chosenRefresh();
        }
    }, "json");
}

function generate_repair_table(branchCombo, regCombo, i) {
    var tableData = '';
    $.post("views/loadTables.php", {table: "generate_re_forms", branchCombo: branchCombo, regCombo: regCombo, options: i}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr><th colspan="5" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
            $('.vehicle_repair_data_table tbody').html('').append(tableData);
        } else {
            $.each(e, function (index, qData) {
                index++;
                tableData += '<tr>';
                tableData += '<td>' + index + '</td>';
                if (i == 1) {
                    tableData += '<td>' + qData.vh_reg_no + '</td>';
                }
                tableData += '<td>' + qData.rp_date + '</td>';
                tableData += '<td>' + qData.rp_desc + '</td>';
                tableData += '<td>' + qData.rp_place + '</td>';
                tableData += '<td>' + qData.rp_cost + '</td>';
                if (i == 1) {
                    tableData += '<td><div class="btn-group"><button class="btn btn-success report" value="' + qData.rp_id + '" data-toggle="modal" data-target="#model2"><i class="fa fa-file fa-lg"></i></button></div></td>';
                }
                tableData += '</tr>';
            });
            $('.vehicle_repair_data_table tbody').html('').append(tableData);
            tableSorter();
            $('.report').click(function () {
                data_to_repair_modal($(this).val());
            });
        }
    }, "json");
}
function data_to_repair_modal(rid) {
    var tableData = '';
    var Data = '';
    $.post("views/loadTables.php", {table: "modal_repair_table", rid: rid}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr><th colspan="5" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
            $('.modal_table tbody').html('').append(tableData);
        } else {
            $.each(e, function (index, qData) {
                index++;
                Data += '<span>Reg.No:&nbsp;' + qData.vh_reg_no + '</span>';
                tableData += '<tr><td>Branch</td><td>' + qData.br_name + '</td></tr>';
                tableData += '<tr><td>Reg.No.</td><td>' + qData.vh_reg_no + '</td></tr>';
                tableData += '<tr><td>Date</td><td>' + qData.rp_date + '</td></tr>';
                tableData += '<tr><td>Date</td><td>' + qData.rp_date + '</td></tr>';
                tableData += '<tr><td>Repaired Place</td><td>' + qData.rp_place + '</td></tr>';
                tableData += '<tr><td>Description</td><td>' + qData.rp_desc + '</td></tr>';
                tableData += '<tr><td>Cost</td><td>' + qData.rp_cost + '</td></tr>';
            });
            $('.modal-header h4').html('').append(Data);
            $('.modal_table tbody').html('').append(tableData);
            tableSorter();
        }
    }, "json");
}
function data_to_dispose_modal(did) {
    var tableData = '';
    $.post("views/loadTables.php", {table: "modal_dispose_table", did: did}, function (e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr><th colspan="5" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
            $('.modal_table tbody').html('').append(tableData);
        } else {
            $.each(e, function (index, qData) {
                index++;
                tableData += '<tr><td>Branch</td><td>' + qData.br_name + '</td></tr>';
                tableData += '<tr><td>Reg.No.</td><td>' + qData.vh_reg_no + '</td></tr>';
                tableData += '<tr><td>Type</td>';
                if (qData.type == 1) {
                    tableData += '<td>Dispose</td></tr>';
                }
                else {
                    tableData += '<td>Auction</td></tr>';
                }
                tableData += '<tr><td>Date</td><td>' + qData.disp_date + '</td></tr>';
                tableData += '<tr><td>Description</td><td>' + qData.desc + '</td></tr>';
                tableData += '<tr><td>Sell Amount</td><td>' + qData.sell_amt + '</td></tr>';
            });
            $('.modal_table tbody').html('').append(tableData);
            tableSorter();
        }
    }, "json");
}

function reset_target_form(target, callback) {
    $(target).find('input[type=hidden]').val('');
    $(target).find('.form-control-static').html('');
    $(target).find('.form-control').val('');
    $(target).find('.form-control').not('input,select').html('');
    var selects = $(target).find('select');
    $.each(selects, function (i, el) {
        $(el).val($(el).find('option:first').val());
    });
    chosenRefresh();
    if ($.type(callback) === 'function') {
        callback();
    }
}
function reset_target_form_repair(target, callback) {
    $(target).find('input[type=hidden]').val('');
    $(target).find('.form-control-static').html('');
    $(target).find('.form-control').val('');
//    $(target).find('.form-control').not('input,select').html('');
//    var selects = $(target).find('select');
    //    $.each(selects, function (i, el) {
    //        $(el).val($(el).find('option:first').val());
//    });
    chosenRefresh();
    if ($.type(callback) === 'function') {
        callback();
    }
}

function scrollToElement(el) {
    $('html, body').animate({scrollTop: $(el).offset().top}, 500);
}

function empty_machine_repair_data() {
    reset_target_form('#wrap', function () {
        scrollToElement('html');
        vid_val_load($('#branchCombo').val());
    });
}
function empty_machine_repair_data_new() {
    reset_target_form_repair('#wrap', function () {
        scrollToElement('html');
        model_view_slide_repair();
    });
}
function make_dir(mkdir, cb) {
    $.post("upload.php", {make_dir: "make_dir", mkdir: mkdir}, function (e) {
        if (e == 1) {
            if ($.type(cb) === 'function') {
                cb();
            }
            //            upload_image(input);
        } else {
            alert('erooor');
        }

    }
    );
}
function make_dir_repair(mkdir, cb) {
    $.post("upload_repair.php", {make_dir_repair: "make_dir_repair", mkdir: mkdir}, function (e) {
        if (e == 1) {
            if ($.type(cb) === 'function') {
                cb();
            }
            //            upload_image(input);
        } else {
            alert('erooor');
        }

    }
    );
}
function view_slide(mkdir) {
//    alert();
    var tableData = '';
    $.post("upload.php", {make_slide: "make_slide", mkdir: mkdir}, function (e) {
        if (e) {
            $.each(e, function (index, qData) {
                if (qData.msg == 1) {
                    tableData += ' <div class="item active">';
                    tableData += ' <div class="row-fluid">';
                    tableData += '<img  src ="js/fancyBox/img/uploads/default/default.jpg" alt = ""  style = "height: 200px; width:190px;" / >';
                    tableData += '</a>'
                    tableData += '</div>'
                    tableData += '</div>'
                    tableData += '</div>'
                } else {
                    if (index == 2) {
                        tableData += ' <div class="item active">';
                    } else {

                        tableData += ' <div class="item">';
                    }
                    tableData += ' <div class="row-fluid">';
                    tableData += '<div><a class=" thumbnail fancybox fancyview" rel="gallery1"  data-imgid="' + qData + '" href="js/fancyBox/img/uploads/' + mkdir + '/' + qData + '"title="<strong>' + qData + '</strong>">';
                    tableData += '<img  src ="js/fancyBox/img/uploads/' + mkdir + '/' + qData + '"alt = ""  style = "height: 200px; width:300px;" / >';
                    tableData += '</a>'
                    tableData += '</div>'
                    tableData += '</div>'
                    tableData += '</div>'
                }
            });
            $('.c1').html('').append(tableData);
            installGallery2();
        }
    }, "json");
}
function model_view_slide(mkdir) {
    var tableData = '';
    $.post("upload.php", {make_modal_slide: "make_modal_slide", mkdir: mkdir}, function (e) {
        if (e) {
            $.each(e, function (index, qData) {
                if (qData.msg == 1) {
                    tableData += '<a class="" rel="">\
<img src ="js/fancyBox/img/uploads/default/default.jpg" alt="" style = "height: 100px; width:150px;"/>\
    </a>';
                } else {
                    tableData += '<a class="fancybox-thumb" rel="fancybox-thumb" data-imgid="' + qData + '" \
        href="js/fancyBox/img/uploads/' + mkdir + '/' + qData + '" title="<strong>' + qData + '</strong>">\
            <img src="js/fancyBox/img/uploads/' + mkdir + '/' + qData + '" alt="" style = "height: 100px; width:150px;"/>\
                </a>';
                }
            });
            $('#carousel').html(tableData);
            installGallery();
        }
    }, "json");
}
function model_view_slide_repair(mkdir) {
    var tableData = '';
    $.post("upload_repair.php", {make_modal_slide_repair: "make_modal_slide_repair", mkdir: mkdir}, function (e) {
        if (e) {
            $.each(e, function (index, qData) {
                if (qData.msg == 1) {
                    tableData += '<a class="" rel="">\
        <img src ="uploads/Repairs/default/default.jpg" alt="" style = "height: 100px; width:150px;"/>\
        </a>';
                } else {
                    tableData += '<a class="fancybox-thumb" rel="fancybox-thumb" data-imgid="' + qData + '" \
        href="uploads/Repairs/' + mkdir + '/' + qData + '" title="<strong>' + qData + '</strong>">\
            <img src="uploads/Repairs/' + mkdir + '/' + qData + '" alt="" style = "height: 100px; width:150px;"/>\
        </a>';
                }
            });
            $('#carousel').html(tableData);
            installGallery_repair();
//            installGallery2
        }
    }, "json");
}

function installGallery() {
    //        $('#uploaded_imgs').isotope();
    $('#carousel').carouFredSel({width: 500,
        height: 100,
        items: 3,
        auto: {
            duration: 500,
            timeoutDuration: 2500
        },
        prev: '#prev',
        next: '#next',
        pagination: '#pager',
        direction: "left",
        scroll: {
            items: 1,
            easing: "elastic",
            duration: 250,
            pauseOnHover: true
        }
    });
    $(".fancybox-thumb")
            .fancybox({
                padding: 3,
                openEffect: 'elastic',
                closeEffect: 'elastic',
                helpers: {
                    title: {
                        type: 'inside'
                    },
                    thumbs: {
                        width: 50,
                        height: 50
                    },
                    overlay: {
                        closeClick: false
                    }
                },
                afterLoad: function () {
                    var imgid = $(this.element).data('imgid');
//                    this.title = '<button class="btn btn-danger btn-sm pull-right delimg_lb" data-delimgid="' + imgid + '" style="padding: 1px 8px;"id="dltimg"><i class="fa fa-trash-o"></i></button> ' + this.title;
                },
                beforeShow: function () {
                    //                $('#carousel').trigger('play');
                }
            });
}
function installGallery_repair() {
    //        $('#uploaded_imgs').isotope();
    $('#carousel').carouFredSel({
        width: 800,
        height: 100,
        items: 5,
        auto: {
            duration: 500,
            timeoutDuration: 2500
        },
        prev: '#prev',
        next: '#next',
        pagination: '#pager',
        direction: "left",
        scroll: {
            items: 1,
            easing: "elastic",
            duration: 250,
            pauseOnHover: true
        }
    });
    $(".fancybox-thumb").fancybox({
        padding: 3,
        openEffect: 'elastic',
        closeEffect: 'elastic',
        helpers: {
            title: {
                type: 'inside'
            }, thumbs: {
                width: 50,
                height: 50
            },
            overlay: {
                closeClick: false
            }},
        afterLoad: function () {
            var imgid = $(this.element).data('imgid');
            this.title = '<button class="btn btn-danger btn-sm pull-right delimg_lb" id="del_v_reg" data-delimgid="' + imgid + '" style="padding: 1px 8px;"><i class="fa fa-trash-o"></i></button> ' + this.title;
        },
        beforeShow: function () {
            //                $('#carousel').trigger('play');
        }
    });
}
function installGallery2() {
    //        $('#uploaded_imgs').isotope();
    $(".fancyview").fancybox({
        padding: 3,
        openEffect: 'elastic',
        closeEffect: 'elastic',
        helpers: {
            title: {
                type: 'inside'
            }, thumbs: {
                width: 50,
                height: 50
            },
            overlay: {
                closeClick: false
            }},
        afterLoad: function () {
            var imgid = $(this.element).data('imgid');
            this.title = '<button class="btn btn-danger btn-sm pull-right delimg_lb" data-delimgid="' + imgid + '" style="padding: 1px 8px;"id="dltimg"><i class="fa fa-trash-o"></i></button> ' + this.title;
        },
        beforeShow: function () {
            //                $('#carousel').trigger('play');
        }
    });
}
function upload_image(input, cb) {
    formdata = false;
    if (window.FormData) {
        formdata = new FormData();
        document.getElementById("btn").style.display = "none";
    }
    if (formdata) {
        var i = 0, len = input.files.length, img, reader, file;
        for (; i < len; i++) {
            file = input.files[i];
            if (!!file.type.match(/image.*/)) {
                formdata.append("images[]", file);
            }
        }
        $.ajax({
            url: "upload.php",
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            success: function (res) {
                var jd = JSON.parse(res);
                if (jd) {
                    alertify.success('Image uploaded successfully.', 2000);
                    $('#model3').modal('toggle');

                } else {
                    alertify.error('Image upload failed.', 2000);
                }
                if ($.type(cb) === 'function') {
                    cb();
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    }
    else {
        status = false;
    }
}
function upload_image_repair(input, cb) {
    formdata = false;
    if (window.FormData) {
        formdata = new FormData();
        document.getElementById("btn").style.display = "none";
    }
    if (formdata) {
        var i = 0, len = input.files.length, img, reader, file;
        for (; i < len; i++) {
            file = input.files[i];
            if (!!file.type.match(/image.*/)) {
                formdata.append("images[]", file);
            }
        }
        $.ajax({
            url: "upload_repair.php",
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            success: function (res) {
                var jd = JSON.parse(res);
                if (jd) {
                    alertify.success('Image uploaded successfully.', 2000);
                    $('#model4').modal('toggle');

                } else {
                    alertify.error('Image upload failed.', 2000);
                }
                if ($.type(cb) === 'function') {
                    cb();
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    }
    else {
        status = false;
    }
}
function check_reg_no(data) {
    if ($.trim(data).length == 0) {
        $('#regValidate').html('');
    } else {
        var data_for_search = data;
        $.post("views/commenSettingView.php", {action: 'search_reg_no', data_for_search: data_for_search},
        function (e) {
            if (e.msgType == 1) {
                $('#regValidate').html(e.msg);
                $('#veh_reg_Save').addClass('hidden')
            } else {
                $('#regValidate').html('');
                $('#veh_reg_Save').removeClass('hidden')
            }
        }, "json");
    }
}

function delete_image(imgid, dir_id, callback) {
    alertify.set({labels: {
            ok: "Yes",
            cancel: "No"
        }});
    alertify.confirm("Do you really want to delete this picture?", function (e) {
        if (e) {
            $.fancybox.close();
            $.post("upload.php", {delete_image: "delete_image", imgid: imgid, dir_id: dir_id}, function (a) {
                a = JSON.parse(a);
                if (a.err == '0') {
                    alertify.success('Picture deleted successfully.', 2000);
                } else {
                    alertify.error(a.msg, 3000);
                }
                view_slide(dir_id);
            });
            if ($.type(callback) === 'function') {
                callback();
            }
        }
    });
}
function delete_image_repair(imgid, dir_id, callback) {
    alertify.set({labels: {
            ok: "Yes",
            cancel: "No"
        }});
    alertify.confirm("Do you really want to delete this picture?", function (e) {
        if (e) {
            $.fancybox.close();
            $.post("upload_repair.php", {delete_image_repair: "delete_image_repair", imgid: imgid, dir_id: dir_id}, function (a) {
                a = JSON.parse(a);
                if (a.err == '0') {
                    alertify.success('Picture deleted successfully.', 2000);
                } else {
                    alertify.error(a.msg, 3000);
                }
//                model_view_slide_repair(dir_id);
            });
            if ($.type(callback) === 'function') {
                callback();
            }
        }
    });
}
$('body').on('click', '#dltimg', function () {
    var delimgid = $(this).data('delimgid');
    var brid = $('#branchCombo').val();
    var vid = $('#vid').val();
    var dir_id = brid + '-'.concat(vid);
    delete_image(delimgid, dir_id, model_view_slide);
});
$('body').on('click', '#del_v_reg', function () {
    var delimgid = $(this).data('delimgid');
    var brid = $('#rp_branch').val();
    var vid = $('#vid').val();
    var dir_id = brid + '-'.concat(vid);
    delete_image_repair(delimgid, dir_id, function () {
        model_view_slide_repair(dir_id);
    });
});
