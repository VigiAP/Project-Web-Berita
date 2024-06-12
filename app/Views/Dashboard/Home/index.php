<?= $this->extend('/template/t_main'); ?>
<?= $this->section('konten'); ?>

<section class="content">
<?php if (session()->get('jenisLog') == 'admin'): ?>
    <!-- admin -->
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Statistik User per Role</h3>
                </div>
                <div class="card-body">
                    <!-- Canvas for Bar Chart -->
                    <canvas id="roleChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <?php 
    
      foreach ($CountUserByRole as $role) {
          $roleData[] = $role['total'];
      }
      $roleData = $roleData;
      $sumData = array_sum($roleData); 
      $jsonData = json_encode($roleData);
      $totalUser = json_encode($sumData);
      $totalPengunjung = json_encode(count($CountViewArticleByDate));
      $month = json_encode(getMonth($CountViewArticleByDate)); 
      $dataViewByMonth = json_encode(getCountDataByMonth($CountViewArticleByDate, 'views'));
    ?>
    <script>
      $(function () {
        var roleChartCanvas = $('#roleChart').get(0).getContext('2d');
        var jsArray = <?php echo $jsonData; ?>;
        var totalUser = <?php echo $totalUser; ?>;
  
        var roleChartData = {
          labels  : ['Admin', 'Author', 'Visitor', 'Editor'],
          datasets: [
            {
              label               : 'Total '+ totalUser + ' Users',
              backgroundColor     : [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)'
              ],
              borderColor         : [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
              ],
              borderWidth         : 1,
              data                : jsArray// Data dummy
            }
          ]
        }

        var roleChartOptions = {
          maintainAspectRatio : false,
          responsive : true,
          legend: {
            display: true
          },
          scales: {
            xAxes: [{}],
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }

        new Chart(roleChartCanvas, {
          type: 'bar',
          data: roleChartData,
          options: roleChartOptions
        })
      });
    </script>
    </div><!-- /.container-fluid -->
    <!-- Additional Chart for Visitor Data -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Statistik Pengunjung</h3>
                    </div>
                    <div class="card-body">
                        <!-- Canvas for Line Chart -->
                        <canvas id="visitorChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <script>
          $(function () {
            var visitorChartCanvas = $('#visitorChart').get(0).getContext('2d')
            var totalPengunjung = <?php echo $dataViewByMonth; ?>;
            var visitorChartData = {
              labels  : <?php echo $month; ?>,
              datasets: [
                {
                  label               : 'Jumlah Pengunjung',
                  backgroundColor     : 'rgba(60,141,188,0.9)',
                  borderColor         : 'rgba(60,141,188,0.8)',
                  data                : totalPengunjung // Data dummy
                }
              ]
            }

            var visitorChartOptions = {
              maintainAspectRatio : false,
              responsive : true,
              legend: {
                display: true
              },
              scales: {
                xAxes: [{}],
                yAxes: [{
                  ticks: {
                    beginAtZero: true
                  }
                }]
              }
            }

            new Chart(visitorChartCanvas, {
              type: 'line',
              data: visitorChartData,
              options: visitorChartOptions
            })
          });
        </script>
    </div>
<?php endif; ?>

    <?php if (session()->get('jenisLog') == 'author'): ?>
    <!-- author -->
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Statistik Artikel</h3>
                </div>
                <div class="card-body">
                    <!-- Canvas for Bar Chart -->
                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <?php 
      $monthStatsAuthor = json_encode(getMonth2($DataStatistic)); 
      $dataViewByMonth = json_encode(getCountDataByMonth($CountViewArticleByDate, 'views'));
      $dataArticleByMonth = json_encode(getCountDataByMonth($CountArticleByDate, 'total_article'));
      $dataCommentByMonth = json_encode(getCountDataByMonth($DataStatistic, 'total_comment'));
      $dataLikeByMonth = json_encode(getCountDataByMonth($CountLikeByDate, 'total_likes'));

      
    ?>
    <script>
      $(function () {
        const jsArray = <?php echo $monthStatsAuthor; ?>;
        const dataViewByMonth = <?php echo $dataViewByMonth; ?>;
        const dataArticleByMonth = <?php echo $dataArticleByMonth; ?>;
        const dataCommentByMonth = <?php echo $dataCommentByMonth; ?>;
        const dataLikeByMonth = <?php echo $dataLikeByMonth; ?>;
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = {
          labels  : jsArray,
          datasets: [
            {
              label               : 'Total Artikel Dibuat',
              backgroundColor     : 'rgba(60,141,188,0.9)',
              borderColor         : 'rgba(60,141,188,0.8)',
              data                : dataArticleByMonth
            },
            {
              label               : 'Total Artikel Dilihat',
              backgroundColor     : 'rgba(210, 214, 222, 1)',
              borderColor         : 'rgba(210, 214, 222, 1)',
              data                : dataViewByMonth
            },
            {
              label               : 'Total Komentar',
              backgroundColor     : 'rgba(244, 67, 54, 0.8)',
              borderColor         : 'rgba(244, 67, 54, 0.8)',
              data                : dataCommentByMonth
            },
            {
              label               : 'Total Artikel Disukai',
              backgroundColor     : 'rgba(76, 175, 80, 0.8)',
              borderColor         : 'rgba(76, 175, 80, 0.8)',
              data                : dataLikeByMonth
            }
          ]
        }

        var barChartOptions = {
          maintainAspectRatio : false,
          responsive : true,
          legend: {
            display: true
          },
          scales: {
            xAxes: [{
              gridLines : {
                display : false,
              }
            }],
            yAxes: [{
              gridLines : {
                display : false,
              }
            }]
          }
        }

        new Chart(barChartCanvas, {
          type: 'bar',
          data: barChartData,
          options: barChartOptions
        })
      });
    </script>
    </div><!-- /.container-fluid -->
    <?php endif; ?>



    <?php if (session()->get('jenisLog') == 'editor'): ?>
    <!-- editor -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Statistik Artikel Editor</h3>
                    </div>
                    <div class="card-body">
                        <!-- Canvas for Bar Chart -->
                        <canvas id="editorArticleChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <script>
          $(function () {
            var editorArticleChartCanvas = $('#editorArticleChart').get(0).getContext('2d')
            var editorArticleChartData = {
              labels  : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
              datasets: [
                {
                  label               : 'Artikel Diapprove',
                  backgroundColor     : 'rgba(76, 175, 80, 0.8)',
                  borderColor         : 'rgba(76, 175, 80, 1)',
                  data                : [30, 45, 32, 40, 50, 70, 45, 60, 55, 30, 80, 70] // Data dummy
                },
                {
                  label               : 'Artikel Tidak Diapprove',
                  backgroundColor     : 'rgba(244, 67, 54, 0.8)',
                  borderColor         : 'rgba(244, 67, 54, 1)',
                  data                : [20, 25, 22, 30, 35, 40, 25, 35, 30, 20, 40, 30] // Data dummy
                }
              ]
            }

            var editorArticleChartOptions = {
              maintainAspectRatio : false,
              responsive : true,
              legend: {
                display: true
              },
              scales: {
                xAxes: [{}],
                yAxes: [{
                  ticks: {
                    beginAtZero: true
                  }
                }]
              }
            }

            new Chart(editorArticleChartCanvas, {
              type: 'bar',
              data: editorArticleChartData,
              options: editorArticleChartOptions
            })
          });
        </script>
    </div><!-- /.container-fluid -->
<?php endif; ?>

</section>
<?= $this->endSection(); ?>
