
//sanjeewa

function branchComboBox(selected, callBack) {
    var comboData = '';
    $.post("views/loadComboBox.php", {comboBox: 'branchesComboBox'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0"> -- No Data Found -- </option>';
            $('.branchComboBox').html('').append(comboData);
            chosenRefresh();
        } else {
            $.each(e, function(index, qData) {
                if (selected !== undefined || e !== null || e.length !== 0) {
                    if (parseInt(selected) === parseInt(qData.br_id)) {
                        comboData += '<option value="' + qData.br_id + '" selected>' + qData.br_name + '</option>';
                    } else {
                        comboData += '<option value="' + qData.br_id + '">' + qData.br_name + '</option>';
                    }
                } else {
                    comboData += '<option value="' + qData.br_id + '">' + qData.br_name + '</option>';
                }
            });
            $('.branchComboBox').html('').append(comboData);
            chosenRefresh();
            
        }
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
//        vehicleComboBox(null, $('.vehicleComboBox').val());
    }, "json");
}

// vehicle combo box !!!!!!!!!!!!

function vehicleComboBox(selected, callBack) {
    var type_id = '';
    $('.braComboDiv').find('select').attr('selected', function() {
        type_id = $(this).val();
    });
    var comboData = '';
    $.post("views/loadComboBox.php", {comboBox: 'vehicleComboBox', type_id: type_id}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0" class="vehiclereg"> -- No Data Found -- </option>';
            $('.vehicleComboBox').html('').append(comboData);
            chosenRefresh();
        } else {
            $.each(e, function(index, qData) {
                if (selected !== undefined || e !== null || e.length !== 0) {
                    if (parseInt(selected) === parseInt(qData.vh_id)) {
                        comboData += '<option value="' + qData.vh_id + '" selected>' + qData.vh_reg_no + '</option>';
                    } else {
                        comboData += '<option value="' + qData.vh_id + '">' + qData.vh_reg_no + '</option>';
                    }
                } else {
                    comboData += '<option value="' + qData.vh_id + '">' + qData.vh_reg_no + '</option>';
                }
            });
            $('.vehicleComboBox').html('').append(comboData);
            chosenRefresh();
        }
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
    }, "json");
}
function reg_no_combo_box_driver(selected, callBack) {
    var type_id = '';
    $('.braComboDiv1').find('select').attr('selected', function() {
        type_id = $(this).val();
    });
    var comboData = '';
    $.post("views/loadComboBox.php", {comboBox: 'reg_no_combo_box_driver', type_id: type_id}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0" class="vehiclereg"> -- No Data Found -- </option>';
            $('.driverComboBox1').html('').append(comboData);
            chosenRefresh();
        } else {
            $.each(e, function(index, qData) {
                if (selected !== undefined || e !== null || e.length !== 0) {
                    if (parseInt(selected) === parseInt(qData.vh_id)) {
                        comboData += '<option value="' + qData.vh_id + '" selected>' + qData.vh_reg_no + '</option>';
                    } else {
                        comboData += '<option value="' + qData.vh_id + '">' + qData.vh_reg_no + '</option>';
                    }
                } else {
                    comboData += '<option value="' + qData.vh_id + '">' + qData.vh_reg_no + '</option>';
                }
            });
            $('.driverComboBox1').html('').append(comboData);
            chosenRefresh();
        }
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
    }, "json");
}
function driver_combo_box(selected, callBack) {
    var type_id = '';
    $('.braComboDiv1').find('select').attr('selected', function() {
        type_id = $(this).val();
    });
    var comboData = '';
    $.post("views/loadComboBox.php", {comboBox: 'driver_combo_box', type_id: type_id}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0" class="vehiclereg"> -- No Data Found -- </option>';
            $('.driverNameComboBox1').html('').append(comboData);
            chosenRefresh();
        } else {
            $.each(e, function(index, qData) {
                if (selected !== undefined || e !== null || e.length !== 0) {
                    if (parseInt(selected) === parseInt(qData.driv_id)) {
                        comboData += '<option value="' + qData.driv_id + '" selected>' + qData.driv_name + '</option>';
                    } else {
                        comboData += '<option value="' + qData.driv_id + '">' + qData.driv_name + '</option>';
                    }
                } else {
                    comboData += '<option value="' + qData.driv_id + '">' + qData.driv_name + '</option>';
                }
            });
            $('.driverNameComboBox1').html('').append(comboData);
            chosenRefresh();
        }
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
    }, "json");
}

function customer_registration_number(branch_id) {
    $.post("views/loadComboBox.php", {comboBox: 'customer_count', branch_id: branch_id}, function(e) {

        $.each(e, function(index, qData) {
            if (qData.cuscounts == undefined || qData.cuscounts == null) {
                $('#customer_reg_no').val('Not Allocated');
            } else {
                $('#customer_reg_no').val(qData.cuscounts);
            }

        });
    }, "json");
}
// this function bu anuruddha
function job_ComboBox(branchID, selected, callBack) {
    var comboData = '';
    $.post("views/loadComboBox.php", {comboBox: 'jobComboBox', branchID: branchID}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0"> -- No Data Found -- </option>';
            $('.jobComboBox').html('').append(comboData);
            chosenRefresh();
        } else {

            $.each(e, function(index, qData) {
                if (selected !== undefined || e !== null || e.length !== 0) {
                    if (parseInt(selected) === parseInt(qData.jbID)) {
                        comboData += '<option value="' + qData.jbID + '" selected>' + qData.jbID + '</option>';
                    } else {
                        comboData += '<option value="' + qData.jbID + '">' + qData.jbID + '</option>';
                    }
                } else {
                    comboData += '<option value="' + qData.jbID + '">' + qData.jbID + '</option>';
                }
            });
            $('.jobComboBox').html('').append(comboData);
            chosenRefresh();
        }
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
    }, "json");
}

function customer_ComboBox(selected, branch_id, callBack) {
    var comboData = '';
    $.post("views/loadComboBox.php", {comboBox: 'customerCombo', branch_id: branch_id}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0"> -- No Data Found -- </option>';
            $('.customer').html('').append(comboData);
            chosenRefresh();
        } else {
            $.each(e, function(index, qData) {
                if (selected !== undefined || e !== null || e.length !== 0) {
                    if (parseInt(selected) === parseInt(qData.cusID)) {
                        comboData += '<option value="' + qData.cusID + '" selected>' + qData.cusName + '</option>';
                    } else {
                        comboData += '<option value="' + qData.cusID + '">' + qData.cusName + '</option>';
                    }
                } else {
                    comboData += '<option value="' + qData.cusID + '">' + qData.cusName + '</option>';
                }
            });
            $('.customer').html('').append(comboData);
            chosenRefresh();
            $('#cusID').val($('.customer').val());
        }
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
    }, "json");
}

function getBanks(selected, callBack) {
    var comboData = '';
    $.post("views/loadComboBox.php", {comboBox: 'getbanks'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0"> -- No Data Found -- </option>';
            $('.bank').html('').append(comboData);
            chosenRefresh();
        } else {
            $.each(e, function(index, qData) {
                if (selected !== undefined || e !== null || e.length !== 0) {
                    if (parseInt(selected) === parseInt(qData.id)) {
                        comboData += '<option value="' + qData.id + '" selected>' + qData.bank_name + '</option>';
                    } else {
                        comboData += '<option value="' + qData.id + '">' + qData.bank_name + '</option>';
                    }
                } else {
                    comboData += '<option value="' + qData.id + '">' + qData.bank_name + '</option>';
                }
            });
            $('.bank').html('').append(comboData);
            chosenRefresh();
        }
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
    }, "json");
}

function getPayTypeCombo(selected, callBack) {
    var comboData = '';
    $.post("views/loadComboBox.php", {comboBox: 'paytyps'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0"> -- No Data Found -- </option>';
            $('.payType').html('').append(comboData);
            chosenRefresh();
        } else {
            $.each(e, function(index, qData) {
                if (selected !== undefined || e !== null || e.length !== 0) {
                    if (parseInt(selected) === parseInt(qData.pay_type_id)) {
                        comboData += '<option value="' + qData.pay_type_id + '" selected>' + qData.pay_type_name + '</option>';
                    } else {
                        comboData += '<option value="' + qData.pay_type_id + '">' + qData.pay_type_name + '</option>';
                    }
                } else {
                    comboData += '<option value="' + qData.pay_type_id + '">' + qData.pay_type_name + '</option>';
                }
            });
            $('.payType').html('').append(comboData);
            chosenRefresh();
        }
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
    }, "json");
}
function title_ComboBox(selected, callBack) {
    var comboData = '';
    $.post("views/loadComboBox.php", {comboBox: 'titlecomboComboBox'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0"> -- No Data Found -- </option>';
            $('.titlecomboComboBox').html('').append(comboData);
            chosenRefresh();
        } else {
            $.each(e, function(index, qData) {
                if (selected !== undefined || e !== null || e.length !== 0) {
                    if (parseInt(selected) === parseInt(qData.pertlID)) {
                        comboData += '<option value="' + qData.pertlID + '" selected>' + qData.perTlName + '</option>';
                    } else {
                        comboData += '<option value="' + qData.pertlID + '">' + qData.perTlName + '</option>';
                    }
                } else {
                    comboData += '<option value="' + qData.pertlID + '">' + qData.perTlName + '</option>';
                }
            });
            $('.titlecomboComboBox').html('').append(comboData);
            chosenRefresh();
        }
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
    }, "json");
}

function branch_combo_box_load(selected, callBack) {
    var comboData = '';
    $.post("views/loadComboBox.php", {comboBox: 'branchcomboComboBox'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0"> -- No Data Found -- </option>';
            $('.branchCombo').html('').append(comboData);
            chosenRefresh();
        } else {
            $.each(e, function(index, qData) {
                if (selected !== undefined || e !== null || e.length !== 0) {
                    if (parseInt(selected) === parseInt(qData.br_id)) {
                        comboData += '<option value="' + qData.br_id + '" selected>' + qData.br_name + '</option>';
                    } else {
                        comboData += '<option value="' + qData.br_id + '">' + qData.br_name + '</option>';
                    }
                } else {
                    comboData += '<option value="' + qData.br_id + '">' + qData.br_name + '</option>';
                }
            });
            $('.branchCombo').html('').append(comboData);
            chosenRefresh();
        }

        if ($.type(callBack) === 'function') {
            callBack();
        }
    }, "json");
}
function branch_combo_box_driver(selected, callBack) {
    var comboData = '';
    $.post("views/loadComboBox.php", {comboBox: 'branchcomboComboBoxDriver'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0"> -- No Data Found -- </option>';
            $('.branchCombo1').html('').append(comboData);
            chosenRefresh();
        } else {
            $.each(e, function(index, qData) {
                if (selected !== undefined || e !== null || e.length !== 0) {
                    if (parseInt(selected) === parseInt(qData.driv_brid)) {
                        comboData += '<option value="' + qData.driv_brid + '" selected>' + qData.br_name + '</option>';
                    } else {
                        comboData += '<option value="' + qData.driv_brid + '">' + qData.br_name + '</option>';
                    }
                } else {
                    comboData += '<option value="' + qData.driv_brid + '">' + qData.br_name + '</option>';
                }
            });
            $('.branchCombo1').html('').append(comboData);
            chosenRefresh();
        }

        if ($.type(callBack) === 'function') {
            callBack();
        }
    }, "json");
}

function type_combo_box_load(selected) {
    var comboData = '';
    $.post("views/loadComboBox.php", {comboBox: 'typecomboComboBox'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0"> -- No Data Found -- </option>';
            $('.typeCombo').html('').append(comboData);
            chosenRefresh();
        } else {
            $.each(e, function(index, qData) {
                if (selected !== undefined || e !== null || e.length !== 0) {
                    if (parseInt(selected) === parseInt(qData.type_id)) {
                        comboData += '<option value="' + qData.type_id + '" selected>' + qData.type_name + '</option>';
                    } else {
                        comboData += '<option value="' + qData.type_id + '">' + qData.type_name + '</option>';
                    }
                } else {
                    comboData += '<option value="' + qData.type_id + '">' + qData.type_name + '</option>';
                }
            });
            $('.typeCombo').html('').append(comboData);
            chosenRefresh();
        }

    }, "json");
}

function purpose_combo_box_load(selected) {
    var comboData = '';
    $.post("views/loadComboBox.php", {comboBox: 'purposecomboComboBox'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0"> -- No Data Found -- </option>';
            $('.purCombo').html('').append(comboData);
            chosenRefresh();
        } else {
            $.each(e, function(index, qData) {
                if (selected !== undefined || e !== null || e.length !== 0) {
                    if (parseInt(selected) === parseInt(qData.type_id)) {
                        comboData += '<option value="' + qData.pur_id + '" selected>' + qData.pur_name + '</option>';
                    } else {
                        comboData += '<option value="' + qData.pur_id + '">' + qData.pur_name + '</option>';
                    }
                } else {
                    comboData += '<option value="' + qData.pur_id + '">' + qData.pur_name + '</option>';
                }
            });
            $('.purCombo').html('').append(comboData);
            chosenRefresh();
        }


    }, "json");
}

function manu_combo_box_load(selected) {
    var comboData = '';
    $.post("views/loadComboBox.php", {comboBox: 'manucomboComboBox'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0"> -- No Data Found -- </option>';
            $('.manuCombo').html('').append(comboData);
            chosenRefresh();
        } else {
            $.each(e, function(index, qData) {
                if (selected !== undefined || e !== null || e.length !== 0) {
                    if (parseInt(selected) === parseInt(qData.mcntry_id)) {
                        comboData += '<option value="' + qData.mcntry_id + '" selected>' + qData.mcntry_name + '</option>';
                    } else {
                        comboData += '<option value="' + qData.mcntry_id + '">' + qData.mcntry_name + '</option>';
                    }
                } else {
                    comboData += '<option value="' + qData.mcntry_id + '">' + qData.mcntry_name + '</option>';
                }
            });
            $('.manuCombo').html('').append(comboData);
            chosenRefresh();
        }

    }, "json");
}

function condition_combo_box_load(selected) {
    var comboData = '';
    $.post("views/loadComboBox.php", {comboBox: 'conditioncomboComboBox'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0"> -- No Data Found -- </option>';
            $('.conCombo').html('').append(comboData);
            chosenRefresh();
        } else {
            $.each(e, function(index, qData) {
                if (selected !== undefined || e !== null || e.length !== 0) {
                    if (parseInt(selected) === parseInt(qData.condition_id)) {
                        comboData += '<option value="' + qData.condition_id + '" selected>' + qData.condition_name + '</option>';
                    } else {
                        comboData += '<option value="' + qData.condition_id + '">' + qData.condition_name + '</option>';
                    }
                } else {
                    comboData += '<option value="' + qData.condition_id + '">' + qData.condition_name + '</option>';
                }
            });
            $('.conCombo').html('').append(comboData);
            chosenRefresh();
        }

    }, "json");
}

function brand_combo_box_load(selected) {
    var comboData = '';
    $.post("views/loadComboBox.php", {comboBox: 'brandcomboComboBox'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0"> -- No Data Found -- </option>';
            $('.brandCombo').html('').append(comboData);
            chosenRefresh();
        } else {
            $.each(e, function(index, qData) {
                if (selected !== undefined || e !== null || e.length !== 0) {
                    if (parseInt(selected) === parseInt(qData.brand_id)) {
                        comboData += '<option value="' + qData.brand_id + '" selected>' + qData.brand_name + '</option>';
                    } else {
                        comboData += '<option value="' + qData.brand_id + '">' + qData.brand_name + '</option>';
                    }
                } else {
                    comboData += '<option value="' + qData.brand_id + '">' + qData.brand_name + '</option>';
                }
            });
            $('.brandCombo').html('').append(comboData);
            chosenRefresh();
        }

    }, "json");
}

function company_combo_box_load(selected) {
    var comboData = '';
    $.post("views/loadComboBox.php", {comboBox: 'companycomboComboBox'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            comboData += '<option value="0"> -- No Data Found -- </option>';
            $('.insCombo').html('').append(comboData);
            chosenRefresh();
        } else {
            $.each(e, function(index, qData) {
                if (selected !== undefined || e !== null || e.length !== 0) {
                    if (parseInt(selected) === parseInt(qData.insuc_id)) {
                        comboData += '<option value="' + qData.insuc_id + '" selected>' + qData.insuc_name + '</option>';
                    } else {
                        comboData += '<option value="' + qData.insuc_id + '">' + qData.insuc_name + '</option>';
                    }
                } else {
                    comboData += '<option value="' + qData.insuc_id + '">' + qData.insuc_name + '</option>';
                }
            });
            $('.insCombo').html('').append(comboData);
            chosenRefresh();
        }

    }, "json");
}

