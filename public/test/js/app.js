//funcion que agrega las tarjetas con los productos
function loadProducts(dataAjax) {
    $(".product-space").html();
    let data = dataAjax['data'];

    current_page = dataAjax.current_page;
    let last_page = dataAjax.last_page;

    $("#bs-count #bs-count-cont").html(dataAjax.total);
    $("#bs-count").css('display', 'block');

    $(".product-space").html('');
    data.map((product) => {
        $(".product-space").append(`
        <div class="product-card">
        <span onclick="loadTable('bycategory/all/${product.category['id']}/asc',1);" class="bsale-tag reflejo category${product.category['id']}">${product.category['name']}</span>
        <div class="product-img">
        <img onclick="modalImage('${product.url_image}')" src="${imageValid(product.url_image)}" alt="" title="">
        </div>
        <p class="product-title">${product.name}</p>
        <div class="product-footer">
        <p>$${numberFormate(product.price)} <span id="carrito"></span></p>
        </div>
        </div>`
        );
    });
    let idprev = "id='btn-previous'";
    let numprev = (parseInt(current_page) - 1);
    let idnext = "id='btn-next'";
    let numnext = (parseInt(current_page) + 1);
    let btnprev = `<button ${idprev} data-page="${numprev}" class="bs-active">anterior</button>`;
    let btnnext = `<button ${idnext} data-page="${numnext}" class="bs-active">siguiente</button>`;

    if (parseInt(current_page) - 1 < 1) {
        btnprev = `<button  data-page="${numprev}" class="bs-disable">anterior</button>`;
    }

    if (parseInt(current_page) + 1 > last_page) {
        btnnext = `<button  data-page="${numnext}" class="bs-disable">siguiente</button>`;
    }

    $('#pagination').html(`${btnprev}${btnnext}`);

}





