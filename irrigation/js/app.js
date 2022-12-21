$(document).ready(function(){
    $.ajax({
      url: "http://localhost:3000/datas.php",
      method: "GET",
      success: function(data) {
        console.log(data);
        var timee = [];
        var humsol11 = [];
        var humsol22=[];
        var humsol33=[];
  
        for(var i in data) {
          timee.push(data[i].timestamp);
          humsol11.push( data[i].humsol1);
           humsol22.push( data[i].humsol2);
         humsol33.push( data[i].humsol3); 
        }
       
  
        var chartdata = {
          labels: timee,
          datasets : [
            {
                label: 'Humidité du sol au niveau 1 ',
              
                
            borderColor: 'rgba(255, 0, 0)',
            data: humsol11
            
          },
          {
            label: 'Humidité du sol au niveau 2 ',
              
            
        borderColor: 'rgba(255, 209, 0)',
        data: humsol22
            
          },
           
          {
            label: 'Humidité du sol au niveau 3 ',
              
            
        borderColor: 'rgba	(6, 223, 242)',
        data: humsol33
          }
         
        ]
      };

      var ctx = $("#mycanvas");

      var lineGraph = new Chart(ctx, {
        type: "line",
        data: chartdata,
        options: {
            plugins: {
              customCanvasBackgroundColor: {
                color: '',
              }
            }
          },
        
        
      });
    }
    ,
    error: function(data) {
      console.log(data);
    }



    
  });
}

);

