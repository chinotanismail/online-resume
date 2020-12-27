var words = $("input[name=words]");
var listOfWords = new Array();

for(var i = 0; i<words.length; i++){
  listOfWords.push(words[i].value);
}

var i = window.setInterval(function(){
  var word = document.createElement("span");
  var randomWord = Math.floor((Math.random() * (listOfWords.length)) + 1)-1;
  word.innerHTML = listOfWords[randomWord];
  word.style = getStyle();
  $("#keywords").append(word);
}, 300);

window.setInterval(function(){
    $("#keywords span:lt(8)").remove();
}, 5000);

$("#add-button").click(function(){
  if(!$("#add-input").val()){
    $($("#add-input")).addClass("required");
    return false;
  }

  else{
    $($("#add-input")).removeClass("required");
  }

  var data = $("#add-input").val();
  var word = document.createElement("span");
  word.innerHTML = data;
  word.style = getStyle();
  $("#keywords").append(word);
  listOfWords.push($("#add-input").val());
  $("#add-input").css("color", "#0e679a");

  $.ajax({
    type: "POST",
    url: "Home/add_word",
    data: {"word":data},
    success: function(response){
    }
  });

  setTimeout(function(){
    $("#add-input").val("");
    $("#add-input").css("color", "#FFFFFF");
  }, 600);
});

function getStyle(){
  return "position: absolute; top: "+ Math.floor((Math.random() * 100) + 1) +"%; left: "+ Math.floor((Math.random() * 100) + 1) +"%;";
}

$("#work-slider").slick({
  prevArrow: $('#work-left'),
  nextArrow: $('#work-right'),
  infinite: false
});

$("#projects-slider").slick({
  prevArrow: $('#projects-left'),
  nextArrow: $('#projects-right'),
  infinite: false
});

$("#checkbox-cv").click(function(){
  var checkboxValue = $("input[name=cv]").val();
  $("input[name=cv]").val(checkboxValue == 'Y'?'N':'Y');
  var newValue = $("input[name=cv]").val();
  newValue=='Y'?$("#check").css("opacity", "1"):$("#check").css("opacity", "0");
});

function validateEmail(email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if( !emailReg.test( email ) ) {
        return false;
    } else {
        return true;
    }
}

$("#send").click(function(){
  var errors = 0;

  $("#contact input").map(function(){
    if(!$(this).val()){
      $(this).addClass("required");
      errors++;
    }

    else{
      $(this).removeClass("required");
    }
  });

  $("#contact textarea").map(function(){
    if(!$(this).val()){
      $(this).addClass("required");
      errors++;
    }

    else{
      $(this).removeClass("required");
    }
  });

  var email = $("#visitor-email").val();

  if(!validateEmail(email)){
    $("#visitor-email").addClass("required");
    errors++;
  }

  if(errors>0)
    return false;

  $.ajax({
    type: "POST",
    url: "Home/send_message",
    data: {
      "name": $("#visitor-name").val(),
      "email_address": $("#visitor-email").val(),
      "cv_request": $("#visitor-cvrequest").val(),
      "message": $("#visitor-message").val()
    },
    success: function(response){
      if(response == "1")
      {
        $("#contact .content").find(".inputs").css({"opacity": "0", "transform": "scale(0)"});
        setTimeout(function(){
          $("#contact .content").find(".input-form").remove();
          $("#contact .content").html("<i id='sent-confirm' class='fa fa-check'></i><h2 id='sent-message'>message sent</h2>");
        }, 1500);
      }
    }
  });
});

$(document).ready(function(){
  var isMobile = window.orientation > -1;

  $.ajax({
    type: "POST",
    url: "Home/add_visit",
    data: {"device":isMobile?"mobile":"desktop"},
    success: function(response){
    }
  });
});
