<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G</title>

    <link rel="stylesheet" href="{{ asset('/test/css/bulma.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/test/css/reset.css') }}">
    <script type="text/javascript" src="{{ asset('/test/js/jquery-3.5.1.min.js') }}"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

    <div class="hero">
        <header>
            <div>
                <h5>Bsale Test</h5>
                <p>Tienda</p>
            </div>
            <div class="centrar">
                <form method='GET' action=" route('filter') ">
                    <input type="text" name="filtro" value=" old('filtro', $filtro) " placeholder="Buscar...">
                    <button type="submit"> Buscar</button>
                </form>
            </div>
        </header>

        <section class="hero-section product-space">

            @forelse($product as $prod)
            <div class="product-card">
                <div class="product-img">
                    @if($prod->url_image!="")
                    <img src="{{ $prod->url_image }}" alt="{{ $prod->name }}" title="{{ $prod->name }}">
                    @else
                    <img src="{{ url('/test/img/default/product_error.jpg') }}" alt="error_product" style="width:100%; height:auto;">
                    @endif
                </div>
                <p class="product-title">{{ $prod->name }}</p>
                <div class="product-footer">
                    <p>${{ $prod->price }} <img src="{{ url('/test/img/default/carro.png') }}" alt="shopping"></p>
                </div>
            </div>
            @empty
            <p>Vacío</p>
            @endforelse
        </section>




    </div>


</body>

</html>