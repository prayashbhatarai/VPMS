window.Apex = {
    chart: {
      foreColor: '#ccc',
      toolbar: {
        show: true
      },
    },
    stroke: {
      width: 3
    },
    dataLabels: {
      enabled: false
    },
    tooltip: {
      theme: 'light'
    },
    grid: {
      borderColor: "#535A6C",
      xaxis: {
        lines: {
          show: true
        }
      }
    }
  };
  
//   var spark1 = {
//     chart: {
//       id: 'spark1',
//       group: 'sparks',
//       type: 'line',
//       height: 80,
//       sparkline: {
//         enabled: true
//       },
//       dropShadow: {
//         enabled: true,
//         top: 1,
//         left: 1,
//         blur: 2,
//         opacity: 0.2,
//       }
//     },
//     series: [{
//       data: [25, 66, 41, 59, 25, 44, 12, 36, 9, 21]
//     }],
//     stroke: {
//       curve: 'smooth'
//     },
//     markers: {
//       size: 0
//     },
//     grid: {
//       padding: {
//         top: 20,
//         bottom: 10,
//         left: 110
//       }
//     },
//     colors: ['#fff'],
//     tooltip: {
//       x: {
//         show: false
//       },
//       y: {
//         title: {
//           formatter: function formatter(val) {
//             return '';
//           }
//         }
//       }
//     }
//   }
  
//   var spark2 = {
//     chart: {
//       id: 'spark2',
//       group: 'sparks',
//       type: 'line',
//       height: 80,
//       sparkline: {
//         enabled: true
//       },
//       dropShadow: {
//         enabled: true,
//         top: 1,
//         left: 1,
//         blur: 2,
//         opacity: 0.2,
//       }
//     },
//     series: [{
//       data: [12, 14, 2, 47, 32, 44, 14, 55, 41, 69]
//     }],
//     stroke: {
//       curve: 'smooth'
//     },
//     grid: {
//       padding: {
//         top: 20,
//         bottom: 10,
//         left: 110
//       }
//     },
//     markers: {
//       size: 0
//     },
//     colors: ['#fff'],
//     tooltip: {
//       x: {
//         show: false
//       },
//       y: {
//         title: {
//           formatter: function formatter(val) {
//             return '';
//           }
//         }
//       }
//     }
//   }
  
//   var spark3 = {
//     chart: {
//       id: 'spark3',
//       group: 'sparks',
//       type: 'line',
//       height: 80,
//       sparkline: {
//         enabled: true
//       },
//       dropShadow: {
//         enabled: true,
//         top: 1,
//         left: 1,
//         blur: 2,
//         opacity: 0.2,
//       }
//     },
//     series: [{
//       data: [47, 45, 74, 32, 56, 31, 44, 33, 45, 19]
//     }],
//     stroke: {
//       curve: 'smooth'
//     },
//     markers: {
//       size: 0
//     },
//     grid: {
//       padding: {
//         top: 20,
//         bottom: 10,
//         left: 110
//       }
//     },
//     colors: ['#fff'],
//     xaxis: {
//       crosshairs: {
//         width: 1
//       },
//     },
//     tooltip: {
//       x: {
//         show: false
//       },
//       y: {
//         title: {
//           formatter: function formatter(val) {
//             return '';
//           }
//         }
//       }
//     }
//   }
  
//   var spark4 = {
//     chart: {
//       id: 'spark4',
//       group: 'sparks',
//       type: 'line',
//       height: 80,
//       sparkline: {
//         enabled: true
//       },
//       dropShadow: {
//         enabled: true,
//         top: 1,
//         left: 1,
//         blur: 2,
//         opacity: 0.2,
//       }
//     },
//     series: [{
//       data: [15, 75, 47, 65, 14, 32, 19, 54, 44, 61]
//     }],
//     stroke: {
//       curve: 'smooth'
//     },
//     markers: {
//       size: 0
//     },
//     grid: {
//       padding: {
//         top: 20,
//         bottom: 10,
//         left: 110
//       }
//     },
//     colors: ['#fff'],
//     xaxis: {
//       crosshairs: {
//         width: 1
//       },
//     },
//     tooltip: {
//       x: {
//         show: false
//       },
//       y: {
//         title: {
//           formatter: function formatter(val) {
//             return '';
//           }
//         }
//       }
//     }
//   }
  
//   new ApexCharts(document.querySelector("#spark1"), spark1).render();
//   new ApexCharts(document.querySelector("#spark2"), spark2).render();
//   new ApexCharts(document.querySelector("#spark3"), spark3).render();
//   new ApexCharts(document.querySelector("#spark4"), spark4).render();
  
  
  var optionsBar = {
    chart: {
      height: 380,
      type: 'bar',
      stacked: true,
    },
    plotOptions: {
      bar: {
        columnWidth: '30%',
        horizontal: false,
      },
    },
    series: [{
      name: 'PRODUCT A',
      data: [14, 25, 21, 17, 12, 13, 11, 19]
    }, {
      name: 'PRODUCT B',
      data: [13, 23, 20, 8, 13, 27, 33, 12]
    }, {
      name: 'PRODUCT C',
      data: [11, 17, 15, 15, 21, 14, 15, 13]
    }],
    xaxis: {
      categories: ['2011 Q1', '2011 Q2', '2011 Q3', '2011 Q4', '2012 Q1', '2012 Q2', '2012 Q3', '2012 Q4'],
    },
    fill: {
      opacity: 1
    },
  
  }
  
  var chartBar = new ApexCharts(
    document.querySelector("#barchart"),
    optionsBar
  );
  
  chartBar.render();
  
  var optionsArea = {
    chart: {
      height: 380,
      type: 'area',
      stacked: false,
    },
    stroke: {
      curve: 'straight'
    },
    series: [{
        name: "Music",
        data: [11, 15, 26, 20, 33, 27]
      },
      {
        name: "Photos",
        data: [32, 33, 21, 42, 19, 32]
      },
      {
        name: "Files",
        data: [20, 39, 52, 11, 29, 43]
      }
    ],
    xaxis: {
      categories: ['2011 Q1', '2011 Q2', '2011 Q3', '2011 Q4', '2012 Q1', '2012 Q2'],
    },
    tooltip: {
      followCursor: true
    },
    fill: {
      opacity: 1,
    },
  
  }
  
  var chartArea = new ApexCharts(
    document.querySelector("#areachart"),
    optionsArea
  );
  
  chartArea.render();

  var options = {
    chart: {
        type: 'line'
    },
    series: [{
        name: 'sales',
        data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
    }],
    xaxis: {
        categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999]
    }
}

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();

var options = {
    chart: {
        type: 'donut'
      },
    series: [44, 55, 13, 33],
    labels: ['Apple', 'Mango', 'Orange', 'Watermelon']
  }

var chart1 = new ApexCharts(document.querySelector("#chart1"), options);

chart1.render();