var today = new Date();
var time =
    today.getHours() + "-" + today.getMinutes() + "-" + today.getSeconds();
var dateTime = today.toLocaleDateString("en-CA") + "_" + time;

// Call the dataTables jQuery plugin
$(document).ready(function () {
    var table = $("#dataTable").DataTable();
});

$(document).ready(function () {
    var table = $("#dataReport").DataTable({
        dom: "Bfrtip",
        buttons: [
            {
                extend: "excel",
                text: "Print Excel",
                className: "btn btn-success",
                autofilter: true,
                filename: "Data Laporan Posyandu Margorejo_" + dateTime,
            },
            {
                extend: "pdf",
                text: "Print PDF",
                className: "btn btn-danger",
                autofilter: true,
                filename: "Data Laporan Posyandu Margorejo_" + dateTime,
            },
        ],
    });
});
