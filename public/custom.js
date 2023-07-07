$(document).ready(function () {
    $("#table1").DataTable();
    $("#table2").DataTable();
    $("#table3").DataTable();
    $("#table4").DataTable();

    // limiting past date

    let dtToday = new Date();

    let month = dtToday.getMonth() + 1;
    let day = dtToday.getDate();
    let year = dtToday.getFullYear();
    if (month < 10) month = "0" + month.toString();
    if (day < 10) day = "0" + day.toString();

    let maxDate = year + "-" + month + "-" + day;

    $("#when").attr("min", maxDate);

    // Adding editor
    ClassicEditor.create(document.querySelector("#editor"), {
        toolbar: [
            "heading",
            "bold",
            "italic",
            "bulletedList",
            "numberedList",
            "link",
        ],
    }).catch((error) => {
        console.error(error);
    });
});
