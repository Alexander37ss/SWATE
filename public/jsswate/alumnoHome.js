const numJustificantes = document.querySelector("#numeroJustificantes").innerHTML;
const alertaNueva = document.querySelector('#alerta');
var numJustAlmacen = localStorage.getItem('numeroJustificantes'); 
if(!numJustAlmacen){
localStorage.setItem('numeroJustificantes', "0");
}

function hide(){
    alertaNueva.classList.add('inactive');
    console.log('x');
}

function show(){
    alertaNueva.classList.remove('inactive');
    localStorage.setItem('numeroJustificantes', numJustificantes);
    console.log('d');
}
if(numJustAlmacen == numJustificantes){
    hide();
}else{
    show();
}