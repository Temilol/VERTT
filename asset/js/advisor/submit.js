$(document).ready(function(){
    $('.error').hide();
  
    $("#get_transcript").click(function(){
      // validate and process form here
      $('.error').hide();
      
      // Validate the Student selected
  	  var studentID = $("select#studentID").val();
  	  if (studentID == " ") {
        $("label#studentID_error").show();
        $("select#studentID").focus();
        return false;
      }
    });
});