$('body').on('click', '#btn-submit', function (e) {
    e.preventDefault();

    let name = $("#txt-name").val().trim();
    name = name.replace(/\//g, "");
    name = name.replace(/,/g, "");

    let category = $("#category").val();

    if (category == -1) {
        category = "all";
    }
    if (name.length == 0 && name == "") {
        name = "all";
    }
    loadTable(`byfilter/${name}/${category}`);
});



$('body').on('click', '#btn-previous', function () {
    let pageNumber = $("#btn-previous").attr("data-page");
    loadProducts(data, pageNumber);
});
$('body').on('click', '#btn-next', function () {
    let pageNumber = $("#btn-next").attr("data-page");
    loadProducts(data, pageNumber);
});