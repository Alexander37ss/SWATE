const OtroMotivo = document.querySelector('#OtroMotivo');
const Motivos = document.querySelector('#motivos');

function AparecerOtroMotivo(){
    if(Motivos.value === "Otro"){
        OtroMotivo.classList.remove('inactive');
    }else{
        OtroMotivo.classList.add('inactive');
    }
}

const motivo = document.querySelector('#motivo');
const motivoOtro = document.querySelector('#motivoOtro');
const inputOtro = document.querySelector('#inputOtro');
console.log(motivo.innerHTML);
if(motivo.innerHTML == 'Otro'){
    Motivos.value = "Otro";
    OtroMotivo.classList.remove('inactive');
    inputOtro.value = motivoOtro.innerHTML;
}else{
    Motivos.value = motivo.innerHTML;
}