$(document).ready(function () {
    $('body').on('click', '#btn-name', function (e) {
        e.preventDefault();
        let name = $("#txt-name").val();
        name = name.replace(/\//g, "");
        name = name.replace(/,/g, "");
        if (name == "") {
            loadTable('byname/all');
        } else {
            loadTable('byname/' + name);
        }
    });
    $('body').on('click', '#btn-previous', function () {
        let pageNumber = $("#btn-previous").attr("data-page");
        loadProducts(data, pageNumber);
    });
    $('body').on('click', '#btn-next', function () {
        let pageNumber = $("#btn-next").attr("data-page");
        loadProducts(data, pageNumber);
    });
});