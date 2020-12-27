<div class="container-fluid">
  <div class="row" id="word-row">
  <?foreach($words AS $word){ ?>
    <div class="col-xl-3 col-md-12 mb-4">
      <div class="card border-left-primary shadow h-100 py-2 word-card">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $word->word;?></div>
            </div>
            <div class="col-auto word-trash">
              <a href="javascript:void(0);" onclick="deleteWord(<?php echo $word->id;?>)">
                <i class="fas fa-trash fa-2x text-gray-300"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  </div>
</div>
