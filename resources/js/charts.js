import Chart from 'chart.js/auto';

export function chartHome(labels, data){
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.querySelector('#ventasPorMes');
        if (!ctx) {
            console.error('Elemento con ID "ventasPorMes" no encontrado en el DOM.');
            return;
        }

        const myChart = document.getElementById('myChart');

        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
            datasets: [{
              label: 'Ventas por mes',
              data: [12, 19, 3, 5, 2, 3],
              borderWidth: 1
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
    });
}
