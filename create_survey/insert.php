<?php

include('../db_connect.php');
include('../to_include/links.php');
include('../to_include/side_nav.php');




if(isset($_POST['submit'])) {
    
   
    $survey_title = $_POST['survey_name'];
    $ui = 1;

    $sql = "INSERT INTO survey_info (name, user_id) VALUES (?,?)";
    if ( $stmt = $conn->prepare($sql)){
      $stmt->bind_param("si", $survey_title, $ui);
      $stmt->execute();
      if($stmt->affected_rows === 0) exit('No rows updated');
   }
    
   $result = mysqli_query($conn, $sql);
   $id = mysqli_insert_id($conn);
 


  $question_title = $_POST['q'];
  $questions = []; 
  $answers_type = [];
  $arr = array();
  $values_arr = array();
  $min_max = array();
  

  foreach($_POST as $key => $value){

    
    $arr = explode("-", $key);    
   
    
 
    if($arr[0] === 'radio' || $arr[0] === 'checkbox'){
      array_push($values_arr , $_POST[$key]);
      array_push($min_max, [NULL,NULL]);
    }

    
    if ($arr[0] === 'num'){
      array_push($min_max, $_POST[$key]);
      array_push($values_arr, [NULL,NULL]);
    }

    if($arr[0] === 'text'){
      array_push($min_max, [NULL,NULL]);
        array_push($values_arr, [NULL,NULL]);
        
    }
    
    
    if(($arr[0] !== 'q') && ($arr[0] !== 'submit')  && ($arr[0] !== 'survey_name')) {
       array_push($answers_type, $arr[0]);
           
    }

    if (strcmp($key, 'q') == 0){

      foreach($_POST['q'] as $q => $q_value){

        array_push($questions,$q_value);
        
      }

    }
  
  }

  
  
  foreach($questions as $qu => $q){   
    $min = $max = null;
    
    $question = $q;
    $ans_type = '';

    if(isset($answers_type[$qu])) $ans_type = $answers_type[$qu];
   

    if(isset($min_max[$qu])){
      
      $min = $min_max[$qu][0];
      $max = $min_max[$qu][1];
    }

    $values = array();
  
    if(isset($values_arr[$qu]) || is_object($values_arr[$qu])){

      foreach($values_arr[$qu] as $val){
       
          array_push($values, $val);
        }
       
    }
    
    $values_str = serialize($values);
    


    if (isset($min) && (isset($max))) {
      $sql = "INSERT INTO questions (question, type, survey_id, min, max)
      VALUES (?,?,?,?,?)";

      if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssiii", $question, $ans_type, $id, $min, $max);
        $stmt->execute();
        if($stmt->affected_rows === 0) echo $mysqli->error;
      }
      
    }
    

    if (($ans_type === 'radio') || ($ans_type === 'checkbox')){
      $sql = "INSERT INTO questions (question, type, survey_id, input_values)
      VALUES (?,?,?,?)";
      if($stmt = $conn->prepare($sql)){
        $stmt->bind_param("ssis", $question, $ans_type, $id, $values_str);
        $stmt->execute();
        if($stmt->affected_rows === 0) echo $mysqli->error;
      }
      
    }

    if(($ans_type === 'text')){
      $sql = "INSERT INTO questions (question, type, survey_id)
      VALUES (?,?,?)";     
       if($stmt = $conn->prepare($sql)){
         $stmt->bind_param("ssi", $question, $ans_type, $id);
         $stmt->execute();
         if($stmt->affected_rows === 0) echo $mysqli->error;
       }

    }



  }

  if($stmt)  $stmt->close();
  


}



?>
<div class="main-content">
  <h1 style="color:#03A9F4;text-align:center;margin-top:250pt; font-size:25px">Congratulations, you just made you own survey!</h1>

</div>