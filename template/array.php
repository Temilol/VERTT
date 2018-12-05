<?php
$enrollment = $status; 
if ($enrollment == fulltime) && ($GPA 2.6 >= 4.0) {
$curriculum = array("ENC1101","PSC1121C","MAC2233","CIS1920","ENC1102","COP3014C","COP3828","AFA3104","AMH2091","ECO2013","CTO2104","SPC2608","COP3330
","BSC1005C","CDA3101C","COP3530","ECO3530","ACG2021","CIS3040","ENC3243","MAN3025","CIS4250","ACG2071","COP3710","CNT4504","MAR3023","ELECTIVE","CIS4301
","COP3060","STA2023","ELECTIVE","ELECTIVE","CIS4910","COP4365","ELECTIVE","ELECTIVE");  
$courseTaken =array("ENC1101","PSC1121C","MAC2233","CIS1920","ENC1102","COP3014C","COP3828","AFA3104");  
$courseReminding = array_diff($curriculum,$courseTaken); 
$newArray = array_splice($courseReminding, 0, 5);
$string = join(',',$newArray);
echo $string;
  
}elseif ($enrollment == fulltime) &&  ($GPA 2.0 =< 2.5){ 
if ($enrollment == fulltime) && ($GPA 2.6 >= 4.0) {
$curriculum = array("ENC1101","PSC1121C","MAC2233","CIS1920","ENC1102","COP3014C","COP3828","AFA3104","AMH2091","ECO2013","CTO2104","SPC2608","COP3330
","BSC1005C","CDA3101C","COP3530","ECO3530","ACG2021","CIS3040","ENC3243","MAN3025","CIS4250","ACG2071","COP3710","CNT4504","MAR3023","ELECTIVE","CIS4301
","COP3060","STA2023","ELECTIVE","ELECTIVE","CIS4910","COP4365","ELECTIVE","ELECTIVE");  
$courseTaken =array("ENC1101","PSC1121C","MAC2233","CIS1920","ENC1102","COP3014C","COP3828","AFA3104");  
$courseReminding = array_diff($curriculum,$courseTaken); 
$newArray = array_splice($courseReminding, 0, 4);
$string = join(',',$newArray);
echo $string;
}else{
echo  "Find a new major!"

?>
If ($working = = true) && (20hoursWork = = true){
$workValue = 3; 
}elseif($working = = true) && (20hoursWork = = false) {
$workValue = 2; 
  }Else{
  $workValue = 0; 
}


If (planning = = true){ 
$planningValue = 2; 
}

If ($Children = = true) && ($NumberOfChildren = = 1){

  $numberOfChildrenValue = 1;
}Elseif ($NumberOfChildren= =2){
  $numberOfChildrenValue = 2; 
} Elseif ($NumberOfChildren= =3){
  $numberOfChildrenValue = 3; 
} Elseif ($NumberOfChildren= =4){
  $numberOfChildrenValue = 4; 
}Else {
  $numberOfChildrenValue = 5; 
} 

If ($childrenAge = = “under5”){
  $childrenAgeValue = 5; 
}Elseif ($childrenAge= = “Between 6 and 10”){
  $childrenAgeValue = 4; 
}Elseif ($childrenAge= = “Between 11 and 15”){
  $childrenAgeValue = 3; 
}Else {
  $childrenAgeValue = 2; 
}

If ($Children = = true) && ($helper = = true){
  $helperValue = -1; 
}
elseif($Children = = true) && ($helper = =false ){
  $helperValue = 1;
}Else{  
  $helperValue = 0;
}




2.	Which CIS have you had the most difficulty with? (MDC)
Choices: list of courses

If ($course  = = MDC ){
Unset($curriculum[$course ] )

Var_dump($curriculum);  
3.	Which CIS have you had the least amount of difficulty with? (LDC)
Choices: list


If ($course  = = LDC){

$curriculum =array();
array_unshift($curriculum, $course );


4.	What is your expected graduation date? (graduation date)
Choices: list



5.	Are you a self-motivated person? (self-motivated)
Choices: Yes or No

If (self-motivated= = true){
selfMotivatedValue = -1; 
}else{
 selfMotivatedValue = 1; 
}


6.	Do you like to code? (code)
Choices: Yes or No
If ($code = = true){
Echo ‘Recommend Web design or Programming’; 
}Else{
Echo ‘Recommend Cybersecurity’; 
}

7.	Do you need to improve your GPA? (GPA)
Choices: Yes or No

If ($improveGPA= = true ){
$improveGPAValue = 2; 
}else{
$improveGPAValue = 0; 



8.	Are you an athlete? (athlete)
Choices: Yes or No

If ($athlete = = true ){
$athleteValue = 3;  
}else{
$athleteValue = 0;  
}



9.	Are you involved in an extra-curricular activity? (extra-curricular)
Choices: Yes or No
If ($extracurricular = = true ){
$extracurricularValue = 2; 
}else{ 
 $extracurricularValue = 0; 


$SumValue = ($workValue +$planningValue+$numberOfChildrenValue+$childrenAgeValue+ selfMotivatedValue+$improveGPAValue+$helperValue+$athleteValue+$extracurricularValue)

If (($sumvalue > 15) && ($sumvalue <=19)){
Echo “suggest taking 6 hrs”; 
}Elseif(($sumvalue < 12) && ($sumvalue <=14)){
Echo “suggest taking 9 hrs”; 
}Elseif(($sumvalue < 8) && ($sumvalue <=11)){
Echo “suggest taking 12 hrs”; 
}Else{
Echo “suggest taking 15 hrs or more hours”; 
