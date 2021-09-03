var ctx = document.getElementById('barras').getContext('2d');
var ctx2 = document.getElementById('dona-ventas').getContext('2d');
var ctx3 = document.getElementById('minis').getContext('2d');
var ctx4 = document.getElementById('grandes').getContext('2d');

function generarGraficas(pedidos){
    var datos = [];
    datos.push(parseInt(pedidos));
        var datos2 =  {
        type: 'bar',
        data: {
            labels: ['Pedidos'],
            datasets: [{
                label: 'Total de pedidos',
                data: datos,
                backgroundColor: [
                    'orange'
                ],
                borderColor: [
                    'orange'
                ],
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
    };
    var myChart = new Chart(ctx,datos2);
    myChart.data.datasets.data=datos;
    myChart.update();
}
function generarGraficasVentas(ventas){
    var datos = [];
    datos.push(parseInt(ventas));
        var datos2 =  {
        type: 'pie',
        data: {
            labels: ['Ventas en MXN'],
            datasets: [{
                label: 'Total de ventas',
                data: datos,
                backgroundColor: [
                    'Purple'
                ],
                borderColor: [
                    'Purple'
                ],
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
    };
    var myChart = new Chart(ctx2,datos2);
    myChart.data.datasets.data=datos;
    myChart.update();
}
function generarGraficasMinis(ventas){
    var datos = [];
    datos.push(parseInt(ventas));
        var datos2 =  {
        type: 'bar',
        data: {
            labels: ['Pizzas Minis'],
            datasets: [{
                label: 'Pizzas Mini Vendidas',
                data: datos,
                backgroundColor: [
                    'Blue'
                ],
                borderColor: [
                    'Blue'
                ],
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
    };
    var myChart = new Chart(ctx3,datos2);
    myChart.data.datasets.data=datos;
    myChart.update();
}
function generarGraficasGrandes(ventas){
    var datos = [];
    datos.push(parseInt(ventas));
        var datos2 =  {
        type: 'doughnut',
        data: {
            labels: ['Pizzas Grandes'],
            datasets: [{
                label: 'Total de ventas',
                data: datos,
                backgroundColor: [
                    'Gray'
                ],
                borderColor: [
                    'Gray'
                ],
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
    };
    var myChart = new Chart(ctx4,datos2);
    myChart.data.datasets.data=datos;
    myChart.update();
}