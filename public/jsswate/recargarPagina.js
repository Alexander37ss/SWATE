let refresh = document.getElementById('refresh');
let botones = document.querySelector('#botonesDetalle');
let btnRegresar = document.querySelector('#regresar');
refresh.addEventListener('click', _ => {
    botones.classList.toggle('inactive');
    btnRegresar.classList.toggle('inactive');
})