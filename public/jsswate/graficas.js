/* Declaración e inicializacion */
const ctx = document.getElementById('myChart');
const ctx2 = document.getElementById('myChartDos');
const ctx3 = document.getElementById('myChartTres');
const ctx4 = document.getElementById('myChartCuatro');
const ctx5 = document.getElementById('myChartCinco');
const numJustificante = document.getElementById('justificanteAno').innerHTML;
const numPaseSalida = document.getElementById('paseSalidaAno').innerHTML;
const numJustificanteMes = document.getElementById('justificanteMes').innerHTML;
const numPaseSalidaMes = document.getElementById('paseSalidaMes').innerHTML;
const graficaMesEvent = document.getElementById('graficaMonth');
const graficaMesEvent2 = document.getElementById('graficaMonthDos');
const graficaAnoEvent = document.getElementById('graficaYear');
const graficaAnoEvent2 = document.getElementById('graficaYearDos');
const graficaMes = document.getElementById('graficaM');
const graficaAno = document.getElementById('graficaY');
const numTotal = Number(numJustificante)+Number(numPaseSalida);
const enero = document.getElementById('enero').innerHTML;
const febrero = document.getElementById('febrero').innerHTML;
const marzo = document.getElementById('marzo').innerHTML;
const abril = document.getElementById('abril').innerHTML;
const mayo = document.getElementById('mayo').innerHTML;
const junio = document.getElementById('junio').innerHTML;
const julio = document.getElementById('julio').innerHTML;
const agosto = document.getElementById('agosto').innerHTML;
const septiembre = document.getElementById('septiembre').innerHTML;
const octubre = document.getElementById('octubre').innerHTML;
const noviembre = document.getElementById('noviembre').innerHTML;
const diciembre = document.getElementById('diciembre').innerHTML;
const motivoVacacional = document.getElementById('motivoVacacional').innerHTML;
const motivoSalud = document.getElementById('motivoSalud').innerHTML;
const motivoPerdida = document.getElementById('motivoPerdida').innerHTML;
const motivoOtro = document.getElementById('motivoOtro').innerHTML;
const grupoDos = document.getElementById('grupoDos').innerHTML;
const grupoCuatro = document.getElementById('grupoCuatro').innerHTML;
const grupoSeis = document.getElementById('grupoSeis').innerHTML;
console.log(numJustificante);
/* Eventos */
graficaMesEvent.addEventListener('click', showGraphicMonth);
graficaAnoEvent.addEventListener('click', showGraphicYear);
graficaAnoEvent2.addEventListener('click', showGraphicYear);
graficaMesEvent2.addEventListener('click', showGraphicMonth);

/* funciones/metodos */
function showGraphicMonth(){
  graficaMes.classList.remove('inactive');
  graficaAno.classList.add('inactive');
}
function showGraphicYear(){
  graficaAno.classList.remove('inactive');
  graficaMes.classList.add('inactive');
}

//Grafica todo el tiempo
new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Justificantes', 'Pases de salida'],
    datasets: [{
      label: 'Numero de tramites',
      data: [numJustificante, numPaseSalida],
      borderWidth: 1,
      borderColor: ['#ff9b00', '#a11f43'],
      backgroundColor: ['#ff9b00', '#a11f43'],
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
//Grafica este mes
new Chart(ctx2, {
  type: 'bar',
  data: {
    labels: ['Justificantes', 'Pases de salida'],
    datasets: [{
      label: 'Numero de tramites',
      data: [numJustificanteMes, numPaseSalidaMes],
      borderWidth: 1,
      borderColor: ['#ff9b00', '#a11f43'],
      backgroundColor: ['#ff9b00', '#a11f43'],
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
//Grafica a lo largo de este año
new Chart(ctx3, {
  type: 'line',
  data: {
    labels: ['enero','febrero','marzo', 'abril','mayo', 'junio','julio', 'agosto','septiembre', 'octubre','noviembre', 'diciembre'],
    datasets: [{
      label: 'tramites por mes',
      data: [enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre],
      borderWidth: 1,
      borderColor: ['#9f2241', '#9f2241','#9f2241', '#9f2241','#9f2241', '#9f2241','#9f2241', '#9f2241','#9f2241', '#9f2241','#9f2241', '#9f2241'],
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
//Grafica este mes
new Chart(ctx4, {
  type: 'pie',
  data: {
    labels: ['Motivo de salud', 'Motivo de perdida', 'Motivo vacacional', 'Motivo otro'],
    datasets: [{
      label: 'Numero de tramites',
      data: [motivoSalud, motivoPerdida, motivoVacacional, motivoOtro],
      borderWidth: 1,
      borderColor: ['#3FD81D', 'black', 'yellow', 'gray'],
      backgroundColor: ['#3FD81D', 'black', 'yellow', 'gray'],
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
new Chart(ctx5, {
  type: 'doughnut',
  data: {
    labels: ['Segundo semestre', 'Cuarto semestre', 'Sexto semestre'],
    datasets: [{
      label: 'Numero de tramites',
      data: [grupoDos, grupoCuatro, grupoSeis],
      borderWidth: 1,
      borderColor: ['#a11f43', '#F30909', '#FF9B00'],
      backgroundColor: ['#a11f43', '#F30909', '#FF9B00'],
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});