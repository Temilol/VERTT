$(document).ready(function(){
    $('.error').hide();
  
    $("#send").click(function(){
      // validate and process form here
      $('.error').hide();
      
      // Validate the full time
  	  var full_time = $("select#full_time").val();
  	  if (full_time == " ") {
        $("label#full_time_error").show();
        $("select#full_time").focus();
        return false;
      }
      
      // Validate the working
  	  var working = $("select#working").val();
      if (working == " ") {
        $("label#working_error").show();
        $("select#working").focus();
        return false;
      }else if(working == "Yes"){
          var working_hour = $("select#working_hour").val();
          if (working_hour == " ") {
            $("label#working_hour_error").show();
            $("select#working_hour").focus();
            return false;
          }
      }
      
      // Validate the children
  	  var children = $("select#children").val();
  	  if (children == " ") {
        $("label#children_error").show();
        $("select#children").focus();
        return false;
      }else if(children == "Yes"){
          var children_number = $("select#children_number").val();
          if (children_number == " ") {
            $("label#children_number_error").show();
            $("select#children_number").focus();
            return false;
          }
          var children_age = $("select#children_age").val();
          if (children_age == " ") {
            $("label#children_age_error").show();
            $("select#children_age").focus();
            return false;
          }
          var children_help = $("select#children_help").val();
          if (children_help == " ") {
            $("label#children_help_error").show();
            $("select#children_help").focus();
            return false;
          }
      }
      
      // Validate date
      var graduation_date = $("input#graduation_date").val();
      if(graduation_date == ""){
            $("label#graduation_date_error").show();
            $("input#graduation_date").focus();
            return false;
      }
      var inputed_day = new Date( graduation_date );
      var current_day = new Date();
      
      if(inputed_day.getFullYear() < current_day.getFullYear()){
            $("label#invalid_graduation_date_error").show();
            $("input#graduation_date").focus();
            return false;
      }else if(inputed_day.getFullYear() == current_day.getFullYear()){
          if(inputed_day.getMonth() < current_day.getMonth()){
                $("label#invalid_graduation_date_error").show();
                $("input#graduation_date").focus();
                return false;
          }else if(inputed_day.getMonth() == current_day.getMonth()){
              if(inputed_day.getDate()+1 < current_day.getDate()){
                    $("label#invalid_graduation_date_error").show();
                    $("input#graduation_date").focus();
                    return false;
              }
          }
      } 
        
      // Validate the self motivated
  	  var self_motivated = $("select#self_motivation").val();
  	  if (self_motivated == " ") {
        $("label#self_motivation_error").show();
        $("select#self_motivation").focus();
        return false;
      }
      
      // Validate the coding
  	  var coding = $("select#coding_interest").val();
  	  if (coding == " ") {
        $("label#coding_interest_error").show();
        $("select#coding_interest").focus();
        return false;
      }
      
      // Validate the improve gpa
  	  var improve_gpa = $("select#improve_gpa").val();
  	  if (improve_gpa == " ") {
        $("label#improve_gpa_error").show();
        $("select#improve_gpa").focus();
        return false;
      }
      
      // Validate the athlete
  	  var athlete = $("select#athlete").val();
  	  if (athlete == " ") {
        $("label#athlete_error").show();
        $("select#athlete").focus();
        return false;
      }
      
      // Validate the extra cirricular
  	  var extra_cirricular = $("select#extra_cirricular").val();
  	  if (extra_cirricular == " ") {
        $("label#extra_cirricular_error").show();
        $("select#extra_cirricular").focus();
        return false;
      }
      
      var data = $("#form").serialize();

      $.ajax({
        type: "POST",
        url: $("#form").attr('action'),
        data: data,
//         success: function(data){
//           $('#results').html(data);
//           console.log("done");
//         }
      });
//       return false;
    });
});