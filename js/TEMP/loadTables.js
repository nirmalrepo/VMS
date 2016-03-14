function wardTable() {
    var tableData = '';
    $.post("views/loadTables.php", {table: "wardTable"}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="alert alert-warning text-center"><th colspan="3"> -- No Data Found -- </th></tr>';
            $('.wardTable tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, qData) {
                index++;
                tableData += '<tr>';
                tableData += '<td><input type="checkBox" class="checkBox chkWard"></td>';
                tableData += '<td>' + index + '</td>';
                tableData += '<td>' + qData.ward_name + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selwardData" value="' + qData.ward_id + '"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Select</button><button class="btn btn-danger delWardData" value="' + qData.ward_id + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';
            });
            $('.wardTable tbody').html('').append(tableData);
            tableSorter('.wardTable');

            $('.selwardData').click(function() {
                selectWard($(this).val());
            });

            $('.delWardData').click(function() {
                confirm("Delete ward", "Are You Sure Want To Delete This Ward", "No", "Yes", function() {
                    deleteWard($(this).val());
                });
            });
        }
    }, "json");
}