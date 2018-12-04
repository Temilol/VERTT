$(document).ready(function(){
    $('.error').hide();
  
    $("#send").click(function(){
      // validate and process form here
      $('.error').hide();
      
      // Validate the first name selected
  	  var firstName = $("input#firstName").val();
  	  if(!firstName){
        $("label#firstName_error").show();
        $("input#firstName").focus();
        return false;
      }
      
      // Validate the middle name selected
  	  var middleName = $("input#middleName").val();
  	  if(!middleName){
        $("label#middleName_error").show();
        $("input#middleName").focus();
        return false;
      }
      
      // Validate the last name selected
  	  var lastName = $("input#lastName").val();
  	  if(!lastName){
        $("label#lastName_error").show();
        $("input#lastName").focus();
        return false;
      }
      
      // Validate the phone number selected
  	  var phoneNumber = $("input#phoneNumber").val();
  	  if(!phoneNumber){
        $("label#phoneNumber_error").show();
        $("input#phoneNumber").focus();
        return false;
      }
      if(!/^\d+$/.test(phoneNumber)){//check if the input contains letter
        $("label#phoneNumberDigit_error").show();
        $("input#phoneNumber").focus();
        return false;
      }
      
      // Validate the location selected
  	  var lastName = $("textarea#officeLocation").val();
  	  if(!lastName){
        $("label#officeLocation_error").show();
        $("textarea#officeLocation").focus();
        return false;
      }
    });
});