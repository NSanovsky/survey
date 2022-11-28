<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <title>HOME - Survey Maker</title>
    <?php
     include('../to_include/links.php');
     
     ?>
</head>
<body>
    <?php include('../to_include/side_nav.php')?>
   
    <div class="main-content">
        <div class="welcome-div">
        <div class="welcome-note">
            <h1>WELCOME TO OUR SURVEY MAKER!</h1>
            <p>Make your own survey and share it everywhere.</p>
        </div>
        <div class="survey_box hide">

           
         <form action="insert.php" method="POST">
         <div class="survey_title">
                <p id="survey_name">NAME OF YOUR SURVEY</p>
               <div> <input  type="text" name="survey_name" id="name_input"><input type="button" value="ADD QUESTION"  class="add_btn"></div>
            </div>
          <div class="questions">
              
              
                
            </div> 
                 <input type="submit" name="submit" value="SUBMIT SURVEY" class="hide" id="submit_survey">
                </form>
        </div>

        <div class="circle_1">
            <div class="circle_2">
                    
                    <a href="../create_survey/" id="start">START</a>
                    
            </div>
        </div>
       
        <div class="marketing">
            <p><svg xmlns="http://www.w3.org/2000/svg" width="16.024" height="33.75" viewBox="0 0 16.024 33.75"><defs><style>.aa{fill:#03a9f4;}</style></defs><g transform="translate(-9.984 -1.125)"><path class="aa" d="M17.979,7.5h-.014a3.185,3.185,0,1,1,3.2-3.185A3.193,3.193,0,0,1,17.979,7.5Z"/><path class="aa" d="M15.553,34.875a1.921,1.921,0,0,1-1.9-2.138l.07-19.519h-.7V20.6a1.706,1.706,0,0,1-.45,1.287,1.494,1.494,0,0,1-2.138,0,1.694,1.694,0,0,1-.45-1.287v-8.55a4.061,4.061,0,0,1,.97-2.7A3.591,3.591,0,0,1,13.7,8.086h8.6a3.574,3.574,0,0,1,2.742,1.273,4.043,4.043,0,0,1,.97,2.693V20.6a1.667,1.667,0,0,1-.464,1.287,1.58,1.58,0,0,1-2.18,0A1.667,1.667,0,0,1,22.9,20.6V13.219h-.633V32.737a1.948,1.948,0,1,1-3.881.042V22.852h-.844v9.907A2,2,0,0,1,15.553,34.875Z"/></g></svg><span class="counter">10,000 </span> USERS</p>
            <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><defs><style>.aS{fill:#e16b5a;}</style></defs><path class="aS" d="M24,23.679V4.821A2.572,2.572,0,0,0,21.429,2.25H2.571A2.572,2.572,0,0,0,0,4.821V23.679A2.572,2.572,0,0,0,2.571,26.25H21.429A2.572,2.572,0,0,0,24,23.679ZM6,10.821a.857.857,0,0,1-.857-.857V8.25A.857.857,0,0,1,6,7.393h6.857a.857.857,0,0,1,.857.857V9.964a.857.857,0,0,1-.857.857Zm0,5.143a.857.857,0,0,1-.857-.857V13.393A.857.857,0,0,1,6,12.536H18a.857.857,0,0,1,.857.857v1.714a.857.857,0,0,1-.857.857Zm0,5.143a.857.857,0,0,1-.857-.857V18.536A.857.857,0,0,1,6,17.679H9.429a.857.857,0,0,1,.857.857V20.25a.857.857,0,0,1-.857.857Z" transform="translate(0 -2.25)"/></svg><span class="counter">34,000 </span> SURVEYS</p>
            <p><svg xmlns="http://www.w3.org/2000/svg" width="31.5" height="21" viewBox="0 0 31.5 21"><defs><style>.aA{fill:#03a9f4;}</style></defs><path class="aA" d="M21,15H3v3H21Zm0-6H3v3H21ZM3,24H15V21H3Zm29.25-6.75L34.5,19.5,24.015,30,17.25,23.25,19.5,21l4.515,4.5Z" transform="translate(-3 -9)"/></svg><span class="counter">132,000 </span> FILLED SURVEYS</p>
        </div>
    </div>
    </div>
</body>
<script>

$('.counter').counterUp({
    delay: 10,
    time: 9000
});

</script>
</html>