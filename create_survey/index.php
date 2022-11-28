
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <title>HOME - Create a survey</title>
<?php 

include('../to_include/links.php');

?>
</head>
<body>
<?php
include('../to_include/side_nav.php'); ?>
<div class="main-content">        
        <div class="survey_box ">

           
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

        
</div>
</body>
<script>

        

let $i = 0;
let $edit = $(".edit");  



let $ir=0;

 $(".add_btn").click(function(){
    $i ++;
    let $qu_child = $('.question_box').length + 1;
    let $new_q = " <div class='question_box rmv" + ($qu_child) +"'><div class='question'><p>Question: </p><input type='text' name='q[]' class='question_input'><input type='button' value='REMOVE' class='rmv_btn' id='rmv" + $qu_child +"'></div><div class='answer'><p>Answer: </p><div class='choices'><div class='text'><p>Choose questioning method down below.</p><svg xmlns='http://www.w3.org/2000/svg' width='18' height='9' viewBox='0 0 18 9'><defs><style>.adr{fill:#e16b5a;}</style></defs><path class='adr' d='M9,13.5l9,9,9-9Z' transform='translate(-9 -13.5)'/></svg></div><div class='dropdown-choices'><div class='choice'><p>RADIO BUTTON</p> </div><div class='choice'><p>CHECKBOX</p> </div><div class='choice'><p>TEXT</p> </div><div class='choice'><p>NUMBER</p> </div></div></div></div></div>";
   
    $(".questions").append($new_q);

    $( ".question_input" ).each(
        function( index ) {
        this.name = "q["+index+"]";
        console.log($(this).parent());
        $(this).parent().children("span").html = "'"+ index +"'";
        
    });

    $('#submit_survey').removeClass('hide');

});

$(document).on('click','.rmv_btn',function(e) {
    $i-- ;
    let $id = $(this).attr('id'); 
    let $klasa = "." + $id;
    $($klasa).remove();     
    $( ".question_input" ).each(
        function( index ) {
        this.name = "q["+index+"]";
        console.log($(this).parent());
        $(this).parent().children("span").html = "'"+ index +"'";
        
        console.log(  $(this).parent().parent().children('.edit').children("div").children(".rb_inp"));
        let $to_update =  $(this).parent().parent().children('.edit').children("div").children("input");
        
        
        
        $to_update.each(
            function( ){
                let $name_array = [];
                $name_array = $to_update.attr('name').split('-');
                console.log($name_array);
                this.name =  $name_array[0] + "-" + index + "-[]";
                console.log(this.name);
            }
        );
    }
);
    console.log("Klasa koju brišemo" + $klasa);
});

$(document).on('click','.choice',function(e){
   $ind = $('.choice').index(this);
   
   $to_add = $(this).parent().parent().parent().parent();
   let $lastChar = $to_add.slice(-1);
   let $child = $to_add.index();
   let $q_index = $(this).parent().parent().parent().parent().index();  
  
   
   
           
    if($to_add.find('.edit').length >= 0 ){
                $($to_add).find('.edit').first().remove();
                
        }

    if ($ind%4 === 0){
        $i++;
        console.log($q_index);
        $to_add.append("<div class='edit'><input type='button' value='ADD RADIO BUTTON' name='btn_rb[]' class='add_rb'></edit>");
       
       
    }
    
    if ($ind%4 === 1){
        console.log($q_index);
        
        $to_add.append("<div class='edit'><input type='button' value='ADD CHECKBOX'  class='add_ch'></edit>")
       
       
    }
    if ($ind%4 === 2){
        $i++;
        
        console.log($q_index);;
        $to_add.append("<div class='edit'><div>Text field added: <input type='text'  name='text-" + $q_index + "-[]' class='disabled_txt'   id='q" + $i + "'></div></div>");
        
       
    }
    if ($ind%4 === 3){
        console.log($q_index);
       
        
        $to_add.append("<div class='edit'><div class='num_class'>From: <input type='number' name='num-"+ $q_index  +"-[]' class='q" + $i + "'>To: <input type='number' name='num-"+ $q_index +"-[]' name='' class='q" + $i + "'></div></div>");
         
       
    }

    
    

});

let $ch = 1;

$(document).on('click','.add_ch',function(e) {
    let $q_index = $(this).parent().parent().index();            
    let $to_add = $(this).parent();
    let $dodat = "<div class='check_div'> <input type='text' name='checkbox-" + $q_index + "-[]' class='ch_inp' id='ch"+ $ch +"'><input type='button' value='REMOVE' class='rmv_ch'></div>"
    $to_add.append($dodat);
    $ch ++;
});

$(document).on('click','.rmv_ch',function(e) {
    let $parent = $(this).parent(); 

    $parent.remove();     
    console.log($parent);
    
});

$rb = 1;

$(document).on('click','.add_rb',function(e) {
    let $q_index = $(this).parent().parent().index();
    let $to_add = $(this).parent();
    let $dodat = "<div class='rb_div'> <input type='text' name='radio-" + $q_index + "-[]' class='rb_inp' id='rb"+ $rb +"'><input type='button' value='REMOVE' class='rmv_rb'></div>"
    $to_add.append($dodat);
    $rb ++;
    
});

$(document).on('click','.rmv_rb',function(e) {
    let $parent = $(this).parent(); 

    $parent.remove();     
    console.log($parent);
    
});









</script>