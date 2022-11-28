<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <title>HOME - FINISHED SURVEY</title>
<?php

    include('../to_include/links.php');
    include('../to_include/side_nav.php');
    include('../db_connect.php');

?>
</head>
<body>
    <div class="main-content">
    <h1 style="color:#03A9F4;text-align:center;margin-top:250pt; font-size:25px">Thank you for answering the survey!</h1>  

<?php

    


    $arr_ids =[];
    $arr_ans = [];
    
    
   

    foreach($_POST as $key => $val){
        
        $replaced_id = str_replace("-", "",$key);
        $id = (int)$replaced_id;

        array_push($arr_ids, $id);
        array_push($arr_ans, $val);

            
    }

   
   

    for ($i = 0; $i < count($arr_ids); $i ++){
        $ans = serialize($arr_ans[$i]);
        

        $sql = "INSERT INTO answers (question_id, answer) VALUES (?,?)";
            if ( $stmt = $conn->prepare($sql)){
            $stmt->bind_param("is", $arr_ids[$i], $ans);
            $stmt->execute();
            if($stmt->affected_rows === 0) exit('No rows updated');
            }
 }
?>