var urlHome =  window.location;
var urlHome =  urlHome.pathname;
const inputHistorial = document.querySelector('#busquedaHistorial');
const botonBorrarFiltro = document.querySelector('#borrarFiltroDinamico')
const PaseDeSalida = document.querySelector('#PaseDeSalida');
const Justificante = document.querySelector('#Justificante');
var table = document.querySelector("#TablaHistorial");
var fecha = document.querySelector("#fecha");
var  filter, tr, td, i, txtValue;
var resultadosHistorial = document.querySelector("#resultadosHistorial");
var numResultadosHistorial;
inputHistorial.addEventListener("keyup", () => {
  inputHistorial.setAttribute("value", inputHistorial.value);
})


function FiltrarPaseSalida(){
  var  filter, tr, td, i, txtValue;
  filter = PaseDeSalida.innerHTML.toUpperCase();
  tr = table.getElementsByTagName("tr");

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

function hoyHistorial(){
  filter = fecha.innerText;
  console.log(filter);
  tr = table.getElementsByTagName("tr");
  numResultadosHistorial = 0;


  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue == filter) {
        tr[i].style.display = "";
        numResultadosHistorial++;
      } else {
        tr[i].style.display = "none";
      }
    }
  }
  resultadosHistorial.innerText = numResultadosHistorial;
}

function BuscarAlumnosHistorial(){
  filter = inputHistorial.value.toUpperCase();
  tr = table.getElementsByTagName("tr");
  numResultadosHistorial = 0;


  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
        numResultadosHistorial++;
      } else {
        tr[i].style.display = "none";
      }
    }
  }
  resultadosHistorial.innerText = numResultadosHistorial;
}


function BuscarFecha() {
  var tr, td, i, txtValue;
  const inputFecha = document.querySelector('#busquedaFecha').value;
  console.log(inputFecha);
  tr = table.getElementsByTagName("tr");
  var numResultadosHistorial = 0;

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      console.log(txtValue);
      if (txtValue == inputFecha) {
        console.log(txtValue);
        tr[i].style.display = "";
        numResultadosHistorial++;
      } else {
        tr[i].style.display = "none";
      }
    }
  }
  resultadosHistorial.innerText = numResultadosHistorial;
}