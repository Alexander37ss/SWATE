var url = window.location;
const allLinks = document.querySelectorAll('.nav-link');
const currentLink = [...allLinks].filter(e => {
  return e.href == url;
});

currentLink[0].classList.add("active");

const homebutton = document.querySelector('#home');
const p_home = document.querySelector('#parrafohome');
const home_icon = document.querySelector('#homeicon');


if(homebutton.classList.contains('active')){
    p_home.classList.add('color-blanco');
    home_icon.setAttribute("style", "color: white;");
}else{
    home_icon.setAttribute("style", "color: black;");
}


const orientadoras = document.querySelector('#orientadoras');
const consultar = document.querySelector('#consultar');
const tieneClase = consultar.classList.contains('active');
if(tieneClase){
    orientadoras.classList.add('link-activo');
}else{
    orientadoras.classList.remove('link-activo');
}

const OtroMotivo = document.querySelector('#OtroMotivo');
const Motivo = document.querySelector('#Motivo');
var anterior = 0;

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