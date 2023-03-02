const OtroMotivoPase = document.querySelector('#OtroMotivoPase');
const MotivoPase = document.querySelector('#MotivoPase');

function AparecerOtroMotivoPase(){
    if(MotivoPase.value === "Otro"){
        OtroMotivoPase.classList.remove('inactive');
    }else{
        OtroMotivoPase.classList.add('inactive');
    }
}