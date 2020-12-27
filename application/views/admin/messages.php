<div class="container-fluid">
  <div class="row" style="height: 70vh;">
    <div class="d-flex col-md-12">
      <div class="col-md-4">
        <div class="list-group overflow-auto" style="max-height: 70vh;" id="message-list">
          <?php foreach($messages as $message) { ?>
          <a href="javascript:void(0);" class="message list-group-item list-group-item-action flex-column align-items-start font-weight-bold <?php echo $message->message_status==0?"border-left-primary":"";?>" data-id="<?php echo $message->id; ?>">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1" id="visitor-name"><?php echo $message->name; ?></h5>
              <small><?php echo date("M d, Y h:ia", strtotime($message->date_received)); ?></small>
              <input type="hidden" name="visitor-id" value="<?php echo $message->id; ?>">
              <input type="hidden" name="visitor-email" value="<?php echo $message->email_address; ?>">
              <input type="hidden" name="visitor-cv-request" value="<?php echo $message->cv_request; ?>">
              <input type="hidden" name="visitor-cv-sent" value="<?php echo $message->cv_sent; ?>">
              <input type="hidden" name="visitor-message" value="<?php echo nl2br($message->message); ?>">
            </div>
            <small><?php echo $message->email_address; ?></small>
          </a>
          <?php } ?>
        </div>
      </div>
      <div class="col-md-8 d-flex align-items-center justify-content-center" id="main-content">
        <div class="row" style="width: fit-content;" id="select-message">
          Select a message.
        </div>

        <div id="message-content" class="card d-none" style="max-height: 70vh;">
          <div class="card-header">
            <div class="d-sm-flex align-items-center justify-content-between" id="message-header-head">
              <span id="message-header"></span>
            </div>
          </div>
          <div class="card-body h-100 overflow-auto" id="message-body">
          </div>
          <div class="card-footer">
            <a href="javascript:void(0);" class="btn btn-danger btn-lg btn-block" id="deleteMessage">
              <span class="icon text-white-50">
                <i class="fas fa-trash"></i>
              </span>
              <span class="text">Delete</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
