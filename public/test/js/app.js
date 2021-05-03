var data;

function loadProducts(dataAjax, page = 1) {
    data = dataAjax;
    newData = "";

    dataPaginate = paginate(data, 8, page);
    paginateNext = paginate(data, 8, (parseInt(page) + 1));
    console.log(paginateNext);


    dataPaginate.map((product) => {
        newData += `
    <div class="product-card">
    <span onclick="loadTable('byfilter/all/${product.category}');" class="bsale-tag reflejo category${product.category}">${product.name_category}</span>
        <div class="product-img">
         <img onclick="modalImage('${product.url_image}')" src="${imageValid(product.url_image)}" alt="" title="">
        </div>
        <p class="product-title">${product.name}</p>
        <div class="product-footer">
            <p>$${numberFormate(product.price)} <span id="carrito"></span></p>
        </div>
    </div>`;
    });
    $(".product-space").html(newData);

    let idprev = "id='btn-previous'";
    let numprev = (parseInt(page) - 1);
    let idnext = "id='btn-next'";
    let numnext = (parseInt(page) + 1);
    let btnprev = `<button ${idprev} data-page="${numprev}">anterior</button>`;
    let btnnext = `<button ${idnext} data-page="${numnext}">siguiente</button>`;
    if (page - 1 < 1) {
        btnprev = "";
    }
    if (paginateNext == "") {
        btnnext = "";
    }
    $('#pagination').html(`${btnprev}${btnnext}`);

}





