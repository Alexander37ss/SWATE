/* Inicializamos constante, instanciamos el buscador con el id busquedaConsultar */
const busquedaBoton = document.querySelector('#BotonBuscador');
/* Inicializamos constante, instanciamos el buscador con el id busquedaConsultar */
const busquedammm = document.querySelector('#busquedaConsultar');
/* Inicializamos variable y le otorgamos el valor de el url actual */
var url = window.location;
/* Inicializamos constante, instanciamos el boton con el id BotonFiltro */
const BotonFiltro = document.querySelector('#BotonFiltro');
/* Ya que la funcion window.location nos envia un objeto con demasiada informacion de la ruta actual lo 
unico que necesitamos es el pathname para hacer la comparacion de ruta */
url = url.pathname;
/* Funcion para cambiar de color el boton de borrar filtro cuando exista un filtro activo */
window.addEventListener('load', BorrarFiltroDinamico);
busquedaBoton.addEventListener('click', BuscarAlumnos);


function BorrarFiltroDinamico(){
    if(url !== "/SWATE/public/tramites/consultar"){
        BotonFiltro.classList.add('btn-danger');
        BotonFiltro.classList.remove('btn-secondary');
        console.log("xd");
    }
}
/* Enfocar la barra de busqueda */
function EnfocarBarraBusqueda(){
    busquedammm.focus();
}

function BuscarAlumnos() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("busquedaConsultar");
    filter = input.value.toUpperCase();
    table = document.getElementById("tabla");
    tr = table.getElementsByTagName("tr");
    if(input.value != ""){
        BotonFiltro.classList.add('btn-danger');
        BotonFiltro.classList.remove('btn-secondary');
    }else{
        BotonFiltro.classList.remove('btn-danger');
        BotonFiltro.classList.add('btn-secondary');
    }
  
    // Loop through all table rows, and hide those who don't match the search query
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
