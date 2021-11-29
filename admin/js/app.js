const ctx1 = document.getElementById('mylinechart1').getContext('2d');
const ctx2 = document.getElementById('mylinechart2').getContext('2d');
const ctx3 = document.getElementById('mylinechart3').getContext('2d');
const ctx4 = document.getElementById('mylinechart4').getContext('2d');
const label1 = dateFormat();

// const label2 = monthFormat();


 let dailySaledata = [];

$(document).ready(function(){
  
   $.ajax({

    type : "GET",
    url : "../controller/chartController.php",
    success :  function(res){
        console.log(res);
      
          let serverData = JSON.parse(res);
          
          console.log(serverData);
          for (let i = 0; i < 7; i++) {
            var price;
            var found = false;
            for (const iterator of serverData) {
                var today = new Date();
                var day = new Date(today.getFullYear(), today.getMonth(), today.getDate() - i);
        
                if (Date.parse(iterator.buy_date) == day.getTime()) {
                    price = iterator.total_price;
                    found = true;
                }
            }
        
            if (found) {
                dailySaledata.push(Number(price));
            } else {
                dailySaledata.push(0);
            }
        }

      console.log(dailySaledata);
        const data1 = {
        labels: label1,
        datasets: [{
        label: 'Daily Sales',
        data:dailySaledata,
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
       }]
};


        const config = {
        type: 'line',         
        data: data1,
        };
        const myChart1 = new Chart(ctx1,config);
      
    },
    error : function(err){
          console.log(err);
    }

   });

   
});






dateFormat();
function dateFormat(){
  let days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
  var today = new Date();
    var lastweek = new Date(today.getFullYear(), today.getMonth(), today.getDate()-7);
    console.log(lastweek);
  let array = [];

   for(let i = lastweek.getDay() ; i < days.length ; i++ ){
          array.push(days[i]);
   }
   for(let y = 0; y < lastweek.getDay(); y++){
        array.push(days[y]);
   }

   return array;   

  

}

// monthFormat();
// function monthFormat(){
//    let months = ['Jan','Feb','March', 'Apirl','May','June','July',"Aug",'Sep','Oct','Nov','Dec'];
//    var thisMonth = new Date();
//      var lastMonth = new Date(thisMonth.getFullYear(),thisMonth.getMonth()- 12);
//      console.log(lastMonth);
//      let array2 = [];

//      for(let i = lastMonth.getMonth() ; i < months.length ; i++ ){
//             array2.push(months[i]);
//      }
//      for(let y = 0; y < lastMonth.getMonth(); y++){
//           array2.push(months[y]);
//      }
//      console.log(array2);
//      return array2;   

    
  
    
// }

  let label2 = [];

  label2.push('Total Costs',"Total Revenue");
  
  const data2 = {
      labels : label2,
      datasets : [
      {
        label : "Total Costs",
       
        data : [costs,sales],
        fill : true,
        borderColor : ['rgb(13, 33, 73)',
        'rgb(32, 138, 174)'],
        backgroundColor : 
        ['rgb(13, 33, 73)','rgb(32, 138, 174)'],
        tension : 0.5,
        barPercentage: 0.5,
        barThickness: 110,
        maxBarThickness: 120,
        minBarLength: 2,
      },{
        label : "Total Revenue",
        backgroundColor : "rgb(32, 138, 174)",
        borderColor :'rgb(32, 138, 174)'
      }]
      
};
  
const legendMargin = {
  id : 'legendMargin',
  beforeInit(chart,legend,fit){

  const fitValue = chart.legend.fit;
  chart.legend.fit = function fit(){
    fitValue.bind(chart.legend)();
    return this.height += 20;
  }
}
}
console.log(sales);
console.log(costs);

  const config2 = {
    type: 'bar',
    data: data2,
    options: {
      layout: {
          margin :{
            top : 10
          }
      }
  },
  plugins : [legendMargin]

  };


// number of unit sold chart

let quanityData = [];

  $.ajax({

    type : "GET",
    url : "../controller/unitsoldChartController.php",
   
    success :  function(res){
        // console.log(res);
      
          let serverData = JSON.parse(res);
          
          console.log(serverData);
          
          let  label3 = [];
          
          for (const iterator of serverData["array1"]) {


              label3.push(iterator.name);
            var quantity = iterator.quantity || 0;

            quanityData.push(Number(quantity));
            
          }

          console.log(label3);

    

          const data3 = {
            labels : label3,
            datasets : [{
                label : 'Unit Sold Qunatity',
                data : quanityData,
                fill : false,
                backgroundColor : [
                    'rgba(105, 20, 14,0.5)',
                    'rgba(213, 137, 54,0.5)',
                    'rgba(199, 239, 0,0.5)',
                    'rgba(36, 22, 35,0.5)',
                    'rgba(245, 204, 232,0.5)',
                    'rgba(112, 103, 207,0.5)',
                    'rgba(161, 74, 118,0.5)',
                    'rgba(85, 214, 190,0.5)',
                    'rgba(200, 62, 77,0.5)',
                    'rgba(2, 8, 135,0.5)',
                    'rgba(30, 16, 20,0.5)',
                    'rgba(232, 106, 146,0.5)'
                ],
                borderColor : [
                    'rgba(105, 20, 14)',
                    'rgba(213, 137, 54)',
                    'rgba(199, 239, 0)',
                    'rgba(36, 22, 35)',
                    'rgba(245, 204, 232)',
                    'rgba(112, 103, 207)',
                    'rgba(161, 74, 118)',
                    'rgba(85, 214, 190)',
                    'rgba(200, 62, 77)',
                    'rgba(2, 8, 135)',
                    'rgba(30, 16, 20)',
                    'rgba(232, 106, 146)'
                ],
                tension : 1,
               
           
            }],
            options : {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true,
                          userCallback: function(label, index, labels) {
                              // when the floored value is the same as the value we have a whole number
                              if (Math.floor(label) === label) {
                                  return label;
                              }
         
                          },
                      }
                  }],
              },
          }
            }
          
        
          

          const config3 = {
            type: 'bar',
            data: data3,
          };
          
          const myChart3 = new Chart(ctx3,config3);



          // donut chart for most sale item

     
          let label4 = [];
          let mostSaleItem = [];
          for (const iterator of serverData["array2"]) {
              label4.push(iterator.name);  
              
                mostSaleItem.push(iterator.quantity);

          }

          





          const data4 = {
            labels:label4,
            datasets: [{
              // label: 'My First Dataset',
              data: mostSaleItem,
              backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgba(42, 187, 155, 1)'
              ],
              hoverOffset: 4
            }]
          };
        
        
          
        
          const config4 = {
              type : 'pie',
              data : data4
          }
          
          const myChart4 = new Chart(ctx4,config4);
          
        },
        error : function(err){
          console.log(err);
       }
        
        });


 


     


      
  const myChart2 = new Chart(ctx2,config2);
  
  







