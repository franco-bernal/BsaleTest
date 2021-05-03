<!DOCTYPE html>
<html lang="en">

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
                <h5>Bsale Test</h5>
                <p>Tienda</p>
            </div>
            <div class="centrar">
                <form>
                    <input type="text" id="txt-name" placeholder="Buscar...">
                    <select id="category" name="estado" aria-placeholder="Estado">
                        <option value="-1">Home</option>
                    </select>
                    <button id="btn-submit">Buscar</button>
                </form>




            </div>
        </header>

        <section class="hero-section product-space"></section>
        <div id="pagination" class="centrar">

        </div>

    </div>



    <script>
        loadSelect();
        loadTable('bycategory');



        function loadTable(filtro) {

            $('.product-space').html(`<div class="loader is-loading centrar"></div>`);

            $.ajax({
                type: 'GET',
                url: "http://localhost:8000/api/" + filtro,
                // url: "https://devfranco.tk/api/" + filtro,
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

        function loadSelect() {
            $.ajax({
                type: 'GET',
                url: "http://localhost:8000/api/category",
                // url: "https://devfranco.tk/api/category",
                success: function(data) {
                    $("header").slideDown();
                    if (data == "") {
                        alert("nada");
                    } else {
                        // $('#category').append(`<option>${data[0]['name']}</option>`);
                        data.map((category) => {
                            $('#category').append($("<option>", {
                                value: category['id'],
                                text: category['name']
                            }));
                        });
                        console.log(data[0]['name']);
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