<div class="container-fluid">
  <div class="form-group">
    <label for="template_message">Template Message</label>
    <textarea name="template_message" rows="8" cols="80" class="form-control" id="template_message"><?php echo $template[0]->value;?></textarea>
  </div>
  <a href="javascript:void(0);" class="btn btn-primary btn-icon-split" onclick="saveTemplate()">
    <span class="icon text-white-50">
      <i class="fas fa-save"></i>
    </span>
    <span class="text">Save Template</span>
  </a>
</div>

<div class="modal fade" id="savedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Template Saved</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        The message template has been saved.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
