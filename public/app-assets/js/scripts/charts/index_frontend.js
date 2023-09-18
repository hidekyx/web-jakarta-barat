var $primary = '#5A8DEE',
    $success = '#39DA8A',
    $danger = '#FF5B5C',
    $warning = '#FDAC41',
    $info = '#00CFDD',
    $label_color = '#475F7B',
    $grid_line_color = '#dae1e7',
    $scatter_grid_color = '#f3f3f3',
    $scatter_point_light = '#E6EAEE',
    $scatter_point_dark = '#5A8DEE',
    $white = '#fff',
    $black = '#000';

var themeColors = ["#5A8DEE", "#FDAC41", "#FF5B5C", "#39DA8A", "#00CFDD", "$#475F7B", "#ed1ce6", "#d9620d", "#E6EAEE", "#5A8DEE"];

var lineWithArea_death = [['#reduction_in_death_trend_brunei',[2016,2017,2018,2019,2020],[0,0,0,0,0]],['#reduction_in_death_trend_cambodia',[2016,2017,2018,2019,2020],[0,0,0,50,38]],['#reduction_in_death_trend_indonesia',[2016,2017,2018,2019,2020],[366,206,5968,596,220]],['#reduction_in_death_trend_lao',[2016,2017,2018,2019,2020],[5,0,136,16,2]],['#reduction_in_death_trend_malaysia',[2016,2017,2018,2019,2020],[46,84,2,2,0]],['#reduction_in_death_trend_myanmar',[2016,2017,2018,2019,2020],[237,220,67,182,174]],['#reduction_in_death_trend_philippine',[2016,2017,2018,2019,2020],[89,331,842,1037,216]],['#reduction_in_death_trend_singapore',[2016,2017,2018,2019,2020],[0,10,0,0,0]],['#reduction_in_death_trend_thailand',[2016,2017,2018,2019,2020],[128,150,93,26,62]],['#reduction_in_death_trend_vietnam',[2016,2017,2018,2019,2020],[202,284,147,59,323]]];
  var lineWithArea_affected = [['#reduction_in_affected_trend_brunei',[2016,2017,2018,2019,2020],[0,0,0,0,0]],['#reduction_in_affected_trend_cambodia',[2016,2017,2018,2019,2020],[2500000,0,5817,435024,759360]],['#reduction_in_affected_trend_indonesia',[2016,2017,2018,2019,2020],[481806,535099,1134998,1200888,909990]],['#reduction_in_affected_trend_lao',[2016,2017,2018,2019,2020],[26328,0,748245,309176,70764]],['#reduction_in_affected_trend_malaysia',[2016,2017,2018,2019,2020],[31875,22409,16900,24832,21883]],['#reduction_in_affected_trend_myanmar',[2016,2017,2018,2019,2020],[953504,199550,173095,8075,26554]],['#reduction_in_affected_trend_philippine',[2016,2017,2018,2019,2020],[5543812,4881786,11372314,6928491,10547085]],['#reduction_in_affected_trend_singapore',[2016,2017,2018,2019,2020],[13051,48,0,0,0]],['#reduction_in_affected_trend_thailand',[2016,2017,2018,2019,2020],[808936,3819058,13,878885,1196124]],['#reduction_in_affected_trend_vietnam',[2016,2017,2018,2019,2020],[2503129,5133216,283766,832732,2198070]]];
  var lineWithArea_economic = [['#economic_losess_trend_brunei',[2016,2017,2018,2019,2020],[0,0,0,0,0]],['#economic_losess_trend_cambodia',[2016,2017,2018,2019,2020],[0,0,0,0,100000]],['#economic_losess_trend_indonesia',[2016,2017,2018,2019,2020],[233000,34000,2604000,1318000,29300]],['#economic_losess_trend_lao',[2016,2017,2018,2019,2020],[50,0,225000,0,0]],['#economic_losess_trend_malaysia',[2016,2017,2018,2019,2020],[132000,0,0,0,6800]],['#economic_losess_trend_myanmar',[2016,2017,2018,2019,2020],[16600,0,0,0,0]],['#economic_losess_trend_philippine',[2016,2017,2018,2019,2020],[185074,161214,595656,593571,1113474]],['#economic_losess_trend_singapore',[2016,2017,2018,2019,2020],[0,0,0,0,0]],['#economic_losess_trend_thailand',[2016,2017,2018,2019,2020],[145000,1308400,0,0,60000]],['#economic_losess_trend_vietnam',[2016,2017,2018,2019,2020],[846437,3162655,287200,49000,1451992]]];

$(window).on("load", function () {

    $(".nav-item").on("click", function (e) {
        //debugger
        //var ref_this = $("ul.tabs li a.active");

        var target = $(e.target).attr("id");
        if(target == 'home-tab-center'){
            for (var i = 0; i < lineWithArea_death.length ; i++) {
                // lineWithArea(lineWithArea_death[i][0],lineWithArea_death[i][1],lineWithArea_death[i][2]);
                lineSingle(lineWithArea_death[i][0],lineWithArea_death[i][1],lineWithArea_death[i][2] ,"Death (people)" ,"", false);
            }

         
        }
        else if(target == 'economic-tab-center'){
            for (var i = 0; i < lineWithArea_economic.length ; i++) {
                  // lineWithArea(lineWithArea_economic[i][0],lineWithArea_economic[i][1],lineWithArea_economic[i][2]);
                  lineSingle(lineWithArea_economic[i][0],lineWithArea_economic[i][1],lineWithArea_economic[i][2],"$ USD (thousand)" ,"", false);
              }
        }
        else if(target == 'service-tab-center'){
            for (var i = 0; i < lineWithArea_affected.length ; i++) {
              // lineWithArea(lineWithArea_affected[i][0],lineWithArea_affected[i][1],lineWithArea_affected[i][2]);
              lineSingle(lineWithArea_affected[i][0],lineWithArea_affected[i][1],lineWithArea_affected[i][2],"Affected (people)" ,"", false);
            }
        }
        else if(target == 'account-tab-center'){

        }

   });

  var data = {
    labels: ["Brunei Darussalam", "Cambodia", "Indonesia", "Lao PDR", "Malaysia", "Myanmar", "Philippines", "Singapore", "Thailand", "Viet Nam"],
    datasets: [{
      label: "Population (millions)",
      backgroundColor: themeColors,
      data: [0,0.088,7.356,0,0.134,0.88,0,0.01,0.459,1.015]
    }],
  };
  
  // doughnut("#reduction_in_death_pecentage", data, 'Reduction in Death (%)')
  var data = ['#reduction_in_death_pecentage',[2016,2017,2018,2019,2020],[107.3,128.5,725.5,196.8,103.5]];
  lineSingle(data[0],data[1],data[2],"number of death" ,"% Reduction in Death", true);

  var data = {
    labels: ["Brunei Darussalam", "Cambodia", "Indonesia", "Lao PDR", "Malaysia", "Myanmar", "Philippines", "Singapore", "Thailand", "Viet Nam"],
    datasets: [{
      label: "Population (millions)",
      backgroundColor: themeColors,
      data: [0,3700.201,4262.781,0,117.899,1360.778,0,13.099,6703.016,10950.913]
    }],
  };
  
  // doughnut("#number_of_people_affected", data, 'Number of People Affected')
  var data = ['#number_of_people_affected',[2016,2017,2018,2019,2020],[1286244.1,1459116.6,1373514.8,1061810.3,1572983]];
  lineSingle(data[0],data[1],data[2],"number of Affected People" ,"Reduction in Affected", true);

  var data = {
    labels: ["Brunei Darussalam", "Cambodia", "Indonesia", "Lao PDR", "Malaysia", "Myanmar", "Philippines", "Singapore", "Thailand", "Viet Nam"],
    datasets: [{
      label: "Population (millions)",
      backgroundColor: themeColors,
      data: [0,0,368,85,0,3,694,3,214,8485]
    }],
  };
  
  // doughnut("#reduction_damage_on_infra", data, 'Reduction of Damage on Infra and Basic Service (%)')
  var data = ['#reduction_damage_on_infra',[2016,2017,2018,2019,2020],[20,21,19,9,8]];
  lineSingle(data[0],data[1],data[2],"Average of Damage Infrastructure" ,"Reduction of Damage on Infra and Basic Service (%)", true);

  var data = {
    labels: ["Brunei Darussalam", "Cambodia", "Indonesia", "Lao PDR", "Malaysia", "Myanmar", "Philippines", "Singapore", "Thailand", "Viet Nam"],
    datasets: [{
      label: "Population (millions)",
      backgroundColor: themeColors,
      data: [0,0.000864652711805977,0.0364736453421115,0,0.0012001379639867,0.000143532350159792,0,0,0.0130856541404717,0.050126373317094]
    }],
  };
  
  // doughnut("#reduction_on_economic_losess", data, 'Reduction of Economic Losess as % of GDP')
  var data = ['#reduction_on_economic_losess',[2016,2017,2018,2019,2020],[155816.1,466626.9,371185.6,196057.1,276156.6]];
  lineSingle(data[0],data[1],data[2],"Average of Economic Losses" ,"Reduction in Losses (%) of GDP", true);

  var data = {
    labels: [2016,2017,2018,2019,2020],
    datasets: [
        {label : 'Brunei Darussalam', data :[0,0,0,0,0],borderColor: themeColors[0], fill: false },
        {label : 'Cambodia', data :[0,0,0,0,0], borderColor: themeColors[1],fill: false },
        {label : 'Indonesia', data :[0,52,49,0,261], borderColor: themeColors[2],fill: false },
        {label : 'Lao PDR', data :[0,0,14,14,57], borderColor: themeColors[3],fill: false },
        {label : 'Malaysia', data :[0,0,0,0,0], borderColor: themeColors[4],fill: false },
        {label : 'Myanmar', data :[0,0,3,0,0],borderColor: themeColors[5], fill: false },
        {label : 'Philippines', data :[0,4,28,46,616],borderColor: themeColors[6], fill: false },
        {label : 'Singapore', data :[0,0,3,0,0], borderColor: themeColors[7],fill: false },
        {label : 'Thailand', data :[0,144,0,0,70], borderColor: themeColors[8],fill: false },
        {label : 'Viet Nam', data :[0,0,8444,0,15], borderColor: themeColors[9],fill: false }
    ]
  };

  lineMultiple("#reduction_damage_on_infra_trend", data, "Trend of Damage of Infrastructure Number in Last 5 Years");


  for (var i = 0; i < lineWithArea_death.length ; i++) {
    // lineWithArea(lineWithArea_death[i][0],lineWithArea_death[i][1],lineWithArea_death[i][2]);
    lineSingle(lineWithArea_death[i][0],lineWithArea_death[i][1],lineWithArea_death[i][2] ,"death (people)" ,"", false);
  }
    

})

function doughnut(id, data, text){
    // Create the chart

  var doughnutChartctx = $(id);

  // Chart Options
  var doughnutchartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    responsiveAnimationDuration: 500,
    title: {
      display: true,
      text: text
    },
    legend:{
        display:false
    }
  };

  // Chart Data
  var doughnutchartData = data;

  var doughnutChartconfig = {
    type: 'doughnut',

    // Chart Options
    options: doughnutchartOptions,

    data: doughnutchartData
  };

  // Create the chart
  var doughnutSimpleChart = new Chart(doughnutChartctx, doughnutChartconfig);
}


function lineMultiple(id, data, text){

  var lineChartctx = $(id);

  // Chart Options
  var linechartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
      position: 'top',
    },
    hover: {
      mode: 'label'
    },
    scales: {
      xAxes: [{
        display: true,
        gridLines: {
          color: $grid_line_color,
        },
        scaleLabel: {
          display: true,
        }
      }],
      yAxes: [{
        display: true,
        gridLines: {
          color: $grid_line_color,
        },
        scaleLabel: {
          display: true,
        }
      }]
    },
    title: {
      display: true,
      text: text
    }
  };

  // Chart Data
  var linechartData = data;

  var lineChartconfig = {
    type: 'line',

    // Chart Options
    options: linechartOptions,
    data: linechartData
  };
  // Create the chart
  var lineChart = new Chart(lineChartctx, lineChartconfig);
}


function lineSingle(id, _labels ,dataset_data, dataset_label , text, display_title){
  var footer = (tooltipItems) => {
    var sum = 0;

    tooltipItems.forEach(function(tooltipItem) {
      sum += tooltipItem.parsed.y;
    });
    return 'Sum: ' + sum;
  };

  var lineChartctx = $(id);

  // Chart Options
  var linechartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
      position: 'bottom',
    },
    hover: {
      mode: 'label'
    },
    scales: {
      xAxes: [{
        display: true,
        gridLines: {
          color: $grid_line_color,
        },
        scaleLabel: {
          display: true,
        }
      }],
      yAxes: [{
        display: true,
        gridLines: {
          color: $grid_line_color,
        },
        scaleLabel: {
          display: true,
        }
      }]
    },
    title: {
      display: display_title,
      text: text
    },
    tooltips: {
            // Disable the on-canvas tooltip
            enabled: false,

            custom: function(tooltipModel) {
                // Tooltip Element
                var tooltipEl = document.getElementById('chartjs-tooltip');

                // Create element on first render
                if (!tooltipEl) {
                    tooltipEl = document.createElement('div');
                    tooltipEl.id = 'chartjs-tooltip';
                    tooltipEl.innerHTML = '<table style="background-color:white"></table>';
                    document.body.appendChild(tooltipEl);
                }

                // Hide if no tooltip
                if (tooltipModel.opacity === 0) {
                    tooltipEl.style.opacity = 0;
                    return;
                }

                // Set caret Position
                tooltipEl.classList.remove('above', 'below', 'no-transform');
                if (tooltipModel.yAlign) {
                    tooltipEl.classList.add(tooltipModel.yAlign);
                } else {
                    tooltipEl.classList.add('no-transform');
                }

                function getBody(bodyItem) {
                    // console.log(bodyItem);
                    return bodyItem.lines;
                }

                function getDataLine(dataLine){
                  return dataLine.index;
                }

                // Set Text
                if (tooltipModel.body) {
                    var titleLines = tooltipModel.title || [];
                    var bodyLines = tooltipModel.body.map(getBody);
                    var dataLine_index = tooltipModel.dataPoints.map(getDataLine)[0];
                    if (dataLine_index > 0){
                      var dataLine_now =  dataset_data[dataLine_index];
                      var dataLine_before = dataset_data[dataLine_index-1];
                      if (dataLine_now > 0 ){
                        var trendUpdDown = ((dataLine_now - dataLine_before) / dataLine_before) * 100;
                        var txtTrendUpdDown = trendUpdDown.toFixed(2);
                      }else{
                        var txtTrendUpdDown = '-' ;
                      }
                      

                    } else{
                      var txtTrendUpdDown = '-';
                    }

                    var innerHtml = '<thead>';

                    titleLines.forEach(function(title) {
                        innerHtml += '<tr><th>' + title + '</th></tr>';
                    });
                    innerHtml += '</thead><tbody>';

                    bodyLines.forEach(function(body, i) {
                        var colors = tooltipModel.labelColors[i];
                        var style = 'background:' + colors.backgroundColor;
                        style += '; border-color:' + colors.borderColor;
                        style += '; border-width: 2px';
                        var span = '<span style="' + style + '"></span>';
                        innerHtml += '<tr><td>' + span + body + '</td></tr>';
                        innerHtml += '<tr><td>Trend : '+txtTrendUpdDown+'%</td></tr>';
                    });
                    innerHtml += '</tbody>';

                    var tableRoot = tooltipEl.querySelector('table');
                    tableRoot.innerHTML = innerHtml;
                }

                // `this` will be the overall tooltip
                var position = this._chart.canvas.getBoundingClientRect();

                // Display, position, and set styles for font
                tooltipEl.style.opacity = 1;
                tooltipEl.style.position = 'absolute';
                tooltipEl.style.left = position.left + window.pageXOffset + tooltipModel.caretX + 'px';
                tooltipEl.style.top = position.top + window.pageYOffset + tooltipModel.caretY + 'px';
                tooltipEl.style.fontFamily = tooltipModel._bodyFontFamily;
                tooltipEl.style.fontSize = tooltipModel.bodyFontSize + 'px';
                tooltipEl.style.fontStyle = tooltipModel._bodyFontStyle;
                tooltipEl.style.padding = tooltipModel.yPadding + 'px ' + tooltipModel.xPadding + 'px';
                tooltipEl.style.pointerEvents = 'none';
            }
          }

  };

  var customTooltips = function (tooltip) {
      // Tooltip Element
      var tooltipEl = document.getElementById('chartjs-tooltip');

      // Hide if no tooltip
      if (tooltip.opacity === 0) {
          tooltipEl.style.opacity = 0;
          return;
      }

      // Set caret Position
      tooltipEl.classList.remove('above', 'below', 'no-transform');
      if (tooltip.yAlign) {
          tooltipEl.classList.add(tooltip.yAlign);
      } else {
          tooltipEl.classList.add('no-transform');
      }
      
      if (tooltip.dataPoints.length) {
          var ind = tooltip.dataPoints[0].index;
          $("#spn-leads").text(data.data[ind]);
          $("#spn-meetings").text(data.meetings[ind]);
          $("#spn-mails").text(data.mails[ind]);
          $("#spn-rate").text(data.rate[ind]);
      }

       // `this` will be the overall tooltip
      var position = this._chart.canvas.getBoundingClientRect();

      // Display, position, and set styles for font
      tooltipEl.style.opacity = 1;
      tooltipEl.style.position = 'absolute';
      tooltipEl.style.left = position.left + window.pageXOffset + tooltipModel.caretX + 'px';
      tooltipEl.style.top = position.top + window.pageYOffset + tooltipModel.caretY + 'px';
      tooltipEl.style.fontFamily = tooltipModel._bodyFontFamily;
      tooltipEl.style.fontSize = tooltipModel.bodyFontSize + 'px';
      tooltipEl.style.fontStyle = tooltipModel._bodyFontStyle;
      tooltipEl.style.padding = tooltipModel.yPadding + 'px ' + tooltipModel.xPadding + 'px';
      tooltipEl.style.pointerEvents = 'none';
  };

  // Chart Data
  var linechartData = {
    labels : _labels,
    datasets : [
      {label : dataset_label, data :dataset_data, borderColor: themeColors[0], fill: true }
    ]
  };

  var lineChartconfig = {
   type: 'line',
    // Chart Options
    options: linechartOptions,
    data: linechartData,
    plugins: {
      trendlineLinear: {
        style: "rgba(255,105,180, .8)",
        lineStyle: "dotted|solid",
        width: 2
      },
    }
  };
  // Create the chart
  var lineChart = new Chart(lineChartctx, lineChartconfig);
}

function lineWithArea(id, _label, _series){
    // console.log(id,_label,_series)
    new Chartist.Line(id, {
        labels: _label,
        series: [
          _series
        ]
      }, {
          low: 0,
          showArea: true
    });

    return 1;
}


function mixedChart(){
  var mixedChartOptions = {
    chart: {
      height: 350,
      type: 'line',
      stacked: false,
    },
    colors: themeColors,
    stroke: {
      width: [0, 2, 5],
      curve: 'smooth'
    },
    plotOptions: {
      bar: {
        columnWidth: '50%'
      }
    },
    series: [{
      name: 'TEAM A',
      type: 'column',
      data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30]
    }, {
      name: 'TEAM B',
      type: 'area',
      data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43]
    }, {
      name: 'TEAM C',
      type: 'line',
      data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39]
    }],
    fill: {
      opacity: [0.85, 0.25, 1],
      gradient: {
        inverseColors: false,
        shade: 'light',
        type: "vertical",
        opacityFrom: 0.85,
        opacityTo: 0.55,
        stops: [0, 100, 100, 100]
      }
    },
    labels: ['01/01/2003', '02/01/2003', '03/01/2003', '04/01/2003', '05/01/2003', '06/01/2003', '07/01/2003', '08/01/2003', '09/01/2003', '10/01/2003', '11/01/2003'],
    markers: {
      size: 0
    },
    legend: {
      offsetY: 8
    },
    xaxis: {
      type: 'datetime'
    },
    yaxis: {
      min: 0,
      tickAmount: 5,
      title: {
        text: 'Points'
      }
    },
    tooltip: {
      shared: true,
      intersect: false,
      y: {
        formatter: function (y) {
          if (typeof y !== "undefined") {
            return y.toFixed(0) + " views";
          }
          return y;

        }
      }
    }
  }
  var mixedChart = new ApexCharts(
    document.querySelector("#mixed-chart"),
    mixedChartOptions
  );
  mixedChart.render();
}