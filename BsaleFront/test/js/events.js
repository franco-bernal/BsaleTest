//evento que escucha el boton buscar, este evento obtiene los datos del formulario y lo pasa a loadTable
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

    let orden = $("#orden").val();

    url_current = `bycategory/${name}/${category}/${orden}`;
    loadTable(`bycategory/${name}/${category}/${orden}`, 1);
});

//botones de paginacion
$('body').on('click', '#btn-previous', function () {
    let pageNumber = $("#btn-previous").attr("data-page");
    loadTable(url_current, pageNumber);
});
$('body').on('click', '#btn-next', function () {
    let pageNumber = $("#btn-next").attr("data-page");
    loadTable(url_current, pageNumber);
});

//limpiar formulario
$('body').on('click', '#limpiarForm', function (e) {
    e.preventDefault();
    $("form")[0].reset();
});