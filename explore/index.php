<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <title>HOME - Explore</title>
<?php
    include('../to_include/links.php');
    
    include('../db_connect.php');
?>

</head>
<body>
<?php include('../to_include/side_nav.php'); ?>

    <div class="main-content">
    
    <table class="list_surveys">
    <thead>
        <tr>
            <th>Number</th>
            <th>Survey name</th>
            <th>Username</th>
        </tr>
</thead>
       <tbody>
        <?php 
                 $sql = "SELECT s.id, s.name, u.username FROM survey_info s
                        JOIN user_info u ON s.user_id = u.id;";
                 $result = $conn->query($sql);
                 if ($result->num_rows > 0) {                   
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td class='ids'>". $row["id"]. "</td><td>" .  $row["name"] . "</td><td>" . $row["username"]. "</td></tr>";
                         
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
        
        
        ?>    
        
        </tbody>
    </table>


    </div>    
</body>
<script>


$(document).ready(function($) {
    $('tbody tr').click(function() {
     let $id = $(this).closest("tr")   
                       .find(".ids")     
                       .text();  
    
        window.location = "../survey_view/survey.php?id=" + $id;
    
});
});

</script>
