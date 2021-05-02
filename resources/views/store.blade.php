<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSale Test</title>

    <link rel="stylesheet" href="{{ asset('/test/css/bulma.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/test/css/reset.css') }}">
    <script type="text/javascript" src="{{ asset('/test/js/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/test/js/help.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/test/js/app.js') }}"></script>

</head>

<body>

    <div class="hero">
        <header>
            <div>
                <h5>Bsale Test</h5>
                <p>Tienda</p>
            </div>
            <div class="centrar">
                <form>
                    <input type="text" id="txt-name" placeholder="Buscar...">
                    <button id="btn-name">Buscar</button>
                </form>




            </div>
        </header>

        <section class="hero-section product-space"></section>
        <div id="pagination" class="centrar">

        </div>

    </div>



    <script>
        loadTable('bycategory');



        function loadTable(filtro) {

            $('.product-space').html(`<div class="loader is-loading centrar"></div>`);

            $.ajax({
                type: 'GET',
                url: "https://devfranco.tk/api/" + filtro,
                success: function(data) {
                    $('#pagination').html("");
                    if (data == "") {
                        $('.product-space').html(` <br><br><br><br><br><br><br><br>
                         <h1 style="text-align: center; font-size:30px">Sin coincidencias</h1>`);
                    } else {
                        loadProducts(data);
                    }
                },
                error: function(error) {
                    console.log(error);
                    //$(".body-result").html("Sin información");
                }

            })
        }
    </script>

    <script type="text/javascript" src="{{ asset('/test/js/events.js') }}"></script>


</body>

</html>