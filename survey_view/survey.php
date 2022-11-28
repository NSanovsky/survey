<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <title>HOME - SURVEY</title>
<?php
    include('../to_include/links.php');
    include('../to_include/side_nav.php');
    include('../db_connect.php');
?>
</head>
<body>
    <div class="main-content">
        <div class="survey_box">  

    
<?php
$id = (int)$_GET['id'];


$sql =  "SELECT q.id, q.question, q.type, q.input_values, q.min , q.max, s.name FROM questions q
JOIN survey_info s ON s.id = q.survey_id 
WHERE survey_id = $id";

$result = $conn->query($sql);

$res = [];


if ($result->num_rows > 0) {
        
    while (( $row = $result->fetch_assoc())) {
        $res[] = $row;                    
        }
    } 
    else {
        echo "0 results";
}

$survey_title = $res[0]['name'];

echo "<h1 class='survey_title'>" . $survey_title . "</h1><form action='survey_submit.php' method='POST' name='forma'>";
 
foreach($res as $r => $rv){
    
    echo "<div class='question_div'>";
    $id_question = $res[$r]['id'];
    
    $num_q = $r + 1;
    $question = $res[$r]['question'];
    echo "<div class='question'><span>" . $num_q . ".</span>" . $question . "</div><div class='real_answer'>";
    $type = $res[$r]['type'];

    
   
    if (($type === 'radio') || ($type === 'checkbox')){

        $vals = unserialize( $res[$r]['input_values']);
        
        
        if(($type === 'radio')){
            
            if(is_array($vals)){
                $br = count($vals);
                
            for($x = 0 ; $x < $br ; $x++){
                
                echo "<input type='radio' id='q" . $num_q . $x . "' name='". $id_question  ."-[]' value='". $vals[$x] . "'><label for='q" . $num_q . "'>" . $vals[$x] . "</label><br>";
            }
        }
        }
    
        if(($type === 'checkbox')){
            if(is_array($vals)){
                $br = count($vals);
            
            for($x = 0 ; $x < $br ; $x++){
                echo "<input type='checkbox' id='q" . $num_q  . $x . "' name='". $id_question  ."-[]' value='". $vals[$x] . "'><label for='q" . $num_q . $x ."'>" . $vals[$x] . "</label><br>";
            }
        }
        }
    }
    

     if(($type === 'num')) {
        $min = $res[$r]['min'];
        $max = $res[$r]['max'];
        echo "<input type='number' min= ". $min . " max=". $max ." name='". $id_question  ."-[]'><br>";
    }

    else if(($type === 'text')){
        echo "<textarea name='". $id_question  ."-[]' rows='10' cols='50' placeholder='Answer here..'></textarea><br>";
    }
   
    echo "</div></div>";
}
echo"<input type='submit' class='submit2 submit_survey'></form>";

$conn->close();





?>
    
</div>
</div>