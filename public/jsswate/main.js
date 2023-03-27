var url = window.location;
const allLinks = document.querySelectorAll('.nav-link');
const currentLink = [...allLinks].filter(e => {
  return e.href == url;
});

/* currentLink[0].classList.add("active"); */

const homebutton = document.querySelector('#home');
const p_home = document.querySelector('#parrafohome');
const home_icon = document.querySelector('#homeicon');


/* if(homebutton.classList.contains('active')){
    p_home.classList.add('color-blanco');
    home_icon.setAttribute("style", "color: white;");
}else{
    home_icon.setAttribute("style", "color: black;");
} */


const orientadoras = document.querySelector('#orientadoras');
const consultar = document.querySelector('#consultar');
const tieneClase = consultar.classList.contains('active');

