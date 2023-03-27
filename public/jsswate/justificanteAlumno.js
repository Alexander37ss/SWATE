const OtroMotivo = document.querySelector('#OtroMotivo');
const Motivos = document.querySelector('#motivos');
console.log(Motivos);

function AparecerOtroMotivo(){
    if(Motivos.value === "Otro"){
        OtroMotivo.classList.remove('inactive');
    }else{
        OtroMotivo.classList.add('inactive');
    }
}