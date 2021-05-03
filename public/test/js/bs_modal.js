function bsOpenModal(el, display) {
    el = document.getElementById(el);
    el.style.opacity = 0;
    el.style.display = display || "flex";
    (function fade() {
        var val = parseFloat(el.style.opacity);
        if (!((val += .1) > 1)) {
            el.style.opacity = val;
            requestAnimationFrame(fade);
        }
    })();
    // document.getElementById('bs_modal').style = 'display:flex';
}
function bsCloseModal(el) {
    el = document.getElementById(el);
    el.style.opacity = 1;
    (function fade() {
        if ((el.style.opacity -= .1) < 0) {
            el.style.display = "none";
        } else {
            requestAnimationFrame(fade);
        }
    })();
    // document.getElementById('bs_modal').style = 'display:none';
}
