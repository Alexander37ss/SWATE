var urlHome =  window.location;
var urlHome =  urlHome.pathname;
const inputHistorial = document.querySelector('#busquedaHistorial');
const BotonFiltroHistorial = document.querySelector('#BotonFiltroHistorial');
const busquedaBotonHistorial = document.querySelector('#busquedaBotonHistorial');
console.log(urlHome);

window.addEventListener('load', BorrarFiltroDinamicoHistorial);
busquedaBotonHistorial.addEventListener('click', BuscarAlumnosHistorial);

function BorrarFiltroDinamicoHistorial(){
    if(urlHome !== "/SWATE/public/home"){
      BotonFiltroHistorial.classList.add('btn-danger');
      BotonFiltroHistorial.classList.remove('btn-secondary');
    }
}


function BuscarAlumnosHistorial() {
  // Declare variables
  var  filter, table, tr, td, i, txtValue;
  filter = inputHistorial.value.toUpperCase();
  table = document.getElementById("TablaHistorial");
  tr = table.getElementsByTagName("tr");
  if(inputHistorial.value != ""){
    BotonFiltroHistorial.classList.add('btn-danger');
    BotonFiltroHistorial.classList.remove('btn-secondary');
  }else{
    BotonFiltroHistorial.classList.remove('btn-danger');
    BotonFiltroHistorial.classList.add('btn-secondary');
  }

  // Loop through all table rows, and hide those who don't match the search query
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
    var filter, table, tr, td, i, txtValue;
    const inputFecha = document.querySelector('#busquedaFecha');
    filter = inputFecha.value.toUpperCase();
    table = document.getElementById("TablaHistorial");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[3];
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