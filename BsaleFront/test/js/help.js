//metodo que ayuda a number formate
function integerValid(value) {
    var RegExPattern = /[0-9]+$/;
    return RegExPattern.test(value);
}

//funcion que agrega los puntos a los precios
function numberFormate(value) {
    if (integerValid(value)) {
        var retorno = '';
        value = value.toString().split('').reverse().join('');
        var i = value.length;
        while (i > 0) retorno += ((i % 3 === 0 && i != value.length) ? '.' : '') + value.substring(i--, i);
        return retorno;
    }
    return 0;
}


//valida si existe imagen, si no entrega una por default
function imageValid(image) {
    if (image == "" || image == null) {
        return "https://devfranco.tk/test/img/default/product_error.jpg";
    }
    return image;
}
function modalImage(image) {
    bsOpenModal('bs_modal');

    if (image != null && image != "") {
        $(".bs_cont").css("background-image", `url('${image}')`);
    } else {
        $(".bs_cont").css("background-image", `url('https://devfranco.tk/test/img/default/product_error.jpg')`);
    }
}
