$(".message").click(function(){
  var message = $(this).find("input[name='visitor-message']").val();
  var name = $(this).find("#visitor-name").html();

  $(".message").removeClass("active");
  $(this).addClass("active");
  $("#message-content").removeClass("d-none");
  $("#select-message").remove();
  $("#main-content").removeClass("align-items-center");
  $("#main-content").removeClass("justify-content-center");
  $("#main-content").removeClass("d-flex");

  var id = $(this).find("input[name='visitor-id']").val();
  $("#deleteMessage").attr("onclick", "deleteThis("+id+")");

  $.ajax({
    type: "POST",
    url: "message_read",
    data: {"id": id},
    success: function(response){
    }
  });

  $(this).removeClass("border-left-primary");

  var btn = `
    <a href="javascript:void(0);" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm btn-icon-split" data-email=`+$(this).find("input[name='visitor-email']").val()+` id="sendCV" onclick="sendCV(`+id+`)">
      <span class="text">Send CV</span>
      <span class="icon">
        <i class="fas fa-arrow-right fa-sm text-white-50"></i>
      </span>
    </a>
    `;

  $("#message-header-head").html('<span id="message-header"></span>');
  $("#message-header").html(name + " ("+$(this).find("input[name='visitor-email']").val()+")");

  if($(this).find("input[name='visitor-cv-request']").val()=='Y'){
      $(this).find("input[name='visitor-cv-sent']").val()=='1'?$("#message-header-head").append(btnDisabled):$("#message-header-head").append(btn);
  }

  $("#message-body").html(message);
});

function deleteThis(id){
  var elementAdd = `
    <div class="row" style="width: fit-content;" id="select-message">
      Select a message.
    </div>`;

  $.ajax({
    type: "POST",
    url: "message_delete",
    data: {"id": id},
    success: function(response){
    }
  });

  $("#main-content").addClass("align-items-center");
  $("#main-content").addClass("justify-content-center");
  $("#main-content").addClass("d-flex");
  $("#main-content").append(elementAdd);
  $("#message-content").addClass("d-none");
  $("#message-list").find("a[data-id="+id+"]").remove();
}

var btnDisabled = `
  <a href="javascript:void(0);" class="disabled d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
    <span class="text">CV SENT</span>
  </a>
  `;

function sendCV(id){
  $.ajax({
    type: "POST",
    url: "send_cv",
    data: {"id":id},
    success: function(response){
      if(response!="0"){
        $("#message-list").find("a[data-id="+id+"]").find("input[name='visitor-cv-sent']").val('1');
        $("#sendCV").addClass('disabled');
        $("#sendCV").removeClass('btn-icon-split');
        $("#sendCV").html('<span class="text">CV SENT</span>');
      }
    }
  });
}

window.setInterval(function(){
  $.ajax({
    type: "POST",
    url: "get_unread_message_count",
    success: function(response){
      $("#message-badge").html(response>0?response:"");
    }
  });
}, 1500);

function deleteWord(id){
  $.ajax({
    type: "POST",
    url: "delete_word",
    data: {"id":id},
    success: function(response){
      $("#word-row").html(response);
    }
  });
}

function saveTemplate(){
  $.ajax({
    type: "POST",
    url: "save_template",
    data: {"value":$("#template_message").val()},
    success: function(response){
      $("#savedModal").modal({show:true});
    }
  });
}

$("#template_message").summernote();
