<?php  
        //echo "<pre>";print_r($getUser);die;
      foreach($newsCount as $key => $value){
         $dataPoints[$key]['label'] = $newsCount[$key]['pradesh'];
         $dataPoints[$key]['y'] = $newsCount[$key]['count'];
      }
         
     ?>

        <script>
           document.addEventListener('DOMContentLoaded', function () {
          var chart = new CanvasJS.Chart("chartPieContainerUser", {
            animationEnabled: true,
            title: {
              text: "Pardesh Wise Post"
            },
            subtitles: [{
              text: "Pardesh"
            }],
            data: [{
              type: "pie",
              yValueFormatString: "#,##0\" Post\"",
              indexLabel: "{label} ({y})",
              dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
          });
          chart.render();
           
          })
          </script>

          <div class="row-fluid">
            <div class="span12">
              <div class="widget-box">
                <div class="widget-content nopadding">
                  <div id="chartPieContainerUser" style="height: 300px; width: 100%;"></div>
                </div>
              </div>
            </div>
          </div>

