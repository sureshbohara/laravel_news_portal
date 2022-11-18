<?php  
        //echo "<pre>";print_r($getUser);die;
      foreach($newsType as $key => $value){
         $dataPoints[$key]['label'] = $newsType[$key]['news_type'];
         $dataPoints[$key]['y'] = $newsType[$key]['count'];
      }
         
     ?>

        <script>
           document.addEventListener('DOMContentLoaded', function () {
          var chart = new CanvasJS.Chart("chartPieContainerType", {
            animationEnabled: true,
            title: {
              text: "News Type"
            },
            subtitles: [{
              text: "Type"
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
                  <div id="chartPieContainerType" style="height: 300px; width: 100%;"></div>
                </div>
              </div>
            </div>
          </div>

