const OtroMotivoJustificante = document.querySelector('#OtroMotivoJustificante');
const MotivoJustificante = document.querySelector('#MotivoJustificante');

function AparecerOtroMotivoJustificante(){
    if(MotivoJustificante.value === "Otro"){
        OtroMotivoJustificante.classList.remove('inactive');
    }else{
        OtroMotivoJustificante.classList.add('inactive');
    }
}