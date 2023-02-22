const OtroMotivo = document.querySelector('#OtroMotivo');
const Motivo = document.querySelector('#Motivo');

OtroMotivo.addEventListener('click', AparecerOtroMotivo);
console.log(Motivo.value);
function AparecerOtroMotivo(){
    if(Motivo.value === "Otro"){
        OtroMotivo.classList.remove('inactive');
        console.log(Motivo.value);
    }else{
        OtroMotivo.classList.add('inactive');
        console.log(Motivo.value);
    }
}
