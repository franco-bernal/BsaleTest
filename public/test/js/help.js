
function integerValid(value) {
    var RegExPattern = /[0-9]+$/;
    return RegExPattern.test(value);
}

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

function imageValid(image) {
    if (image == "" || image == null) {
        return "https://devfranco.tk/test/img/default/product_error.jpg";
    }
    return image;
}

function paginate(array, page_size, page_number) {
    return array.slice((page_number - 1) * page_size, page_number * page_size);
}

function modalImage(image) {
    bsOpenModal('bs_modal');

    if (image != null && image != "") {
        $(".bs_cont").css("background-image", `url('${image}')`);
    } else {
        $(".bs_cont").css("background-image", `url('https://devfranco.tk/test/img/default/product_error.jpg')`);
    }
}