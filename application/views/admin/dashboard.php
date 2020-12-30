<div class="container-fluid">
  <div class="row">
    <!-- CARDS -->
    <div class="col-xl-3 col-md-12 mb-4">
      <div class="row">
        <div class="col-xl-12 col-md-6 mb-4">
          <!-- VISITS CARD-->
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Views</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($visits);?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-eye fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12 col-md-6 mb-4">
          <!-- Messages CARD-->
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Messages</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($messages);?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-envelope fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- CHARTS -->
    <div class="col-xl-9 col-lg-5">
      <div class="row">
        <div class="col-xl-12 col-lg-5">
          <!-- Area Chart -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Analytics</h6>
            </div>
            <div class="card-body">
              <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo admin_asset_url();?>vendor/chart.js/Chart.min.js"></script>
<script type="text/javascript">
  var label_area = ['<?php foreach($views as $view){  echo $view->the_date."','"; } ?>'];
  var data_area = ['<?php foreach($views as $view){  echo $view->count."','"; } ?>'];
  var message_data = ['<?php foreach($message_counts as $message_count){  echo $message_count->count."','"; } ?>'];
</script>
<script src="<?php echo admin_asset_url();?>js/dashboard.js"></script>
