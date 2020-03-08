
var datos = recuperaEstadisticas();
console.log(datos);
var data = getDatos(datos);
console.log(data);

  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

  
    var areaChartData = {
        labels  : ['Enero ', 'Febrero', 'Marzo'],
        datasets: [
          {
            label               : 'Citas de recibo',
            backgroundColor     : 'rgba(60,141,188,0.9)',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : [0, 0, 1]
          },
          {
            label               : 'RadioFrecuencia',
            backgroundColor     : 'rgba(210, 214, 222, 1)',
            borderColor         : 'rgba(210, 214, 222, 1)',
            pointRadius         : false,
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(210,214,222,1)',
            data                : [0, 0, 2]
          },
          {
            label               : 'Sistema Logistico',
            backgroundColor     : 'rgba(0, 255, 99, 1)',
            borderColor         : 'rgba(0, 255, 99, 1)',
            pointRadius         : false,
            pointColor          : 'rgba(0, 255, 99, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(0,255,99,1)',
            data                : [0, 0, 0]
          },
          {
            label               : 'Articulado',
            backgroundColor     : 'rgba(255, 182, 0, 1)',
            borderColor         : 'rgba(255, 182, 0, 1)',
            pointRadius         : false,
            pointColor          : 'rgba(255, 182, 0, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(255,182,0,1)',
            data                : [0, 0, 1]
          }
        ]
      }
  
      
    
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Citas de recibo', 
          'RadioFrecuencia',
          'Sistema Logistico', 
          'Articulado' 
      ],
      datasets: [
        {
          data: data,
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions      
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })

    
  })


  function recuperaEstadisticas(){
      var datos = "";
    $.when(recuperaDatos()).done(function(a1){
        datos = a1;
    });

    return datos;
  }

  function recuperaDatos(){
    var datos = new FormData();
    datos.append("banderaEstadistica", 1);
    return $.ajax({
        url:"ajax/incidencias.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
		contentType: false,
        processData: false,
        async: false,
        dataType: "json",
        success: function(respuesta){
            
        }
  
        })
  }

 function getDatos(datos){
     var data = new Array();
    $.each(datos, function(i, item) {
        data.push(item.total);
      });
    return data;
  }