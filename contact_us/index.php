<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <title>HOME - Contact us</title>
    <?php
     include('../to_include/links.php');
     
     ?>
</head>
<body>
    <?php include('../to_include/side_nav.php')?>
   
    <div class="main-content">
        <div class="contact_us">
            <h1 class="contact_title">Contact us</h1>
            <form action="../mailer/mailer.php" method="post" class="contact_form">   
                <label for="name">Your name:</label>
                   
                    <input type="text" name="name" required id="">
                

                <label for="surname">Your surname:</label>
                    
                    <input type="text" name="surname" required id="">
                

                <label for="mail">Your e-mail:</label> 
                    
                    <input type="text" name="mail"  required id="">
               

                <label for="message">Your message:</label>
                    
                   <textarea name="message" required id="" cols="30" rows="10"></textarea>
                
                   <input type="submit" class="send_contact" value="SEND">

            </form>     
        
        </div>
    </div>