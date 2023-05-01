var urlHome =  window.location;
var urlHome =  urlHome.pathname;
const inputHistorial = document.querySelector('#busquedaHistorial');
const BotonFiltroHistorial = document.querySelector('#BotonFiltroHistorial');
const busquedaBotonHistorial = document.querySelector('#busquedaBotonHistorial');
const PaseDeSalida = document.querySelector('#PaseDeSalida');
const Justificante = document.querySelector('#Justificante');
var table = document.getElementById("TablaHistorial");
console.log(urlHome);

window.addEventListener('load', BorrarFiltroDinamicoHistorial);
busquedaBotonHistorial.addEventListener('click', BuscarAlumnosHistorial);

function BorrarFiltroDinamicoHistorial(){
    if(urlHome !== "/SWATE/public/historial"){
      BotonFiltroHistorial.classList.add('btn-danger');
      BotonFiltroHistorial.classList.remove('btn-secondary');
    }
}

function FiltrarPaseSalida(){
  var  filter, tr, td, i, txtValue;
  filter = PaseDeSalida.innerHTML.toUpperCase();
  tr = table.getElementsByTagName("tr");

  BotonFiltroHistorial.classList.add('btn-danger');
  BotonFiltroHistorial.classList.remove('btn-secondary');

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function FiltrarJustificante(){
  var  filter, tr, td, i, txtValue;
  filter = Justificante.innerHTML.toUpperCase();
  tr = table.getElementsByTagName("tr");

  BotonFiltroHistorial.classList.add('btn-danger');
  BotonFiltroHistorial.classList.remove('btn-secondary');

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function BuscarAlumnosHistorial() {
  var  filter, tr, td, i, txtValue;
  filter = inputHistorial.value.toUpperCase();
  tr = table.getElementsByTagName("tr");
  if(inputHistorial.value != ""){
    BotonFiltroHistorial.classList.add('btn-danger');
    BotonFiltroHistorial.classList.remove('btn-secondary');
  }else{
    BotonFiltroHistorial.classList.remove('btn-danger');
    BotonFiltroHistorial.classList.add('btn-secondary');
  }

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}


function BuscarFecha() {
  var tr, td, i, txtValue;
  const inputFecha = document.querySelector('#busquedaFecha');
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue == inputFecha.value) {
        console.log(txtValue);
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}