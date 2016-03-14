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
    setTimeout(function() {
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

function alertFadeOut() {
    $(".alert").delay(200).fadeOut(2000);
}

function chosenRefresh() {
    $("select").trigger("chosen:updated");
}

function timelyRedirect(url, delay) {
    setTimeout(function() {
        window.location = url;
    }, delay);
}

function refreshBootstrapSwitch() {
    $('.switch')['bootstrapSwitch']();
}

function modalShowEventCallBack(modalData, callback) {
    modalData.modal("show").on('shown.bs.modal', function() {
        callback();
    });
}

function confirm(heading, question, cancelButtonTxt, okButtonTxt, callback) {

//    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
//  <div class="modal-dialog">
//    <div class="modal-content">
//      <div class="modal-header">
//        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
//        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
//      </div>
//      <div class="modal-body">
//        ...
//      </div>
//      <div class="modal-footer">
//        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
//        <button type="button" class="btn btn-primary">Save changes</button>
//      </div>
//    </div>
//  </div>
//</div>
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
    confirmModal.find('#OkButton').click(function(event) {
        callback();
        confirmModal.modal('hide');
    });
    confirmModal.modal('show');
}

function logout() {
    alertify.confirm("Are you sure want to log out the system", function(e) {
        if (e) {
            $.post("views/databaseViews.php", {proccess: 'logout'}, function(e) {
                timelyRedirect("dashboard.php", 0);
            });
        }
    });
}

function  login(userName, password, remember) {
    $.post("views/databaseViews.php", {logSystem: 'login', userName: userName, password: password, remember: remember}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            alertify.error("System Error Occured", 2000);
        } else {
            $.each(e, function(index, msgData) {
                if (msgData.msgType === 0) {
                    alertify.success(msgData.msg, 1450)
                    timelyRedirect("settings_dashboard.php", 1500);
                } else if (msgData.msgType === 1) {
                    alertify.error(msgData.msg, 2000);
                } else if (msgData.msgType === 2) {
                    alertify.error(msgData.msg, 2000);
                } else if (msgData.msgType === 3) {
                    alertify.error(msgData.msg, 2000);
                }
            });
        }
    }, "json");
}

function alertifyMsgDisplay(jsonArray, msgTime, sucess, fail) {
    $.each(jsonArray, function(index, msgData) {
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
        "img/starterSlides/h.jpg"
    ], {
        duration: 3000, fade: 1000
    });
}


function loadAllUserControlTable() {
    var tableData;
    $.post("views/loadTables.php", {table: 'AllUserControlTable'}, function(tableData) {
        if (tableData === undefined || tableData.length === 0 || tableData === null) {
            $('#allUsersControlTable tbody').html(' -- No Data Found -- ');
        } else {
            $.each(tableData, function(index, tblValue) {
                tableData += '<tr>';
                tableData += '<td>' + index + '</td>';
                tableData += '<td>' + tblValue.user_name + '</td>';
//                tableData += '<td>' + tblValue.pwd + '</td>';
                if (parseInt(tblValue.user_level) === 0) {
                    tableData += '<td> GUIEST LEVEL </td>';
                } else if (parseInt(tblValue.user_level) === 1) {
                    tableData += '<td> USER LEVEL </td>';
                } else if (parseInt(tblValue.user_level) === 2) {
                    tableData += '<td> SUPER ADMIN LEVEL </td>';
                } else if (parseInt(tblValue.user_level) === 5) {
                    tableData += '<td> ADMIN LEVEL </td>';
                }

                if (parseInt(tblValue.approved) === 1) {

                    tableData += '<td> AUTHORICED USER </td>';
                    tableData += '<td><div  class="switch switch-small userActivation" data-animated="true" data-on="success" data-off="danger" data-on-label="AC" data-off-label="DC"><input class="usrID" type="checkbox" value="' + tblValue.id + '" checked></div></td>';
                } else {
                    tableData += '<td> UNAUTHORISED USER </td>';
                    tableData += '<td><div class="switch switch-small userActivation" data-animated="true" data-on="success" data-off="danger" data-on-label="AC" data-off-label="DC"><input class="usrID" type="checkbox" value="' + tblValue.id + '"></div></td>';
                }
                tableData += '<td><div class="btn-group"><button class="btn btn-warning updateSystemUser" value="' + tblValue.id + '"><i class="fa fa-lg fa-edit"></i> Edit</button><button class="btn btn-danger deleteSystemUser" value="' + tblValue.id + '"><i class="fa fa-trash-o fa-lg"></i> Delete</button><div></td>';
                tableData += '</tr>';
            });
            $('#allUsersControlTable tbody').html('').append(tableData);
            refreshBootstrapSwitch();
            /////////////// USER ACTIVATION /////////////////////
            $('.userActivation').on('switch-change', function(e, data) {
                if (data.value) {
                    $(this).find('input:checkbox').attr('checked', function() {
                        uID = $(this).val();
                        $.post("views/databaseViews.php", {userActivation: "active", uID: uID}, function(ua) {
                            loadAllUserControlTable();
                            alertifyMsgDisplay(ua, 2000);
                        }, "json");
                    });
                } else {
                    $(this).find('input:checkbox').attr('checked', function() {
                        uID = $(this).val();
                        $.post("views/databaseViews.php", {userActivation: "deactivate", uID: uID}, function(ua) {
                            loadAllUserControlTable();
                            alertifyMsgDisplay(ua, 2000);
                        }, "json");
                    });
                }
            });
            ///////////// DELETE USERS /////////////////
            $('.deleteSystemUser').click(function() {
                deleteSystemUserID = $(this).val();
                confirm("Delete System Users", "Are you sure want to detele this user", "No", "Yes", function() {
                    $.post("views/databaseViews.php", {userLoginProccess: 'deleteUser', deleteSystemUserID: deleteSystemUserID}, function(e) {
                        loadAllUserControlTable();
                        alertifyMsgDisplay(e, 2000);
                    }, "json");
                });
            });
            ///////////// UPDATE USERS ///////////////
            $('.updateSystemUser').click(function() {
                updateSystemUsers($(this).val());
            });
        }
    }, "json");
}

function createSystemUsers() {
//headingText,bodyHtml,footerBtns
    var Actionmodel = $('<div class="modal fade">' +
            '<div class="modal-dialog">' +
            '<div class="modal-content">' +
            '<div class="modal-header">' +
            '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
            '<h4 class="modal-title">Create System Users</h4>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div class="row">' +
            '<div class="form-horizontal">' +
            '<div class="form-group">' +
            '<label for="modalUserName" class="col-md-4 control-label">User Name</label>' +
            '<div class="col-md-6">' +
            '<input type="text" class="form-control modalUserName" placeholder="User Name">' +
            '</div>' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="modalUserLevel" class="col-md-4 control-label">User Permission Level</label>' +
            '<div class="col-md-6">' +
            '<select  class="form-control modalUserLevel" >' +
            '<option value="2">SUPER LEVEL</option>' +
            '<option value="5">ADMIN LEVEL</option>' +
            '<option value="1">USER LEVEL</option>' +
            '<option value="0">GUEST LEVEL</option>' +
            '</select>' +
            '</div>' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="modalUserPassword" class="col-md-4 control-label">User Password</label>' +
            '<div class="col-md-6">' +
            '<input type="password" class="form-control modalUserPassword" placeholder="User Password">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="modal-footer">' +
            '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' +
            '<button type="button" class="btn btn-primary modalUserSave" id="okButton"><i class="fa fa-lg fa-save"></i> Create</button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>');
    Actionmodel.modal("show");
    Actionmodel.find(".modalUserSave").click(function() {
        modalUserName = $('.modalUserName').val();
        modalUserLevel = $('.modalUserLevel').val();
        modalUserPassword = $('.modalUserPassword').val();
        if (modalUserName !== null && modalUserPassword !== null) {
            $.post('views/databaseViews.php', {userLoginProccess: 'saveUser', modalUserName: modalUserName, modalUserLevel: modalUserLevel, modalUserPassword: modalUserPassword}, function(e) {
                loadAllUserControlTable();
                alertifyMsgDisplay(e, 2000);
            }, "json");
        } else {
            alertify.error("Sorry! coudld not be saved new user.please enter both username and password", 2000)
        }
        Actionmodel.modal('hide');
    });
}

function updateSystemUsers(userID) {

    var Actionmodel = $('<div class="modal fade">' +
            '<div class="modal-dialog">' +
            '<div class="modal-content">' +
            '<div class="modal-header">' +
            '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
            '<h4 class="modal-title">Update System Users</h4>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div class="row">' +
            '<div class="form-horizontal">' +
            '<input type="hidden" class="form-control modalUserID" >' +
            '<div class="form-group">' +
            '<label for="modalUserName" class="col-md-4 control-label">User Name</label>' +
            '<div class="col-md-6">' +
            '<input type="text" class="form-control modalUserName" placeholder="User Name">' +
            '</div>' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="modalUserLevel" class="col-md-4 control-label">User Permission Level</label>' +
            '<div class="col-md-6">' +
            '<select  class="form-control modalUserLevel" >' +
            '<option value="2">SUPER LEVEL</option>' +
            '<option value="5">ADMIN LEVEL</option>' +
            '<option value="1">USER LEVEL</option>' +
            '<option value="0">GUEST LEVEL</option>' +
            '</select>' +
            '</div>' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="modalUserPassword" class="col-md-4 control-label">User Password</label>' +
            '<div class="col-md-6">' +
            '<input type="password" class="form-control modalUserPassword" placeholder="User Password">' +
            '</div>' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="showHidePwd" class="col-md-4 control-label">Show / Hide Password</label>' +
            '<div class="col-md-6">' +
            '<input type="checkbox" class="showHidePwd"> ' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="modal-footer">' +
            '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' +
            '<button type="button" class="btn btn-primary modalUserUpdate" id="okButton"><i class="fa fa-lg fa-save"></i> Update</button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>');
    $.post("views/databaseViews.php", {userLoginProccess: 'getUserDetailsByID', userID: userID}, function(userData) {
        if (userData === undefined || userData.length === 0 || userData === null) {
            alertify.error("Internal Error Occured", 2000);
        } else {
            $.each(userData, function(index, userDataView) {
                modalShowEventCallBack(Actionmodel, function() {
                    $('.modalUserID').val(userDataView.id);
                    $('.modalUserName').val(userDataView.user_name);
                    $('.modalUserLevel').val(userDataView.user_level);
                    $('.modalUserPassword').val(userDataView.pwd);
                    $('.showHidePwd').click(function() {
                        $('.modalUserPassword').hideShowPassword($(this).prop('checked'));
                    });
                });
            });
        }
        Actionmodel.find(".modalUserUpdate").click(function() {
            modalUserID = $('.modalUserID').val();
            modalUserName = $('.modalUserName').val();
            $('.modalUserLevel').append(function() {
                modalUserLevel = $(this).val();
            });
            modalUserPassword = $('.modalUserPassword').val();
            if (modalUserName !== null && modalUserPassword !== null) {
                console.log(modalUserID + ' ' + modalUserLevel);
                $.post('views/databaseViews.php', {userLoginProccess: 'updateUser', modalUserName: modalUserName, modalUserLevel: modalUserLevel, modalUserPassword: modalUserPassword, modalUserID: modalUserID}, function(e) {
                    loadAllUserControlTable();
                    alertifyMsgDisplay(e, 2000);
                }, "json");
            } else {
                alertify.error("Sorry! coudld not be saved new user.please enter both username and password", 2000)
            }
            Actionmodel.modal('hide');
        });
    }, "json");
}

function getSystemBackup(BckupBtnClassName, msgDisplayClassName) {
    $.post("views/databaseViews.php", {databseBackup: 'backup'}, function(msg) {
        $(msgDisplayClassName).html(msg);
    });
}

function wardSave() {
    var wardName = $('#wardName').val();
    if (wardName !== '') {
        $.post("views/commenSettingView.php", {action: 'wardSave', wardName: wardName}, function(e) {
            alertifyMsgDisplay(e, 1000, function() {
                wardTable();
            });
        }, "json");
    } else {
        alertify.error("Please Enter Want Name", 1000);
    }
}

function selectWard(wardID) {
    if (parseInt(wardID) !== 0) {
        $.post("views/commenSettingView.php", {action: 'selectWard', wardID: wardID}, function(e) {
            if (e === undefined || e.length === 0 || e === null) {
                alertify.error("No Data Found For Update Ward", 1000);
            } else {
                showWardActionBtn();
                $.each(e, function(index, qData) {
                    $('#wardName').val(qData.ward_name);
                    $('#wardID').val(qData.ward_id);
                });
            }
        }, "json");
    } else {
        alertify.error("Sorry This Data Error Occured When Updating", 1000);
    }
}

function showWardActionBtn() {
    if ($('#wardActionBtn').hasClass('hidden')) {
        $('#wardActionBtn').removeClass('hidden');
    }
}
function hideWardActionBtn() {
    if (!$('#wardActionBtn').hasClass('hidden')) {
        $('#wardActionBtn').addClass('hidden');
    }
}

function deleteWard(wardID) {
    if (parseInt(wardID) !== 0) {
        $.post("views/commenSettingView.php", {action: 'deleteWard', wardID: wardID}, function(e) {
            if (e === undefined || e.length === 0 || e === null) {
                alertify.error("No Data Found For Delete Ward", 1000);
            } else {
                $.post("views/commenSettingView.php", {action: 'deleteWard', wardID: wardID}, function(e) {
                    alertifyMsgDisplay(e, 1000, function() {
                        wardTable();
                    });
                }, "json");
            }
        }, "json");
    } else {
        alertify.error("Sorry This Data Error Occured When Delete", 1000);
    }
}











