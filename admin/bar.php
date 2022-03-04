

<?php
         $sql ="SELECT food, COUNT(*) as `count` FROM tbl_order GROUP BY food ORDER BY COUNT DESC;";
         
      
         $result = mysqli_query($conn,$sql);
         $chart_data="";
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $productname[]  = $row['food']  ;
            $sales[] = $row['count'];
        }
 
  
 
 
 
?>

<div style="margin-left: 22%; margin-top:70px;">
     <div style="width:70%;hieght:40%;text-align:center">
            <h2 class="page-header text-success"> Order Analytics Reports </h2>
            <div>FOODS </div>
            <canvas  id="chartjs_bar"></canvas> 
        </div>    

  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($productname); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($sales); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>
     </div>
