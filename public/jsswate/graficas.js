const ctx = document.getElementById('myChart');
const ctx2 = document.getElementById('myChartDos');
const numJustificante = document.getElementById('numJustificante').innerHTML;
const numPaseSalida = document.getElementById('numPaseSalida').innerHTML;
const numJustificanteMes = document.getElementById('numJustificanteMes').innerHTML;
const numPaseSalidaMes = document.getElementById('numPaseSalidaMes').innerHTML;

//Grafica todo el tiempo
new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ['Justificantes', 'Pases de salida'],
    datasets: [{
      label: '# of Votes',
      data: [numJustificante, numPaseSalida],
      borderWidth: 1,
      borderColor: ['#0DBAE8', '#DC3545'],
      backgroundColor: ['#0DBAE8', '#DC3545'],
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
  type: 'pie',
  data: {
    labels: ['Justificantes', 'Pases de salida'],
    datasets: [{
      label: '# of Votes',
      data: [numJustificanteMes, numPaseSalidaMes],
      borderWidth: 1,
      borderColor: ['#0DBAE8', '#DC3545'],
      backgroundColor: ['#0DBAE8', '#DC3545'],
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