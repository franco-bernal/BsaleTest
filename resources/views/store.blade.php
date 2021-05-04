<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSale Test</title>

    <link rel="stylesheet" href="{{ asset('/test/css/bulma.min.css') }}">
    <script type="text/javascript" src="{{ asset('/test/js/jquery-3.5.1.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('/test/css/bs_modal.css') }}">
    <script type="text/javascript" src="{{ asset('/test/js/bs_modal.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('/test/css/reset.css') }}">
    <script type="text/javascript" src="{{ asset('/test/js/help.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/test/js/app.js') }}"></script>


</head>

<body>

    <div id="bs_modal" class="bs_modal">
        <a onclick="bsCloseModal('bs_modal')" class="close_modal_bs">x</a>
        <div id="bs_cont" class="bs_cont">
        </div>
    </div>

    <div class="hero">
        <header>
            <div>
                <h5 onclick="loadTable('bycategory/all/all/asc',1);">Bsale Test</h5>
                <a href="{{asset('/test/pdf/documentacion-Bsale-test.pdf')}}" style="margin:10px">Documento</a>
            </div>
            <div class="centrar bs-form">
                <form>
                    <input type="text" id="txt-name" placeholder="Buscar...">
                    <select id="category" name="estado" aria-placeholder="Estado">
                        <option value="-1">Categoría</option>
                    </select>
                    <select id="orden" name="orden" aria-placeholder="Orden">
                        <option value="asc">A-Z</option>
                        <option value="desc">Z-A</option>
                        <option value="menos">Menos costosos</option>
                        <option value="mas">Más costosos</option>
                    </select>
                    <button id="btn-submit">Buscar</button>
                    <button id="limpiarForm">Limpiar formulario</button>
                </form>
            </div>
        </header>

        <p id="bs-count">Encontrados:<span id="bs-count-cont">0</span></p>
        <hr>
        <section class="hero-section product-space"></section>
        <div id="pagination" class="centrar">

        </div>

    </div>



    <script>
        //inicialización de variables y elementos para la carga de productos
        var url_current = 'bycategory/';
        var num_pag = 0;
        var current_page = 0;
        loadSelect();
        loadTable('bycategory/all/all/asc');

        //funcion responsable de cargar conectar con el backend para traer los productos
        function loadTable(filtro, page) {
            url_current = filtro;
            current_page = page;
            $("#bs-count").css('display', 'none');
            $('.product-space').html(`<div class="loader is-loading centrar"></div>`);
            $('#pagination').html('');

            $.ajax({
                type: 'GET',
                data: {
                    page: page,
                },
                url: "{{ url('/api') }}" + "/" + filtro,
                success: function(data) {

                    $("header").slideDown();

                    $('#pagination').html("");
                    if (data['data'] == "") {
                        $('.product-space').html(`
                         <h1 style="text-align: center; font-size:20px;color:white;">Sin coincidencias</h1>`);
                    } else {
                        loadProducts(data);
                    }
                },
                error: function(error) {
                    console.log(error);
                }

            })
        }

        //funcion encargada de cargar select con las categorias
        function loadSelect() {
            $.ajax({
                type: 'GET',
                data: {
                    'page': '1'
                },
                url: "{{ url('/api/category') }}",
                success: function(data) {
                    if (data == "") {
                        alert("nada");
                    } else {
                        data.map((category) => {
                            $('#category').append($("<option>", {
                                value: category['id'],
                                text: category['name']
                            }));
                        });
                        categories = data;
                    }
                },
                error: function(error) {
                    console.log(error);
                }

            })
        }
    </script>

    <script type="text/javascript" src="{{ asset('/test/js/events.js') }}"></script>


</body>

</html>